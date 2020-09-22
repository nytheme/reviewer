<?php

require_once(__DIR__ . '/../config/config.php');

$reviewer = new \Reviewer\Model();

//POSTされたときだけ処理する
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	try {
		$reviewer->post();
		exit;
	} catch (Exception $e) {
		//SERVER_PROTOCOL で HTTP/1.0 や HTTP/1.1 を返す
		header($_SERVER['SERVER_PROTOCOL'] . '500 Internal Server Error' , true, 500);
		echo $e->getMessage();
		exit;
	}
}