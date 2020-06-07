$( document ).ready(function() {
    $("#submitComment").click(
		function(){
			sendAjaxForm('result_form', 'ajax_form', `/feedback/addAjax/${$(this).attr("data-id")}`);
			return false; 
        }
	);
});
$( document ).ready(function() {
    $(".compare-btn").click(
		function(){
            let id = $(this).attr("data-id");
			
            if (this.classList.contains('add-to-compare')) {
                sendAjaxCompare(id, `/compare/addAjax/${id}`)
                console.log('adding');
                

                this.classList.remove('add-to-compare')
                this.classList.add('remove-from-compare')
                this.innerText = 'Убрать'
            } else {
                console.log('deleting');
                sendAjaxCompare(id, `/compare/delAjax/${id}`)
                this.classList.remove('remove-from-compare')
                this.classList.add('add-to-compare')
                this.innerText = 'Сравнить'
            }
            
        }
	);
});

function sendAjaxForm(result_form, ajax_form, url) {
    console.log(url);
    
    $.ajax({
        url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
            $('#exampleModal').modal('hide');
            
            if (response) {
                // result = $.parseJSON(response);
                console.log(response);
                // $('#result_form').html(`Рейтинг: ${result.rating} <br> Комментарий: ${result.comment} <br> id: ${result.id}`);
            } else {
                $('#result_form').html('Ответа не поступило(');
                console.log('Ответа не поступило(');
                
            }
        	// $('#result_form').html('Имя: '+result.name+'<br>Телефон: '+result.phonenumber);
    	},
    	error: function() { // Данные не отправлены
            $('#result_form').html('Ошибка. Данные не отправлены.');
    	}
 	});
}
function sendAjaxCompare(id, url) {
    console.log(url);
    const item = {
        id: id
    }
    console.log(item);
    
    $.ajax({
        url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: item,  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
            if (response) {
                console.log(response);
            } else {
                console.log('Ответа не поступило(');
                
            }
    	},
    	error: function() { // Данные не отправлены
            console.log('Ошибка. Данные не отправлены.');
    	}
 	});
}
