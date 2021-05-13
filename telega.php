<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "1821170028:AAHNzk2F1ztxK4nf__mdQfSdanrWA6NPSoQ";

//Сюда вставляем chat_id
$chat_id = "-536475843";

//Определяем переменные для передачи данных из нашей формы
if ($_POST['submit'] == 'Надіслати') {
    $name = ($_POST['name']);
    $email=($_POST['email']);
    $phone = ($_POST['phone']);
    $massage = ($_POST['message']);

//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Имя:' => $name,
        'E-mail'=>$email,
        'Телефон:' => $phone,
        'Сообщение:' => $massage
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Выводим сообщение об успешной отправке
    if ($sendToTelegram) {
        header('Location: index.html#section-thanks');
    }

//А здесь сообщение об ошибке при отправке
    else {
        alert('Щось пішло не так. Повторіть відправку форми.');
    }
}

?>