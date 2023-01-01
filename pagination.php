<?php

$line = $mysqli->query("SELECT COUNT(1) FROM $db_table");

//Строк в таблице
$lines_db = mysqli_fetch_array($line);

//Лимит строк на одной странице
$lines_limit = 5;

//Количество страниц
$count_pages = ceil($lines_db[0] / $lines_limit);

//Какую страницу запрашивает браузер при GET запросе
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$page = (int)$page;

//Проверка на допустимые значеня в GET запросе
if (!$page || $page < 1) {
	$page = 1;
}
if ($page > $count_pages) {
	$page = $count_pages;
}
	
$offset = $lines_limit * ($page - 1);

$sql = "SELECT * FROM $db_table LIMIT $lines_limit OFFSET $offset";
$pag_result = mysqli_query($mysqli, $sql);
if ($lines_db[0] == '0') {
	$contacts = '';
} else {
	$contacts = mysqli_fetch_all($pag_result, MYSQLI_ASSOC);
}

?>