$( document ).ready(function() {
    $("#submitComment").click(
		function(){
			sendAjaxForm('result_form', 'ajax_form', `/feedback/addAjax/${$(this).attr("data-id")}`);
			return false; 
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