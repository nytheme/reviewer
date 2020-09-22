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
		$(this).css('color', 'red');
	});

	$('.incorrect').on('click', function() {
		let id = $(this).data('id');
		let correct_data = $(this).data('correct');
		incorrect(id, correct_data);
		$(this).css('color', 'red');
	});

}