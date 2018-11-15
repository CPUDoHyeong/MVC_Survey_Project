<?php

/*
    회원정보 등록, 수정, 회원탈퇴에 관한 작업처리
    db와 연동된 작업 수행

*/

class MemberModel {

    // DB접근 하고 PDO 객체를 db에 저장한다.
    function __construct($db) {
        try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('데이터베이스 연결에 오류가 발생했습니다.');
		}
    }

    // 회원 정보 가져오기
    // 로그인 버튼 클릭 시 사용자 인증 하기 위함.
    public function getMember($id) {
        try {
            $sql = "SELECT * FROM member WHERE id=:id";
            $query = $this->db->prepare($sql);
            $query->bindValue(":id", $id, PDO::PARAM_STR);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            exit($e->getMessage());
        }

        return $result;
    }

    // 회원 정보 추가
    // 회원가입 창에서 사용자가 입력한 값들을 DB에 저장
    public function insertMember($id, $pw, $name) {
        try {
            $query = $this->db->prepare("insert into member values(:id, :pw, :name)");
            $query->bindValue(":id", $id, PDO::PARAM_STR);
            $query->bindValue(":pw", $pw, PDO::PARAM_STR);
            $query->bindValue(":name", $name, PDO::PARAM_STR);
            $query->execute();

        } catch(PDOException $e) {
            exit($e->getMessage());
        }
    }

    // 아이디가 $id인 회원 정보 업데이트
    // 회원정보를 수정할 경우 DB에 저장된 기존의 내용을 바꾼다.
    public function updateName($id, $name) {
        try {
            $query = $this->db->prepare("update member set name=:name where id=:id");
            $query->bindValue(":id", $id, PDO::PARAM_STR);
            $query->bindValue(":name", $name, PDO::PARAM_STR);
            $query->execute();

        } catch(PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function updatePassword($id, $pw) {
        try {
            $query = $this->db->prepare("update member set pw=:pw where id=:id");
            $query->bindValue(":id", $id, PDO::PARAM_STR);
            $query->bindValue(":pw", $pw, PDO::PARAM_STR);
            $query->execute();

        } catch(PDOException $e) {
            exit($e->getMessage());
        }
    }
}

?>