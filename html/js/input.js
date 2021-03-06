'use strict';

{
	$('#word').focus();

	$('#register').on('submit', function() {
		//フォームに入力したテキストを変数に格納
		let beforeCheckWord = $('#word').val();
		//半角英・記号・スペース（zの後にスペース）を許可
		if (beforeCheckWord.match(/^[A-Za-z !#$%&()*+,.:;=?@\[\]^_{}-]*$/)) {
			let word = beforeCheckWord;
			let part_of_speach = $('#part_of_speach').val();
			let japanese = $('#japanese').val();
			let part_of_speach2 = $('#part_of_speach2').val();
			let japanese2 = $('#japanese2').val();
			let category = $('#category').val();
			let memo = $('#memo').val();
			let registerd = $('#registerd').val();

			$.post('/../lib/Controller.php', {
				word: word,
				part_of_speach: part_of_speach,
				japanese: japanese,
				part_of_speach2: part_of_speach2,
				japanese2: japanese2,
				category: category,
				memo: memo,
				registerd: registerd,
				mode: 'register'
			}, function(res) {
				if (res.msg == 1) { //単語が重複している場合
					document.getElementById('errorMessage').textContent = res.message;
				
				} else {
					// フォームのクリア
					$("#word").val("").focus();
					$("#japanese").val("");
					$("#japanese2").val("");
					$("#memo").val("");
					document.getElementById('errorMessage').textContent = res.message;
				
					console.log(res.message);
				}
			});
			return false; //画面遷移を防ぐ

		} else { //フォームに全角・数字が入力された場合
			console.log('false');
			document.getElementById('errorMessage').textContent = '半角英・記号のみ入力可';
			return false; //画面遷移を防ぐ
		}

	});


	$('#revision').on('submit', function() {
		//フォームに入力したテキストを変数に格納
		let beforeCheckWord = $('#word').val();
		//半角英・記号・スペース（zの後にスペース）を許可
		if (beforeCheckWord.match(/^[A-Za-z !#$%&()*+,.:;=?@\[\]^_{}-]*$/)) {
			let wordId = $('#wordId').val();
			let word = beforeCheckWord;
			let part_of_speach = $('#part_of_speach').val();
			let japanese = $('#japanese').val();
			let part_of_speach2 = $('#part_of_speach2').val();
			let japanese2 = $('#japanese2').val();
			let category = $('#category').val();
			let memo = $('#memo').val();
			let revise = $('#revise').val();

			$.post('/../lib/Controller.php', {
				wordId: wordId,
				word: word,
				part_of_speach: part_of_speach,
				japanese: japanese,
				part_of_speach2: part_of_speach2,
				japanese2: japanese2,
				category: category,
				memo: memo,
				revise: revise,
				mode: 'revise'
			}, function() {
				console.log('revise');
			});

			document.getElementById('revisedMessage').textContent = '修正しました';
			return false; //画面遷移を防ぐ

		} else { //フォームに全角・数字が入力された場合
			console.log('false');
			document.getElementById('errorMessage').textContent = '半角英・記号のみ入力可';
			return false; //画面遷移を防ぐ
		}

	});

}