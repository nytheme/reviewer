<?php

namespace Reviewer;
use Reviewer\Model;

session_start();

class Model {
	protected $_db;
	protected $_words_per_page;

	//全関数で使える変数を設定
	public function __construct() {
		try {
			$this->_db = new \PDO(DSN, USER, PW);
			$this->_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			// １ページの単語表示数
			$this->_words_per_page = 20;

		} catch (\PDOException $e) {
			echo $e->getMessage();
			exit;
		}
	}

	//条件（日付）に該当する単語を全て表示
	public function getAll() {
		$w_p_page = $this->_words_per_page;
		$today = date('Y-m-d');

		if (isset($_GET['page'])) {
			if ($_GET['page'] == 1) {
				$start = 0;
				$end = $w_p_page;
			} else {
				$end = $_GET['page'] * $w_p_page;
				$start = $end  - ($w_p_page -1);
			}

			$stmt = $this->_db->query("SELECT * from words WHERE next_date <= '".$today."' ORDER BY id DESC LIMIT $start, $w_p_page");
		} else {
			$stmt = $this->_db->query("SELECT * from words WHERE next_date <= '".$today."' ORDER BY id DESC LIMIT 0, $w_p_page");
		}
		//fetchAll(\PDO::FETCH_OBJ)でオブジェクト形式で返す
		return $stmt->fetchAll(\PDO::FETCH_OBJ);
	}

	//ページネーション
	public function pagenation() {
		$w_p_page = $this->_words_per_page;
		$today = date('Y-m-d');
		$stmt = $this->_db->query("SELECT COUNT(id) from words WHERE next_date <= '".$today."' ");
		$pages = ceil($stmt->fetch(\PDO::FETCH_COLUMN) / $w_p_page);

		for ($i=1; $i<=$pages; $i++) {
			if ($_GET['page'] == $i) {
				echo "<a href=?page=".$i." style='font-weight:bold;color:blue;'>".$i."</a>";

			} elseif (!isset($_GET['page']) && $i == 1) {
				echo "<a href=?page=".$i." style='font-weight:bold;color:blue;'>".$i."</a>";

			} else {
				echo "<a href=?page=".$i.">".$i."</a>";
			}
		}

	}

	//編集ページ用に一件だけ表示
	public function getOne($id) {
		$stmt = $this->_db->query("SELECT * from words WHERE id = $id");
		return $stmt->fetchAll(\PDO::FETCH_OBJ);
	}

	//本日の単語
	public function getToday() {
		$today = date('Y-m-d');
		$stmt = $this->_db->query("SELECT * from words WHERE updated = '".$today."'");
		return $stmt->fetchAll(\PDO::FETCH_OBJ);
	}

	//Controller.php で起動。
	//main.js でPOSTされたmodeの内容によって処理を分岐
	public function post() {
		switch ($_POST['mode']) {
			case 'correct':
				$this->correct();
				break;
			case 'incorrect':
				$this->incorrect();
				break;
			case 'register':
				$this->registration();
				break;
			case 'revise':
				$this->revision();
				break;
		}
	}

	//正解・不正解で correct の値を変更する
	private function correct() {
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

	//単語登録
	private function registration() {
		// $columns = "(word,part_of_speach,japanese,category,memo,next_date,correct)";
		// $values = "(:word, :part_of_speach, :japanese, :category, :memo, :next_date, :correct)";

		$sql = 'INSERT INTO words (word, part_of_speach,japanese,category,memo,next_date,correct,updated) VALUES (:word, :part_of_speach, :japanese, :category, :memo, :next_date, :correct, :updated)';

		$stmt = $this->_db->prepare($sql);

		$stmt->execute([
			':word' => $_POST['word'],
			':part_of_speach' => $_POST['part_of_speach'],
			':japanese' => $_POST['japanese'],
			':category' => $_POST['category'],
			':memo' => $_POST['memo'],
			':next_date' => date('Y-m-d'),
			':correct' => 0,
			':updated' => date('Y-m-d')
		]);

		$stmt = null;
	}

	//単語修正
	private function revision() {
		$sql = 'UPDATE words SET word=:word, part_of_speach=:part_of_speach,japanese=:japanese,category=:category,memo=:memo WHERE id =:id';
		// ,next_date=:next_date,correct=:correct 

		$stmt = $this->_db->prepare($sql);

		$stmt->execute([
			':word' => $_POST['word'],
			':part_of_speach' => $_POST['part_of_speach'],
			':japanese' => $_POST['japanese'],
			':category' => $_POST['category'],
			':memo' => $_POST['memo'],
			// ':next_date' => date('Y-m-d'),
			// ':correct' => 0,
			':id' => $_POST['wordId']
		]);

		$stmt = null;
	}

}