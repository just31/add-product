<?php

include_once("config.php");

// Собираем переменные из формы
$name = strip_tags($_POST['name']);
$number = strip_tags($_POST['number']);
$cost = strip_tags($_POST['cost']);
//echo $_POST['cost'];
//var_dump($_POST['cost']);
if(isset($_POST['more_information'])) {
    $more_information = strip_tags($_POST['more_information']);
}

if(isset($_FILES['image'])) {
    $myfile = $_FILES["image"]["tmp_name"];
    $myfile_name = $_FILES["image"]["name"];
    $myfile_size = $_FILES["image"]["size"];
    $myfile_type = $_FILES["image"]["type"];
}

if(!empty($myfile)) {

    if($myfile_size > 1024*1*1024) {
        echo ("Размер файла больше 1 мб");
    } else {
    // Генерируем новое имя файла - $newname
    $newname = "upload/" . date("Y-m-d") . "_" . rand(0, 10000) . ".jpg";

    if ($myfile_type=="image/gif" || $myfile_type=="image/pjpeg" || $myfile_type=="image/x-png" || $myfile_type=="image/bmp" || $myfile_type=="image/jpeg" || $myfile_type=="image/png") {
        // Копируем файл в папку - upload
        copy($myfile, $newname);
        imageJPEG($myfile, "../../". $newname);
    }
    }
}

// Записываем полученные от формы данные, в базу.
if ($name!=="" || $number!=="" || $cost!=="") {

    if(!empty($myfile)) {
        mysql_query("INSERT INTO `add_product` (`name`, `number`, `cost`, `more_information`, `url`) VALUES ('".$name."', '".$number."', '".$cost."', '".$more_information."', '".$newname."')") or die (mysql_error());
    } else {
        mysql_query("INSERT INTO `add_product` (`name`, `number`, `cost`, `more_information`) VALUES ('".$name."', '".$number."', '".$cost."', '".$more_information."')") or die (mysql_error());
    }
}

?>