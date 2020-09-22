<?php

namespace Reviewer\Model;

session_start();

class Correct extends \Reviewer\Model {

	//正解・不正解で correct の値を変更する
	public function correct() {
		$id = $_POST['id'];

		$correct_data = $_POST['correct'];
		$today = date('Y-m-d');

		if ($correct_data == 0 || $correct_data == 2) {
			$date = date('Y-m-d', strtotime("+1 day"));
			$stmt = $this->_db->query("UPDATE words SET correct = correct +1, next_date = '".$date."', updated = '".$today."' WHERE id = $id");

		} elseif ($correct_data == 4) {
			$date = date('Y-m-d', strtotime("+3 day"));
			$stmt = $this->_db->query("UPDATE words SET correct = correct +1, next_date = '".$date."', updated = '".$today."' WHERE id = $id");

		} elseif ($correct_data == 6) {
			$date = date('Y-m-d', strtotime("+7 day"));
			$stmt = $this->_db->query("UPDATE words SET correct = correct +1, next_date = '".$date."', updated = '".$today."' WHERE id = $id");

		} elseif ($correct_data == 8) {
			$date = date('Y-m-d', strtotime("+14 day"));
			$stmt = $this->_db->query("UPDATE words SET correct = correct +1, next_date = '".$date."', updated = '".$today."' WHERE id = $id");

		} elseif ($correct_data == 10) {
			$date = date('Y-m-d');
			$stmt = $this->_db->query("UPDATE words SET next_date = '".$date."' WHERE id = $id");
		}

		$stmt->execute();
		$stmt = null;

	}

	//正解・不正解で correct の値を変更する
	private function incorrect() {
		$id = $_POST['id'];
		$correct_data = $_POST['correct'];

		$date = date('Y-m-d', strtotime("+1 day"));
		$today = date('Y-m-d');

		if ($correct_data <= 4) {
			$stmt = $this->_db->query("UPDATE words SET correct = 0, next_date = '".$date."', updated = '".$today."' WHERE id = $id");
		} elseif ($correct_data >= 6) {
			$stmt = $this->_db->query("UPDATE words SET correct = 2, next_date = '".$date."', updated = '".$today."' WHERE id = $id");
		}

		$stmt->execute();
		$stmt = null;

	}

}