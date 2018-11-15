<?php
// php가 실행하면서 발생하는 모든 에러 메시지에 대해 리포팅을 하도록
// 설장하고 화면에 표시하도록 설정한다.
error_reporting(E_ALL);
ini_set("display_errors", 1);
// URL이라는 상수를 선언한다.
define('URL', 'http://127.0.0.1/');
/** DB관련 환경설정 값*/
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'term');
define('DB_USER', 'root');
define('DB_PASS', '1234');
// 게시판 page 상수 값 정의
define("NUM_LINES", 5);      // 한 페이지에 몇 개의 게시글을 보여줄지
define("NUM_PAGE_LINKS", 5); // 화면에 표시될 페이지 링크 수
?>