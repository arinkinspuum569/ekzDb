<?php

require_once "main.php";

// Проверим, не занято ли имя пользователя
//$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `login` =".$_POST['username']);
//$stmt->execute();

// Добавим пользователя в базу
$stmt = pdo()->prepare("INSERT INTO `users` (`login`, `password`) VALUES (:username, :password)");
$stmt->execute([
    'username' => $_POST['username'],
    'password' => $_POST['password'],
]);

header('Location: auth.php');




// 'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),