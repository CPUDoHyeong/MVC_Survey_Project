<?php
class noticeBoard extends Controller {
	
	// 글 작성 화면
	public function write_form() {
		require 'application/views/_templates/header.php';
		require 'application/views/help/help_nav.php';
		require 'application/views/help/about_company.php';
	}

	// 글 작성 처리
	public function write() {

	}

	// 글 보는 화면
	public function view($num) {
		
	}

	// 글 업데이트 화면
	public function update_form($num) {
		
	}

	// 글 업데이트 처리
	public function update($num) {

	}

	// 글 삭제 처리
	public function del($num) {
		
	}
}