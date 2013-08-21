array = {};
$('.popup-info').hover( 
    function () { // при наведении на ссылку с классом .popup-info сработает эта функция
        $(this).data('focused','true'); //устанавливаем для ссылки атрибут data-focused = "true"
        var link = $(this); //запоминаем эту ссылку
        var title = $(this).attr('title'); //берем значение атрибута title
		if(title in array){//если такой запрос уже был, то отображаем блок с данными из array
			$('#popup-header').html(array[title].title); //вставляем заголовок в #popup-header
            $('#popup-main').html(array[title].text); //вставляем текст в #popup-main
            $('#popup').css({'display': 'block'}).stop().animate({left: 0,opacity: 1},300);//анимация появления блока
		}
		else{
			$.ajax({ //ajax запрос
				url:'show_info.php',
				type:'POST',
				dataType:'json',
				data:({'title': title}), //передаём значение title в скрипт show_info.php методом POST
				success: function(response){ //при удачном выполнении запроса переменные из show_info.php попадают в response
					if(link.data('focused') == 'true'){ //если указатель еще на ссылке то показываем блок #popup
						array[response.title] = {'title':response.title,'text':response.text}; //сохраняем полученные данные в array
						$('#popup-header').html(response.title); 
						$('#popup-main').html(response.text); 
						$('#popup').css({'display': 'block'}).stop().animate({left: 0,opacity: 1},300);
					}
				 }
			});
		}
    },
    function(){ // когда указатель покинет ссылку сработает эта функция
        $(this).data('focused','false'); //устанавливаем для ссылки атрибут data-focused = "false"
        $('#popup').stop().animate(
									{left: '-50px',opacity: 0},
									200,
									function(){
										$('#popup').css({'display': 'none'});
									}
								   ); //анимация скрытия блока
    }
);