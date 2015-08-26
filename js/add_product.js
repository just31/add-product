// Проверяем размер загружаемой картинки. Если он более 1мб, выводим предупреждающий текст.
function validateSize(fileInput, size) {
    var fileObj, oSize;
    if (typeof ActiveXObject == "function") { // IE
        fileObj = (new ActiveXObject("Scripting.FileSystemObject")).getFile(fileInput.value);
    } else {
        fileObj = fileInput.files[0];
    }

    oSize = fileObj.size; // Size returned in bytes.
    if(oSize > size * 1024 * 1024) {
        return false
    }
    return true;
}

$('#image').change(function () {
    if(!validateSize(this, 1)) {
        $("#fileName").val('');
        //alert("Размер файла превышает 1 MB");
        $(".container").append('<div id="myModalBox_imgerr" class="modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Размер файла превышает 1 MB</h5></div><div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button></div></div></div></div>');
        $("#myModalBox_imgerr").modal('show');
    }
});

// Контроллер angular
function InvoiceCntl($scope) {
   $scope.qty;
   $scope.cost;
}

// При вводе в текстовое поле "Стоимость", показываем блок с общей стоимостью добавленного продукта. Использую разметку angular, для связывания данных.
$('#cost').keyup(function() {
    $('.cost-main').css({'opacity' : '1'});
});


// Добавляем новую запись в базу, после клика по кнопке.
$("#add-submit").click(function (e) {
    e.preventDefault();

    // $('.list-produst').css({'opacity' : '1'});

    var name = $("#name").val(),
        number = $("#number").val(),
        cost = $("#cost").val();

    if($("#more_information").val()!=="") {
        var more_information = $("#more_information").val();
    }

    if($("#name").val()==="" || $("#number").val()==="" || $("#cost").val()==="") // Проверка валидации полей
    {
        // Выводим в модальном окне предупреждающий текст
        $(".container").append('<div id="myModalBox_senderr" class="modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Заполните пожалуйста все обязательные поля.</h5>Помечены символом звездочки <b>*</b></div><div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button></div></div></div></div>');
        $("#myModalBox_senderr").modal('show');
        return false;
    } else {
        // Отправляем данные php-скрипту, через formData, т.к метод serialize(), в ajax запросе не передает вложенные файлы.
        var form = document.forms.product;
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
		xhr.open("POST", "write_product.php");
        xhr.onreadystatechange = function() {
		    if (xhr.readyState == 4) {
		        if(xhr.status == 200) {
		            data = xhr.responseText;
		            if(data == "true") {
		            }
		        }
		    }
		};
        xhr.send(formData);

        // Выводим в модальном окне текст об успешной отправке данных
        $(".container").append('<div id="myModalBox_send" class="modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Продукт ' + $("#name").val() + ', успешно добавлен!</h5></div><div class="modal-footer"><button id="close" type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button></div></div></div></div>');
        $("#myModalBox_send").modal('show');

        // Очищаем текстовые поля, после успешной вставки
        $("#name").val('');
        $("#number").val('');
        $("#cost").val('');
        $("#more_information").val('');
        $("#fileName").val('');
        $(".cost-main").empty();

        // После сообщения об успешной отправке, делаем reload странице, по нажатию на кнопку "Закрыть" модального окна. Чтобы данные формы не отправились дважды.
        $("#close").on("click", function(){
            window.location.href = "/add_product";
        });
    }

    /* Альтернативный способ отправления данных через ajax-запрос.
    jQuery.ajax({
        type: "POST", // HTTP метод  POST или GET
        url: "write_product.php", //url-адрес, по которому будет отправлен запрос
        dataType:"text", // Тип данных,  которые пришлет сервер в ответ на запрос ,например, HTML, json
        data: $("#product").serialize(), //данные формы, которые будут отправлены на сервер (post переменные)
        success: function() {
            // очищаем текстовые поля после успешной вставки
            $("#name").val('');
            $("#number").val('');
            $("#cost").val('');
            $("#more_information").val('');
            // Выводим в модальном окне текст об успешной отправке
            $(".container").append('<div id="myModalBox_send" class="modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Продукт ' + name + ', успешно добавлен!</h5></div><div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button></div></div></div></div>');
            $("#myModalBox_send").modal('show');
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert("Error!"); //выводим ошибку
        }
    });
    */
});
