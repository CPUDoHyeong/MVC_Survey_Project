<?php
 
class NoticesBoardModel {

	function __construct($db) {
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('데이터베이스 연결에 오류가 발생했습니다.');
		}
	}

	// 전체 글 리턴
	public function getBoardList() {
		$sql = "SELECT num, title, regtime FROM notice_board ORDER BY num DESC";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	// 게시판의 전체 행수 반환
	public function getBoardCount() {
		$sql = "SELECT COUNT(*) FROM notice_board";

		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchColumn();
	}

	// 정해진 행에 대한 값만 리턴
	public function getLineList($start, $rows) {
		$sql = "SELECT * FROM notice_board ORDER BY num DESC LIMIT :start, :rows";

		$query = $this->db->prepare($sql);

		$query->bindValue(":start", $start, PDO::PARAM_INT);
		$query->bindValue(":rows", $rows, PDO::PARAM_INT);
		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	// 글 보여주기
	public function getBoardView($num) {
		$sql = "SELECT * FROM notice_board WHERE num=:num";
		$query = $this->db->prepare($sql);
		$query->bindValue(":num", $num, PDO::PARAM_INT);
		$query->execute();

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	// 글 삽입
	public function insertBoard($writer, $title, $content) {
		$title = strip_tags($title);
		$content = strip_tags($content);
		$regtime = date("Y-m-d H:i:s");

		$sql = "INSERT INTO notice_board (writer, title, content, regtime) VALUES (:writer, :title, :content, :regtime)";
		$query = $this->db->prepare($sql);

		$query->bindValue(":writer", $writer, PDO::PARAM_STR);
		$query->bindValue(":title", $title, PDO::PARAM_STR);
		$query->bindValue(":content", $content, PDO::PARAM_STR);
		$query->bindValue(":regtime", $regtime, PDO::PARAM_STR);

		$query->execute();
	}

	// 글 수정
	public function updateBoard($num, $title, $content) {
		$num = (int)$num;
		$title = strip_tags($title);
		$content = strip_tags($content);
		
		$sql = "UPDATE notice_board SET title = :title, content = :content WHERE num = :num";
		$query = $this->db->prepare($sql);

		$query->bindValue(":num", $num, PDO::PARAM_INT);
		$query->bindValue(":title", $title, PDO::PARAM_STR);
		$query->bindValue(":content", $content, PDO::PARAM_STR);

		$query->execute();
	}

	// 글 삭제
	public function deleteBoard($num) {
		$num = (int)$num;

		$sql = "DELETE FROM notice_board WHERE num = :num";
		$query = $this->db->prepare($sql);

		$query->bindValue(":num", $num, PDO::PARAM_INT);

		$query->execute();
	}
}

?>