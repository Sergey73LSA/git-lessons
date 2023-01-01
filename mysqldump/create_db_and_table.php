<?php

$link = mysqli_connect("localhost", "root", "K9f7H5w3T1d");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$select_db = "USE connect_with_us";
if (mysqli_query($link, $select_db)) {
    echo "Database selected successfully." . "<br>";
} else {
    echo "ERROR: Could not able to execute $select_db. " . mysqli_error($link);
}


// $sql = "CREATE DATABASE connect_with_us";
// if (mysqli_query($link, $sql)) {
//     echo "Database created successfully";
// } else {
//     echo "ERROR: Cloud not able to execute $sql. " . mysqli_error($link);
// }


$sql = "CREATE TABLE client(
    id INT(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE,
    gender CHAR(1) NOT NULL,
    apply CHAR(1) NOT NULL,
    text VARCHAR(256) NOT NULL,
    file_link VARCHAR(256) NOT NULL,
    our_news enum('no', 'yes') DEFAULT 'no')
";

if (mysqli_query($link, $sql)) {
    echo "Table 'client' created successfully." . "<br>";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


$sql = "INSERT INTO client (first_name, last_name, email, gender, apply, text, file_link, our_news) VALUES
    ('Optimus', 'Prime', 'OPrime@gmail.com', 'm', 'q', 'It will be easier to leave the site and use the services of competitors.', 'img/1.jpg', 'no'),
    ('Ethan', 'Hunt', 'Hunter73@mail.ru', 'm', 'c', 'It is, undoubtedly, the most famous website for studying programming.', 'img/2.jpg', 'yes'),
    ('Katniss', 'Everdeen', 'district9@gmail.com', 'f', 'o', 'Теперь необязательно заходить на официальный сайт.', 'img/3.jpg', 'no'),
    ('Ellen', 'Ripley', 'aliensDie@yandex.ru', 'f', 'o', 'Этот сайт имеет репутацию лучшего интернет источника медицинской информации.', 'img/4.jpg', 'no'),
    ('Tony', 'Montana', 'onelove@gmail.com', 'm', 'q', 'Рекомендую данный сайт для юридической помощи.', 'img/5.jpg', 'yes'),
    ('Harry', 'Potter', 'expelliarmus@mail.ru', 'm', 'c', 'Во-первых, хочу поблагодарить за очень информативный сайт.', 'img/6.jpg', 'no'),
    ('Sarah', 'Connor', 'allbeback@gmail.com', 'f', 's', 'After all, an absolutely normal form of an online dialogue was suggested.', 'img/7.jpg', 'yes'),
    ('Han', 'Solo', 'SoloHan@mail.ru', 'm', 's', 'Это очень красивый сайт, радующий глаз и слух.', 'img/pic7.jpg', 'no'),
    ('James', 'Bond', 'mynumber007@gmail.com', 'm', 'o', 'Having a pretty website isnt everything.', 'img/pic17.jpg', 'yes'),
    ('Indiana', 'Jones', 'Jones2023@gmail.com', 'm', 's', 'Static and boring sites belong to the past, advanced users want interactivity.', 'img/pic27.jpg', 'yes'),
    ('Ezio', 'Auditore', 'Auditore23@yandex.ru', 'm', 'c', 'Я хочу, чтобы мой сайт отличался от их скучных сайтов', 'img/pic37.jpg', 'yes'),
    ('Nathan', 'Drake', 'DrakeUnch@gmail.com', 'm', 'q', 'Вам не надоели скучные сайты и стандартные лендинги?', 'img/pic47.jpg', 'no'),
    ('Gordon', 'Freeman', 'stemvalve@gmail.com', 'm', 'o', 'Помните, что вы не обязаны предоставлять личные данные посредством контактной формы сайта.', 'img/pic57.jpg', 'yes'),
    ('Sarah', 'Kerrigan', 'KerriganS@mail.ru', 'f', 's', 'The registration button on will redirect you to the registration form on the site', 'img/pic67.jpg', 'no')
";

if (mysqli_query($link, $sql)) {
    echo "Records inserted successfully to table 'client'." . "<br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}




// $sql = "CREATE TABLE customers(
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     first_name VARCHAR(256) NOT NULL,
//     last_name VARCHAR(256) NOT NULL,
//     email VARCHAR(256) NOT NULL unique,
//     gender CHAR(1) NOT NULL,
//     password VARCHAR(256) NOT NULL
// )";

// if (mysqli_query($link, $sql)) {
//     echo "Table 'customers' created successfully." . "<br>";
// } else {
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
// }


// $sql = "INSERT INTO customers (first_name, last_name, email, gender, password) VALUES
//     ('Optimus', 'Prime', 'OPrime@gmail.com', 'm', '$2y$10$f3LQW/xMNTh6Xgm/4wQdQe/hIRigNAWixrRkQ7iKpH9pos1YhvnS6'),
//     ('Ethan', 'Hunt', 'Hunter73@mail.ru', 'm', '$2y$10$q0OQxwNEYM./Uiy650VwT.riD5FVUiXuLtwmvRVkASWGWXDSuOtxu'),
//     ('Katniss', 'Everdeen', 'district9@gmail.com', 'f', '$2y$10$HGz4aEfnyUP8TU/6pHNeRO7XnvwZ1nwkpa8ehH0BWM0ZlHMCIV5xm'),
//     ('Ellen', 'Ripley', 'aliensDie@yandex.ru', 'f', '$2y$10$vG3hqJYRfNwJIcWlRO4Dr.oIejOD.tictypUxXcbM7zjgtoXQSsAO'),
//     ('Tony', 'Montana', 'onelove@gmail.com', 'm', '$2y$10$q7gCjyhO2GvpWf0SrmQMXeH7tqpBYM/KJk/xfiVJXWcTQbm1hQL.G'),
//     ('Harry', 'Potter', 'expelliarmus@mail.ru', 'm', '$2y$10$ttUuiK683Uw2WIGvZ3uco.xUJ6PTCsOykmwomdPs9vm2mKVXRBZUm'),
//     ('Sarah', 'Connor', 'allbeback@gmail.com', 'f', '$2y$10$uytx4gwi5wollHkxIP8xrOxDxGKBIzIuxavtvWxHWvp57aLGahmO2')
// ";


// if (mysqli_query($link, $sql)) {
//     echo "Records inserted successfully to table 'customers'." . "<br>";
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
// }





// Attempt create table query execution
// $sql = "CREATE TABLE gender(
//     gender_id enum('m','f') DEFAULT 'm',
//     gender enum('Мужской','Женский') DEFAULT 'Мужской'
// )";

// if (mysqli_query($link, $sql)) {
//     echo "Table 'gender' created successfully.";
// } else {
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
// }



// $sql = "INSERT INTO gender (gender_id, gender) VALUES
//     ('m', 'Мужской'),
//     ('f', 'Женский')
// ";


// if (mysqli_query($link, $sql)) {
//     echo "Records inserted successfully to table 'gender'." . "<br>";
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
// }


// Attempt create table query execution
// $sql = "CREATE TABLE type_apply(
//     apply_id CHAR(1) NOT NULL,
//     apply VARCHAR(11) NOT NULL
// )";

// if (mysqli_query($link, $sql)) {
//     echo "Table 'type_apply' created successfully." . "<br>";
// } else {
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
// }



// $sql = "INSERT INTO type_apply (apply_id, apply) VALUES
//     ('q', 'Вопрос'),
//     ('c', 'Жалоба'),
//     ('s', 'Предложение'),
//     ('o', 'Другое')
// ";


// if (mysqli_query($link, $sql)) {
//     echo "Records inserted successfully to table 'type_apply'." . "<br>";
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
// }





// Close connection
mysqli_close($link);
?>