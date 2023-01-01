<?php

	$servername = "localhost";
	$username = "root";
	$db_password = "1234qwer";
	$db = "connect_with_us";

	$mysqli = mysqli_connect($servername, $username, $db_password, $db);
if (!$mysqli) {
	die("Connection failed: " . mysqli_connect_error());
}

	$mode = isset($_REQUEST['mode']) ? $_REQUEST['mode'] : false;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Проверка поля обязательного для заполнения
	$errors = [];

	foreach ($_POST as $key => $value) {
        if ($key == 'first_name') {
            if (!$value) {
                $errors['first_name'] = 'поле обязательно для заполнения';
            }
        } elseif ($key == 'email')  {
            if (empty(trim($_REQUEST['email']))) {
                $errors['email'] = 'Введите пожалуйста Email';

            } elseif (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            	$errors['email'] = 'Email введено не верно';
            }
        } elseif ($key == 'text') {
        	if (empty($_REQUEST['text'])) {
        		$errors['text'] = 'Введите пожалуйста текст обращения';
        	} elseif (strlen(trim($_REQUEST['text'])) < 20) {
        		$errors['text'] = 'Для поля минимальное количество символов 20';
        	} elseif (strlen(trim($_REQUEST['text'])) > 200) {
        		$errors['text'] = 'Для поля максимальное количество символов 200';
        	}
        }
    }

    // Проверка формата файла
    if (!empty($_FILES['picters']['name'])) {

        $tmp_name = $_FILES['picters']['tmp_name'];
        $path = $_FILES['picters']['name'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tmp_name);

        if ($file_type !== "image/jpeg" && $file_type !== "image/pjpeg" && $file_type !== "image/png" && $file_type !== "image/tiff" && $file_type !== "image/webp") {
            $errors['picters'] = 'Загрузите изображение в формате jpeg, pjpeg, png, tiff, webp.';
            $file_link = null;
            require 'index.html';
            exit;
        } else {
            move_uploaded_file($tmp_name, 'img/' . $path);
            $file_link = 'img/' . $path;
        }
    } else {
    	$file_link = null;
    }

    if (count($errors)) {
    	require 'index.html';
    	exit();
    }

	$first_name = trim($_REQUEST['first_name']);
	$last_name = trim($_REQUEST['last_name']);
	$email = trim($_REQUEST['email']);
	$gender = $_REQUEST['gender'];
	$apply = $_REQUEST['apply'];
	$text = trim($_REQUEST['text']);
	
	if (empty($our_news)) {
		$our_news = 'no';
	} else {
		$our_news = $_REQUEST['our_news'];
	}

	$form_sent = $mysqli->query("INSERT INTO client (first_name, last_name, email, gender, apply, text, file_link, our_news) VALUES 
		('$first_name', '$last_name', '$email', '$gender', '$apply', '$text', '$file_link', '$our_news')
		");
    // Отправка оповещения о новом обращении на почту
	require 'PHPMailer/send.php';

	require 'index.html';
} elseif ($mode === 'table') {

    $db_table = 'client';
	require 'pagination.php';

    $left_join = "
    SELECT
        client.id,
        client.first_name,
        client.last_name,
        client.email,
        client.text,
        client.file_link,
        client.our_news,
        gender.gen,
        type_apply.apply
    FROM
        (SELECT * FROM $db_table LIMIT $lines_limit OFFSET $offset) $db_table
    LEFT JOIN
        gender
    ON client.gender = gender.gender_id
    LEFT JOIN
        type_apply
    ON client.apply = type_apply.apply_id
    ORDER BY client.id";

	require 'users.html';
} else {
	require 'index.html';
}

exit;