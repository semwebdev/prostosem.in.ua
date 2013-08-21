$(document).ready(function(){
	browse();
	function browse(){
		countImages = 2;
		browser = $('<div id="browser"></div>').css({backgroundColor: '#666',position: 'absolute', width: '100%', height: '100%',overflow: 'auto'});
		for(var i = 1; i <= countImages; i++){
			$('<img class="puzzle-preview" data-folder="' + i + '"></img>').appendTo(browser)
			.attr('src','img/' + i + '/original.png')
			.css({
				width: '50%',
				height: '50%',
				float: 'left',
				cursor: 'pointer'
				})
			.click(function(){
				folder = $(this).data('folder');
				mixItems();
				setImage();
				$('#browser').remove();
			});
		}
		browser.appendTo('#puzzle');
	}
	function setImage(){
		for(var i = 0; i < 15; i++){
			$('.puzzle-item').eq(i).css('background-image','url(img/' + folder + '/' + (i + 1) +'.png)');
		}
	}
	function mixItems (start){
		var indexes = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
		//если start = true, то случайным образом перемешиваем элементы в массиве
		if(start != true){
			var indexes = indexes.sort(function() {return 0.5 - Math.random()});
		}
		var key = 0;
		// i - это отступ сверху
		for(var i = 0; i <= 75; i= i + 25){
			// j - это отступ слева
			for(var j = 0; j <= 75; j = j + 25){
				var element = $('.puzzle-item').eq(indexes[key]);
				element.animate({'top': i + '%','left': j + '%'},450);
				key++;
			}
		}
	}

	$('.puzzle-item').click(function(){
		var target = $('#puzzle16'); //запоминаем пустую ячейку
		var targetPosition = target.position(); //позиция пустой ячейки
		var position = $(this).position(); //позиция выбранного пазла
		//переводим отступ сверху пустой ячейки в проценты
		var targetTop = Math.round(targetPosition.top * 100 / parseInt($('#puzzle').height()));
		//переводим отступ сверху выбранного пазла в проценты
		var elemTop = Math.round(position.top * 100 / parseInt($('#puzzle').height()));
		//переводим отступ слева пустой ячейки в проценты
		var targetLeft = Math.round(targetPosition.left * 100 / parseInt($('#puzzle').width()));
		//переводим отступ сверху выбранного пазла в проценты
		var elemLeft = Math.round(position.left * 100 / parseInt($('#puzzle').width()));
		//проверяем являются ли они соседями
		if(Math.abs((Math.abs(targetTop - elemTop)) + Math.abs((targetLeft - elemLeft))) == 25){
				//меняем местами позиции этих элементов
				$(this).animate({top: targetTop + '%',left: targetLeft + '%'},100);
				target.css({top: elemTop + '%', left: elemLeft + '%'});
		}
	});
	$("#puzzle-refresh").click(function(){
		mixItems();
	});
	$("#puzzle-default").click(function(){
		mixItems(true);
	});
	$("#puzzle-original").mousedown(function(){
		$('<div id="original"></div>').appendTo('#puzzle').css({backgroundImage: 'url(img/' + folder + '/original.png)',
												backgroundSize: '100%',
												position: 'absolute',
												width: '100%',
												height: '100%'});
	});
	$("#puzzle-original").mouseup(function(){
		$('#original').remove();
	});
	$("#puzzle-browse").click(function(){
		browse();
	});
});