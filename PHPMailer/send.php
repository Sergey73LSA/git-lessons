<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'src/Exception.php';
require_once 'src/PHPMailer.php';
require_once 'src/SMTP.php';


$last_id = mysqli_insert_id($mysqli);

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';

// Настройки SMTP
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 0;

// Настройки вашей почты
$mail->Host = $host; // SMTP сервера вашей почты
$mail->Port = $port;
$mail->Username = $mymail; // Логин на почте
$mail->Password = $pass; // Пароль на почте

// От кого
$mail->setFrom($mymail, $sendername);

// Кому
$mail->addAddress($mymail2);

// Тема письма
$mail->Subject = 'У Вас новое обращение №' . $last_id;

// Тело письма
$body = "
<h2>Новое обращение</h2>
<b>Имя:</b> $first_name<br>
<b>Почта:</b> $email<br><br>
<b>Текст обращения:</b><br>$text
";

$mail->msgHTML($body);

// Приложение
$mail->addAttachment($file_link);

$mail->send();

?>