<?php

	$servername = "localhost";
	$username = "root";
	$db_password = "K9f7H5w3T1d";
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
        } elseif ($key == 'last_name') {
            if (!$value) {
                $errors['last_name'] = 'поле обязательно для заполнения';
            }
        } elseif ($key == 'email') {
            if (empty(trim($_REQUEST['email']))) {
                $errors['email'] = 'Введите пожалуйста Email';

            } elseif (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            	$errors['email'] = 'Email введено не верно';
            }
        }
    }

    if (empty(trim($_REQUEST['password']))) {
    	$errors['password'] = 'Введите пароль';
    } elseif (strlen(trim($_REQUEST['password'])) < 4) {
    	$errors['password'] = 'Пароль не может быть короче 4 символов!';
    }

    if (count($errors)) {
    	if ($mode === 'admin_panel') {
    		require 'auth.html';
    	} else {
    		require 'reg.html';
    	}

    	exit();
	}

	if ($mode === 'admin_panel') {
		$email = trim($_REQUEST['email']);
		$user = $mysqli->query("SELECT email, password FROM customers WHERE email = '$email' limit 1");
		if ($user) {
			$user = mysqli_fetch_array($user, MYSQLI_ASSOC);

			if (password_verify(trim($_REQUEST['password']), $user['password'])) {
				$_SESSION['user'] = $user;
				$customers = $mysqli->query("SELECT * FROM customers");
				while ($result = mysqli_fetch_array($customers, MYSQLI_ASSOC)) {
					$users[] = $result;
				}
				header("Location: index.php");
				//Алерт "Вход выполнен" будет появляться один раз
				setcookie('Alert',1);
				exit;
			} else {
				$failed_verify = 'true';
				require 'auth.html';
				exit;
			}

		} else {
			$failed_verify = 'true';
			require 'auth.html';
		}
		exit;
	}
	
	$first_name = trim($_REQUEST['first_name']);
	$last_name = trim($_REQUEST['last_name']);
	$gender = $_REQUEST['gender'];
	$email = trim($_REQUEST['email']);
	$password = password_hash(trim($_REQUEST['password']), PASSWORD_BCRYPT);

	$user_is_created = $mysqli->query("INSERT INTO customers (first_name, last_name, email, gender, password) VALUES 
		('$first_name', '$last_name', '$email', '$gender', '$password')
		");
} 

if ($mode === 'auth') {
	$referer = $_SERVER["HTTP_REFERER"];
	require 'auth.html';
} elseif (isset($_SESSION['user'])) {

	$db_table = 'customers';
	require 'pagination.php';

	$left_join = "
    SELECT
        customers.id,
        customers.first_name,
        customers.last_name,
        customers.email,
        customers.password,
        gender.gen
    FROM
        (SELECT * FROM $db_table LIMIT $lines_limit OFFSET $offset) $db_table
    LEFT JOIN
        gender
    ON customers.gender = gender.gender_id
    ORDER BY customers.id";

	require 'reg_users.html';
} else {
	require 'reg.html';
}

exit;