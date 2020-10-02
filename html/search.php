<?php

require_once(__DIR__ . '/config/config.php');

$reviewer = new \Reviewer\Model();
// $words = $reviewer->getOne(50);
if (isset($_GET['word'])) {
	$words = $reviewer->searchWord($_GET['word']);
}

?>

<?php include('./header.php'); ?>

<form action="" id="search" method="get">
	<p>検索したい単語を入力してください<br/>
		<input type="text" id="" name="word">
	</p>
	<button type="submit">Search</button>
</form>

<?php if (isset($_GET['word'])) :?>
	<?php if (count($words) == 0):?>
		<p style="margin-left:3em;"> <?= $_GET['word']; ?>  は登録されていません</p>

	<?php else: ?>
		<section id="searched_word">
		<?php foreach ($words as $word) : ?>

			<p>英単語　：
				<span><?= h($word->word); ?></span>
			</p>
			<p>品詞　　：
			<?php 
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
			?>
			</p>
			<p>日本語　：
				<span><?= h($word->japanese); ?></span>
			</p>
			<?php if ($word->part_of_speach2 != NULL) : ?>
			<p>品詞２　：
			<?php 
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
			?>
			</p>
			<?php endif;?>
			<?php if ($word->japanese2 != NULL):?>
			<p>日本語２：
				<span><?= h($word->japanese2); ?></span>
			</p>
			<?php endif; ?>
			<p>種類　　：
			<?php
				if ($word->category == 1) {
					echo "Daily";
				} elseif ($word->category == 2) {
					echo "Conversation";
				} elseif ($word->category == 3) {
					echo "Academic";
				} elseif ($word->category == 4) {
					echo "Writing";
				} elseif ($word->category == 5) {
					echo "Economy";
				} elseif ($word->category == 6) {
					echo "Tech";
				}
			?>
			</p>
			<?php if ($word->memo != NULL): ?>
			<p>メモ　　：
				<span><?= h($word->memo); ?></span>
			</p>
			<?php endif ;?>
			<?php
				echo $word->next_date . "<br>";
				echo $word->correct . "<br>";
				echo $word->updated . "<br>";
			?>
			<button id="serchRevisionBtn"><a href="revision.php?id='<?= h($word->id);?>'">修正</a></button>

		<?php endforeach; ?>
		</section>
	<?php endif; ?>
<?php endif; ?>

<?php include('./footer.php'); ?>