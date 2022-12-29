<?php


session_start();

$link = $_SERVER['HTTP_REFERER'];

unset($_SESSION['user']);

header("Location: $link");

?>