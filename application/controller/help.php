<?php
class Help extends Controller
{      
	public function index()	{    
		$this->notices(0, 0);
    }
    
    // 공지사항
	public function notices($num, $page) {  
        $notices_board_model = $this->loadModel('NoticesBoardModel');
        $board_list = $notices_board_model->getBoardList();        
        require 'application/views/_templates/header.php';

        // 전체 행수를 반환 받는다.
        $countBoard = $notices_board_model->getBoardCount();

        // 게시글이 없다면 아래의 작업을 처리하지 않아도 된다.
        if($countBoard > 0) {

            // 전체 페이지 수 구함.
            $numPages = ceil($countBoard / NUM_LINES);

            if($page < 1)
                $page = 1;
            if($page > $numPages)
                $page = $numPages;

            $start = ($page - 1) * NUM_LINES;
            $viewList = $notices_board_model->getLineList($start, NUM_LINES);
            
            $firstLink = floor(($page - 1) / NUM_PAGE_LINKS) * NUM_PAGE_LINKS + 1;
            $lastLink = $firstLink + NUM_PAGE_LINKS - 1;
            if($lastLink > $numPages) {
                $lastLink = $numPages;
            }
        }
        require 'application/views/help/help_nav.php';
		require 'application/views/help/notices.php';
    }
    
    // 연락하기
	public function contact() {
        require 'application/views/_templates/header.php';
        require 'application/views/help/help_nav.php';
		require 'application/views/help/contact.php';
    }
    
    // 회사소개
	public function about_company()	{
        require 'application/views/_templates/header.php';
        require 'application/views/help/help_nav.php';
		require 'application/views/help/about_company.php';
    }

    // 이용약관
    public function terms() {
        require 'application/views/_templates/header.php';
        require 'application/views/help/help_nav.php';
        require 'application/views/help/terms.php';
    }

    // 개인정보처리방침
    public function privacy() {
        require 'application/views/_templates/header.php';
        require 'application/views/help/help_nav.php';
        require 'application/views/help/privacy.php';
    }

    // 글 작성 화면
	public function write_form() {
        $notices_board_model = $this->loadModel('NoticesBoardModel');
        require 'application/views/_templates/header.php';
		require 'application/views/help/help_nav.php';
		require 'application/views/help/write_form.php';
	}

	// 글 작성 처리
	public function write() {
        require 'application/libs/tools.php';

        $writer = requestValue('id');
        $title = requestValue('title');
        $content = requestValue('content');

        // 먼저 로그인 되어있는지와 master인지 체크
        if(!$writer || $writer != 'master') {
            errorBack('master 계정으로 로그인 후 작성 가능');
        } else {
            if($title && $content) {
                $notices_board_model = $this->loadModel('NoticesBoardModel');
                $notices_board_model->insertBoard($writer, $title, $content);    

                okGo('정상적으로 등록 되었습니다.', '/help/');
            } else {
                errorBack('내용을 입력해 주세요.');
            }
        }
	}

	// 글 보는 화면
	public function view($num, $page) {
        $notices_board_model = $this->loadModel('NoticesBoardModel');
        $row = $notices_board_model->getBoardView($num);
        //echo "<script>alert('$page');</script>";
		require 'application/views/_templates/header.php';
        require 'application/views/help/help_nav.php';
        require 'application/views/help/view.php';
	}

	// 글 업데이트 화면
	public function update_form($num, $page) {
        $notices_board_model = $this->loadModel('NoticesBoardModel');
        $row = $notices_board_model->getBoardView($num);
		require 'application/views/_templates/header.php';
		require 'application/views/help/help_nav.php';
		require 'application/views/help/update_form.php';
	}

	// 글 업데이트 처리
	public function update($num, $page) {
        require 'application/libs/tools.php';

        $writer = requestValue('id');
        $title = requestValue('title');
        $content = requestValue('content');

        // 먼저 로그인 되어있는지와 master인지 체크
        if(!$writer || $writer != 'master') {
            errorBack('master 계정으로 로그인 후 수정 가능');
        } else {
            if($title && $content) {
                $notices_board_model = $this->loadModel('NoticesBoardModel');
                $notices_board_model->updateBoard($num, $title, $content);    

                okGo('정상적으로 등록 되었습니다.', bdUrl('/help/notices', -1, $page));
            } else {
                errorBack('내용을 입력해 주세요.');
            }
        }
	}

	// 글 삭제 처리
	public function delete($num, $page) {
		require 'application/libs/tools.php';

        session_start_if_none();

        $writer = sessionVar("uid");

        // 먼저 로그인 되어있는지와 master인지 체크
        if(!$writer || $writer != 'master') {
            errorBack('master 계정으로 로그인 후 삭제 가능');
        } else {
            
            $notices_board_model = $this->loadModel('NoticesBoardModel');
            $notices_board_model->deleteBoard($num);    

            okGo('정상적으로 삭제 되었습니다.', bdUrl('/help/notices', -1, $page));
        }
	}
}

?>