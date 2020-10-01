<?php
//オブジェクト指向を使わない場合の記述
		// $user = 'root';
		// $pass = 'secret';
		// try {
		// 	$dbh = new PDO('mysql:host=db;dbname=reviewer', $user, $pass);
		// 	$sth = $dbh->query('SELECT * from words');
		// 	foreach($words as $word) {
		// 		echo "<tr>";
		// 		echo "<th>" . $word['word'] . "</th>";
		// 		//以下同様・・・
		// 	}
		// 		$sth = null;
		// 		$dbh = null;

		// 	} catch (PDOException $e) {
		// 		print "エラー!: " . $e->getMessage() . "<br/gt;";
		// 		die();
		// 	}
//オブジェクト指向を使わない場合　ここまで

require_once(__DIR__ . '/config/config.php');

$reviewer = new \Reviewer\Model();
$words = $reviewer->getAll();

?>

<?php include('./header.php'); ?>

<table>

<?php

$i = 1;

foreach($words as $word) {
	echo "<tr id='words'>";

		echo "<td class='right_side'><a href='revision.php?id=".$word->id."'><button><i class='fas fa-pen'></i></button></a></td>";
		echo "<td class='speach' data-word='$word->word'><button><i class='fas fa-volume-up'></i></i></button></td>";
		echo "<td><button class='correct' data-id='".$word->id."' data-correct='".$word->correct."'><i class='far fa-circle'></i></button></td>";
		echo "<td><button class='incorrect' data-id='".$word->id."' data-correct='".$word->correct."'><i class='fas fa-times'></i></button></td>";
		
		echo "<th class='jap_".$i."' onclick='openAnswer(this);return false;'>" . h($word->word) . "</th>";

		echo "<td class='disp-none'>";

		if ($word->part_of_speach == 1) {
			echo "【名】 ";
		} elseif ($word->part_of_speach == 2) {
			echo "【動】 ";
		} elseif ($word->part_of_speach == 3) {
			echo "【形】 ";
		} elseif ($word->part_of_speach == 4) {
			echo "【副】 ";
		} elseif ($word->part_of_speach == 5) {
			echo "【句】 ";
		} elseif ($word->part_of_speach == 9) {
			echo "【他】 ";
		}
		echo h($word->japanese);

		if ($word->part_of_speach2 == 1) {
			echo "【名】 ";
		} elseif ($word->part_of_speach2 == 2) {
			echo "【動】 ";
		} elseif ($word->part_of_speach2 == 3) {
			echo "【形】 ";
		} elseif ($word->part_of_speach2 == 4) {
			echo "【副】 ";
		} elseif ($word->part_of_speach2 == 5) {
			echo "【句】 ";
		} elseif ($word->part_of_speach2 == 9) {
			echo "【他】 ";
		}
		echo h($word->japanese2);

		echo "</td>";

		// echo "<td>" . $word->category . "</td>";
		// echo "<td>" . $word->memo . "</td>";
		echo "<td class='right_side'>" . $word->next_date . "</td>";
		echo "<td class='right_side'>" . $word->correct . "</td>";
		echo "<td class='right_side'>" . $word->updated . "</td>";
		
	echo "</tr>";

	$i++;
}

?>

</table>

<div class="pagenation">
	<?php $reviewer->pagenation(); ?>
</div>

<?php include('./footer.php'); ?>