<?php require_once(__DIR__ . '/config/config.php'); ?>

<?php include('./header.php'); ?>

<form action="" id="register">
	英単語：
		<input type="text" id="word" required><br/>
		<div id="errorMessage"></div>
	品詞　：
		<select id="part_of_speach">
			<option value="1" selected>名詞</option>
			<option value="2">動詞</option>
			<option value="3">形容詞</option>
			<option value="4">副詞</option>
			<option value="5">句動詞</option>
			<option value="9">その他</option>
		</select><br/>
	日本語：
		<input type="text" id="japanese" required><br/>
	種類　：
		<select id="category">
			<option value="1" selected>基礎</option>
			<option value="2">日常</option>
			<option value="3">会話</option>
			<option value="4">文学</option>
			<option value="5">経済</option>
		</select><br/>
	メモ　：
		<input type="text" id="memo"><br/>

		<!-- <input type="hidden" id="next_date" value=""><br/>
		<input type="hidden" id="correct" value="0"><br/> -->
		<input type="hidden" id="registerd" value="registerd"><br/>
	<button>登録</button>

</form>

<?php include('./footer.php'); ?>