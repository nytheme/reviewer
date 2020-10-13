'use strict';

	//index.php onclick で起動
	function openAnswer( obj ) {
		// クリックした単語のクラスを取得し、「.」を追加して変数に
		let targetClass = '.' + obj.getAttribute('class');
		//クラスの要素を取得
		let target = document.querySelector(targetClass);
		//（兄弟要素の中の）次の要素を取得する
		let next = target.nextElementSibling;
		next.classList.toggle('disp-none');
	}

	$('.speach').on('click', function() {
		let word = $(this).data('word');
		let u = new SpeechSynthesisUtterance();
    u.lang = 'en-US';
    u.text = word;
    speechSynthesis.speak(u);
	});

	function switchShowWords() {
		let target = document.querySelectorAll('.today_correct');
		//querySelectorAll()で返ってくるNodeListオブジェクトは
		//単純な配列ではないので for でこのように書いた
		for (let i = 0; i < target.length; i++){
			target[i].classList.toggle('word_disp-none');
		}
		document.getElementById('incorrecr_today').classList.toggle('word_disp-none');
		document.getElementById('correcr_today').classList.toggle('word_disp-none');
	}

{
	function correct(id, correct_data) {
		//ajaxを取得
		//「$.post」は単にjQueryでこういう書き方をするもの
		// $.post( サーバーへのパス, 任意のデータ, （更新処理が終わった後の処理）)
		$.post('/../lib/Controller.php', { id: id, correct: correct_data, mode: 'correct' });
	}

	function incorrect(id, correct_data) {
		$.post('/../lib/Controller.php', { id: id, correct: correct_data, mode: 'incorrect' });
	}

	$('.correct').on('click', function() {
		let id = $(this).data('id');
		let correct_data = $(this).data('correct');
		correct(id, correct_data);
		let dispNone = $(this).closest('tr').find('.correctResult');
		let incorrectBtn = $(this).closest('tr').find('.incorrect');
		incorrectBtn.remove();
		dispNone.removeClass();
		$(this).remove();
	});

	$('.incorrect').on('click', function() {
		let id = $(this).data('id');
		let correct_data = $(this).data('correct');
		incorrect(id, correct_data);
		$(this).css('color', 'red');
		let dispNone = $(this).closest('tr').find('.incorrectResult');
		let correctBtn = $(this).closest('tr').find('.correct');
		correctBtn.remove();
		dispNone.removeClass();
		$(this).remove();
	});

}