<?php

require_once(__DIR__ . '/config/config.php');

$reviewer = new \Reviewer\Model();
$words = $reviewer->getOne($_GET['id']);

?>

<?php include('./header.php'); ?>

<form action="" id="revision">

<?php foreach ($words as $word) : ?>

	<p>英単語：<br/>
		<input type="text" id="word" value="<?= h($word->word); ?>" required>
	</p>
	<div id="errorMessage"></div>
	<p>品詞：<br/>
		<select id="part_of_speach">
			<option value="1" <?php if($word->part_of_speach == 1){echo "selected";}?>>noun</option>
			<option value="2" <?php if($word->part_of_speach == 2){echo "selected";}?>>verb</option>
			<option value="3" <?php if($word->part_of_speach == 3){echo "selected";}?>>adjective</option>
			<option value="4" <?php if($word->part_of_speach == 4){echo "selected";}?>>adverb</option>
			<option value="5" <?php if($word->part_of_speach == 5){echo "selected";}?>>phrasal</option>
			<option value="9" <?php if($word->part_of_speach == 9){echo "selected";}?>>others</option>
		</select>
	</p>
		<p>日本語：<br/>
			<input type="text" id="japanese" value="<?= h($word->japanese); ?>" required><br/>
	</p>
	<p>品詞２：<br/>
		<select id="part_of_speach2">
			<option value="0" <?php if($word->part_of_speach2 == 0){echo "selected";}?>></option>
			<option value="1" <?php if($word->part_of_speach2 == 1){echo "selected";}?>>noun</option>
			<option value="2" <?php if($word->part_of_speach2 == 2){echo "selected";}?>>verb</option>
			<option value="3" <?php if($word->part_of_speach2 == 3){echo "selected";}?>>adjective</option>
			<option value="4" <?php if($word->part_of_speach2 == 4){echo "selected";}?>>adverb</option>
			<option value="5" <?php if($word->part_of_speach2 == 5){echo "selected";}?>>phrasal</option>
			<option value="9" <?php if($word->part_of_speach2 == 9){echo "selected";}?>>others</option>
		</select>
</p>
		<p>日本語２：<br/>
			<input type="text" id="japanese2" value="<?= h($word->japanese2); ?>">
		</p>
		
	<p>種類：<br/>
		<select id="category">
			<option value="1" <?php if($word->category == 1){echo "selected";}?>>Daily</option>
			<option value="2" <?php if($word->category == 2){echo "selected";}?>>Conversation</option>
			<option value="3" <?php if($word->category == 3){echo "selected";}?>>Academic</option>
			<option value="4" <?php if($word->category == 4){echo "selected";}?>>Writing</option>
			<option value="5" <?php if($word->category == 5){echo "selected";}?>>Economy</option>
			<option value="5" <?php if($word->category == 6){echo "selected";}?>>Tech</option>
		</select>
	</p>
	<p>メモ：<br/>
		<textarea type="text" id="memo"><?= h($word->memo); ?></textarea>
	</p>
	
		<input type="hidden" id="revise" value="revise"><br/>
		<input type="hidden" id="wordId" value="<?= $_GET['id']; ?>"><br/>
		<button>修正</button>
		<div id="revisedMessage"></div>

<?php endforeach; ?>

</form>

<?php include('./footer.php'); ?>