<?php

require_once(__DIR__ . '/config/config.php');

$reviewer = new \Reviewer\Model();
$words = $reviewer->getOne($_GET['id']);

?>

<?php include('./header.php'); ?>

<form action="" id="revision">

<?php foreach ($words as $word) : ?>

	英単語：
		<input type="text" id="word" value="<?= h($word->word); ?>" required><br/>
		<div id="errorMessage"></div>
	品詞　：
		<select id="part_of_speach">
			<option value="1" <?php if($word->part_of_speach == 1){echo "selected";}?>>noun</option>
			<option value="2" <?php if($word->part_of_speach == 2){echo "selected";}?>>verb</option>
			<option value="3" <?php if($word->part_of_speach == 3){echo "selected";}?>>adjective</option>
			<option value="4" <?php if($word->part_of_speach == 4){echo "selected";}?>>adverb</option>
			<option value="5" <?php if($word->part_of_speach == 5){echo "selected";}?>>phrasal</option>
			<option value="9" <?php if($word->part_of_speach == 9){echo "selected";}?>>others</option>
		</select><br/>
	日本語：
		<input type="text" id="japanese" value="<?= h($word->japanese); ?>" required><br/>
	種類　：
		<select id="category">
			<option value="1" <?php if($word->category == 1){echo "selected";}?>>Daily</option>
			<option value="2" <?php if($word->category == 2){echo "selected";}?>>Conversation</option>
			<option value="3" <?php if($word->category == 3){echo "selected";}?>>Academic</option>
			<option value="4" <?php if($word->category == 4){echo "selected";}?>>Writing</option>
			<option value="5" <?php if($word->category == 5){echo "selected";}?>>Economy</option>
			<option value="5" <?php if($word->category == 6){echo "selected";}?>>Tech</option>
		</select><br/>
	メモ　：
		<input type="text" id="memo" value="<?= h($word->memo); ?>"><br/>
		<input type="hidden" id="revise" value="revise"><br/>
		<input type="hidden" id="wordId" value="<?= $_GET['id']; ?>"><br/>
		<button>修正</button>
		<div id="revisedMessage"></div>

<?php endforeach; ?>

</form>

<?php include('./footer.php'); ?>