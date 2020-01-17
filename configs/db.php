<?php 
// Данные для подключение к базе данных
$server = "localhost";
$username = "root";
$password = "";
$dbname = "chat";
 
// подключение к базе данных chat
$connect = mysqli_connect($server, $username, $password, $dbname);

// установим кодировку для корректного отображения кириллицы
mysqli_set_charset($connect, 'utf8');

 ?>