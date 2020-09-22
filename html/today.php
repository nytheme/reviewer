<?php

require_once(__DIR__ . '/config/config.php');

$reviewer = new \Reviewer\Model();
$words = $reviewer->getToday();

?>

<?php include('./header.php'); ?>

<table>

<?php

$i = 1;

foreach($words as $word) {
	echo "<tr id='words'>";

		// echo "<td class='right_side'><a href='revision.php?id=".$word->id."'><button>修正</button></a></td>";
		// echo "<td><button class='correct' data-id='".$word->id."' data-correct='".$word->correct."'>正解</button></td>";
		// echo "<td><button class='incorrect' data-id='".$word->id."' data-correct='".$word->correct."'>不正解</button></td>";
		
		echo "<th class='jap_".$i."' onclick='openAnswer(this);return false;'>" . h($word->word) . "</th>";

		echo "<td class='disp-none'>";

		if ($word->part_of_speach == 1) {
			echo "(名)";
		} elseif ($word->part_of_speach == 2) {
			echo "(動)";
		} elseif ($word->part_of_speach == 3) {
			echo "(形)";
		} elseif ($word->part_of_speach == 4) {
			echo "(副)";
		} elseif ($word->part_of_speach == 5) {
			echo "(句)";
		} elseif ($word->part_of_speach == 9) {
			echo "(他)";
		}

		echo h($word->japanese) . "</td>";
		// echo "<td>" . $word->category . "</td>";
		// echo "<td>" . $word->memo . "</td>";
		
	echo "</tr>";

	$i++;
}

?>

</table>

<!-- <div class="pagenation">
	<?php //$reviewer->pagenation(); ?>
</div> -->

<?php include('./footer.php'); ?>