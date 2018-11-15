<?php
class Controller {

    public $db = null;
    function __construct()
	{	
		// 생성자에서 dbConnect라는 함수를 실행한다
		// 이 함수의 내용이 생성자에 있어도 된다.
		$this->dbConnect();
	}
 
	private function dbConnect()
	{
		$options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
		$this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS, $options);
	}
 
	public function loadModel($model_name)
	{	
		// strtolower는 대문자를 소문자로 변환해준다
		require 'application/models/' . strtolower($model_name) . '.php';
		// board생성과 함께 db정보를 파라미터로 넘겨준다.
		return new $model_name($this->db);
	}
}
?>