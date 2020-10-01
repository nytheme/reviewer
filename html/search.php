<?php

require_once(__DIR__ . '/config/config.php');

$reviewer = new \Reviewer\Model();
$words = $reviewer->getOne(50);
//$words = $reviewer->getOne($_GET['id']);

?>

<?php include('./header.php'); ?>

<form action="" id="search">
	<p>検索したい単語を入力してください<br/>
		<input type="text" id="" >
	</p>
</form>



<?php foreach ($words as $word) : ?>

	<p>英単語：<br/>
		<?= h($word->word); ?>
	</p>
	<p>品詞：<br/>
		<?= h($word->part_of_speach); ?>
	</p>
		<p>日本語：<br/>
			<?= h($word->japanese); ?>
	</p>
	<p>品詞２：<br/>
		<?= h($word->part_of_speach2); ?>
</p>
		<p>日本語２：<br/>
			<?= h($word->japanese2); ?>
		</p>
		
	<p>種類：<br/>
		<?= h($word->category); ?>
	</p>
	<p>メモ：<br/>
		<?= h($word->memo); ?>
	</p>
	
	
	<button>修正</button>


<?php endforeach; ?>



<?php include('./footer.php'); ?>