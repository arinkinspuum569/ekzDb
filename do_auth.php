<?php
require_once __DIR__.'/main.php';

// проверяем наличие пользователя с указанным юзернеймом
$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `login` = :username"); // в переменную stmt кладем объект pdo бд и у него вызываем функцию prepare
$stmt->execute(['username' => $_POST['username']]); // функция execute  — запускает подготовленный запрос на выполнение
//пришли ли с сервера данные в POST-запросе, которые имеют ключи "username"
if (!$stmt->rowCount()) { // rowCount возвращает количество строк, на которые повлияла последняя инструкция

    header('Location: auth.php');
    die; // дальше код продолжаться не будет
}
$user = $stmt->fetch(PDO::FETCH_ASSOC); //Метод fetch() извлекает одну строку из набора результатов и перемещает внутренний
// указатель на следующую строку в наборе результатов.
// Поэтому следующий вызов метода fetch() вернёт следующую строку из набора результатов.

// то есть здесь мы из нашей таблицы users сначала проверяем наличие пользователя, а потом в строчке 14 в переменную $user засовываем данные его пароля

// проверяем пароль
if (password_verify($_POST['password'], $user['password'])) { //password_verify() — используется для проверки пароля на соответствие хэшу.
    $_SESSION['user_id'] = $user['id'];
    header('Location: content2.php');
    die;
}


header('Location: auth.php');