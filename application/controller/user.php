<?php

class User extends Controller {
	public function index() {
		require 'application/views/_templates/header.php';
        require 'application/views/user/user_nav.php';
        require 'application/views/user/index.php';
	}

	public function pwUpdate_form() {
		require 'application/views/_templates/header.php';
		require 'application/views/user/user_nav.php';
		require 'application/views/user/pwUpdate_form.php';
	}

	public function userUpdate() {
		require 'application/libs/tools.php';

		$id = requestValue("id");
		$name = requestValue('name');

		$member_model = $this->loadModel('MemberModel');
		$member = $member_model->getMember($id);

		if($name) {
			if($member && $member['name'] == $name) {
				errorBack('변동 사항이 없습니다.');
			} else {
				// DB의 name 수정
				$member_model->updateName($id, $name);

				session_start_if_none();
				$_SESSION['uname'] = $name;

				okGo('회원정보가 수정되었습니다.', '/user/');
			}
		} else {
			errorBack('모든 입력란을 채워주세요.');
		}
	
	}

	public function pwUpdate() {
		require 'application/libs/tools.php';

		// 입력폼의 값을 가져온다.
		$id = requestValue("id");
		$current_pw = requestValue('current-pw');
		$new_pw = requestValue('new-pw');
		$new_pw_check = requestValue('new-pw-check');

		// 새로입력한 패스워드를 적합하게 작성하기 위한 정규식
		$pwPattern = '/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/';

		// DB객체 생성
		$member_model = $this->loadModel('MemberModel');
		$member = $member_model->getMember($id);

		// 조건확인
		if($current_pw && $new_pw && $new_pw_check) {
			if($current_pw == $new_pw) {
				errorBack('현재 비밀번호와 다른 비밀번호를 입력해주세요.');
			}

			if($member && $member['pw'] == $current_pw) {
				if(preg_match($pwPattern, "$new_pw")) {
					if($new_pw == $new_pw_check) {
						$member_model->updatePassword($id, $new_pw);
						okGo('비밀번호가 수정되었습니다. \n다시 로그인 해주세요.', '/member/logout/');

					} else {
						errorBack('비밀번호의 확인 값이 일치하지 않습니다.');
					}
				} else {
					errorBack('비밀번호는 8~15자 사이, 영문, 숫자, 특수문자가 포함되어야 합니다');
				}
			} else {
				errorBack('현재 비밀번호가 일치하지 않습니다.');
			}
		} else {
			errorBack('모든 입력란을 채워주세요.');
		}
	}
}

?>