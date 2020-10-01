<?php require_once(__DIR__ . '/config/config.php'); ?>

<?php include('./header.php'); ?>

<form action="" id="register">
	<p>英単語：<br/>
		<input type="text" id="word" required>
	</p>	
	<div id="errorMessage"></div>
	<p>品詞：<br/>
		<select id="part_of_speach">
			<option value="1" selected>noun</option>
			<option value="2">verb</option>
			<option value="3">adjective</option>
			<option value="4">adverb</option>
			<option value="5">phrasal</option>
			<option value="9">others</option>
		</select>
	</p>
	<p>日本語：<br/>
		<textarea type="text" id="japanese" required></textarea>
	</p>
	<p>品詞２：<br/>
		<select id="part_of_speach2">
			<option value="0" selected></option>
			<option value="1">noun</option>
			<option value="2">verb</option>
			<option value="3">adjective</option>
			<option value="4">adverb</option>
			<option value="5">phrasal</option>
			<option value="9">others</option>
		</select>
	</p>
	<p>日本語２：<br/>
		<textarea type="text" id="japanese2"></textarea>
	</p>
	<p>種類：<br/>
		<select id="category">
			<option value="1" selected>Daily</option>
			<option value="2">Conversation</option>
			<option value="3">Academic</option>
			<option value="4">Writing</option>
			<option value="5">Economy</option>
			<option value="6">Tech</option>
		</select>
	</p>
	<p>メモ：<br/>
		<textarea type="text" id="memo"></textarea>
	</p>
		
		<input type="hidden" id="registerd" value="registerd"><br/>
	<button>登録</button>

</form>

<?php include('./footer.php'); ?>