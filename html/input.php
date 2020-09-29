<?php require_once(__DIR__ . '/config/config.php'); ?>

<?php include('./header.php'); ?>

<form action="" id="register">
	英単語：
		<input type="text" id="word" required><br/>
		<div id="errorMessage"></div>
	品詞　：
		<select id="part_of_speach">
			<option value="1" selected>noun</option>
			<option value="2">verb</option>
			<option value="3">adjective</option>
			<option value="4">adverb</option>
			<option value="5">phrasal</option>
			<option value="9">others</option>
		</select><br/>
	日本語：
		<input type="text" id="japanese" required><br/>
	種類　：
		<select id="category">
			<option value="1" selected>Daily</option>
			<option value="2">Conversation</option>
			<option value="3">Academic</option>
			<option value="4">Writing</option>
			<option value="5">Economy</option>
			<option value="6">Tech</option>
		</select><br/>
	メモ　：
		<input type="text" id="memo"><br/>

		<!-- <input type="hidden" id="next_date" value=""><br/>
		<input type="hidden" id="correct" value="0"><br/> -->
		<input type="hidden" id="registerd" value="registerd"><br/>
	<button>登録</button>

</form>

<?php include('./footer.php'); ?>