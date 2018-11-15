<?php
class Member extends Controller
{
	public function index()
	{
		require 'application/views/_templates/header.php';
		require 'application/views/member/login_form.php';
	}

	// 정보 입력 후 로그인 버튼 클릭하면 처리하는 메소드
	public function login() {
		// 사용자가 아이디와 비밀번호 입력 후 로그인을 하면 처리하는 함수
		
		require 'application/libs/tools.php';

		// 로그인 폼에서 전달된 아이디, 비밀번호 읽기
		$id = requestValue("id");
		$pw = requestValue("pw");
	
		// 로그인 폼에 입력된 아이디의 회원정보(id, pw, name)를 DB에서 읽기
		$member_model = $this->loadModel('MemberModel');
		$member = $member_model->getMember($id);
	
		// 사용자가 입력한 id를 가지고 있는 행이 있고, 
		// 그 행의 pw 값과 사용자가 입력한 비밀번호가 맞으면 로그인
		if ($member && $member["pw"] == $pw) {
			session_start_if_none();
	
			// session을 이용하여 로그인
			// session에 pw는 저장하지 않는다
			$_SESSION["uid"] = $id;
			$_SESSION["uname"] = $member["name"];
	
			// 메인 페이지로 돌아감
			goNow("/surveyBoard/whole_survey/");
		} else {
			errorBack("아이디 또는 비밀번호가 잘못 입력되었습니다.");
		}
	}

	// 로그아웃 처리하는 메소드

	public function logout() {
		require 'application/libs/tools.php';

		// 세션변수에서 로그인 정보 삭제(unset함수 이용)
		session_start_if_none();
		unset($_SESSION["uid"]);
		unset($_SESSION["uname"]);

		// 로그인 페이지로 보내줌
		goNow(URL."member/");
	}

	// 비밀번호 재설정 클릭 시 처리하는 메소드
	public function password_update() {
		echo 'password_upadate OK';
	}

	// 회원정보 입력 후 가입 버튼 클릭하면 처리하는 메소드
	public function member_join() {
		// 사용자가 아이디와 비밀번호 입력 후 로그인을 하면 처리하는 페이지
		require 'application/libs/tools.php';

		$member_model = $this->loadModel('MemberModel');
		
		// 회원가입 폼에서 전달된 아이디, 비밀번호, 이름 읽기
		$id = requestValue("id");
		$pw = requestValue("pw");
		$name = requestValue("name");

		// 패스워드 정규식
		$pwPattern = '/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/';

		if($id && $pw && $name) {
			if($member_model->getMember($id))
	
				// 사용중인 아이디라면 이전 페이지로
				errorBack("이미 사용 중인 아이디입니다");            
			else if (!preg_match($pwPattern, "$pw")) {
				
				// 비밀번호가 양식에 맞지 않다면
				errorBack("비밀번호는 8~15자 사이, 영문, 숫자, 특수문자가 포함되어야 합니다");
				
			} else {
				$member_model->insertMember($id, $pw, $name);
				okGo("가입이 완료되었습니다.", "/member/");
			}
		} else {
	
			// 하나라도 비어져 있으면 이전 페이지로
			errorBack("모든 입력란을 채워주세요.");
		}    
		
	}


	// 회원탈퇴 처리 메소드 / view 파일은 없이 여기서 바로 처리
	public function member_exit() {

	}

	
}

?>