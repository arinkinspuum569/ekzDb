<?php
require_once "common/content.php";

session_start();

// Простой способ сделать глобально доступным подключение в БД
function pdo()
{
    static $pdo;

    if (!$pdo) {
        // Подключение к БД
        $dsn = 'mysql:dbname=ekzDb;host=127.0.0.1';
        $pdo = new PDO($dsn, 'root', "");
        //для обработки ошибок
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $pdo;
}

function check_auth()
{
    return !!($_SESSION['user_id'] ?? false);
}
