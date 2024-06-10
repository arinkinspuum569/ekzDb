<?php
class dbhelper
{
    private $dsn;
    private $conn;
    public function __construct()
    {
        $this->dsn = 'mysql:dbname=ekzDb;host=127.0.0.1';
        $this->conn = $this->pdo();
    }

    private function pdo()
    {
        static $pdo;

        if (!$pdo) {

            $pdo = new PDO($this->dsn, 'root', "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $pdo;
    }

    public function getValues(){
        $stmt = $this->conn->prepare("SELECT * FROM `online_stats`");
        $stmt->execute();

        $spis = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = 0;
        $summ = 0;
        foreach ($spis as $sp){
            $value = ($sp['logout_time'] - $sp['login_time']);
            $summ += $value;
            $count += 1;
        }
        $sr = $summ / $count;
        //$sr = 0;
        echo "<p>Среднее время: $sr</p>";


    }




}