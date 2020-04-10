<?php
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    
    $result = 0;

    if (strlen($phone) < 9) $result = 1; // длинна сообщения
    else {
        if (filter_var($phone)) {
            $subject = "Письмо с Вашего сайта http://".$_SERVER["HTTP_HOST"]."/";
            $header = "From <".$phone.">";
            $text = " Name: ".$name."\n Phone: ".$phone;
            mail("stroyklad@inbox.ru", $subject, $text, $header);
            $result = 3; //письмо отправлено
        }
        else $result = 2; // неправильный email
    }
    echo "<script language='JavaScript' type='text/javascript'>window.location.replace('')</script>";

    function getAnswer($result = 0) {
        switch ($result) {
            case 0: $answer = "";
            break;
            case 1: $answer = "<p style='color: red;'>Минимальная длинна собщения 10 символов, а email - 5!</p>";
            break;
            case 2: $answer = "<p style='color: red;'>Неправильный номер телефона! Проверьте.</p>";
        }
        return $answer;
    }