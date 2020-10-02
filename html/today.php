<?php

require_once(__DIR__ . '/config/config.php');

$reviewer = new \Reviewer\Model();
$words = $reviewer->getToday();

?>

<?php include('./header.php'); ?>

<p id="incorrecr_today" class="word_disp-none" onclick="switchShowWords()">不正解のみ表示する</p>
<p id="correcr_today" onclick="switchShowWords()">全て表示する</p>

<table>

<?php

$i = 1;

foreach($words as $word) {
	echo "<tr id='words' ";
	if($word->answer == 0 || $word->answer == NULL){ echo "class='today_correct word_disp-none'"; }
	echo ">";

		echo "<td class='right_side'><a href='revision.php?id=".$word->id."'><button><i class='fas fa-pen'></i></button></a></td>";
		echo "<td class='speach' data-word='$word->word'><button><i class='fas fa-volume-up'></i></i></button></td>";
			
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

<!-- <div class="pagenation">
	<?php //$reviewer->pagenation(); ?>
</div> -->

<?php include('./footer.php'); ?>