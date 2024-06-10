<?php
require_once "common/content.php";
require_once "common/dbhelper.php";
class content2 extends content {

    function __construct() {
        $this->show_content();
    }
    function show_content()
    {
        ?>
        <div>
            ЛИЧНЫЙ КАБИНЕТ
        </div>
        <a href="https://disk.yandex.ru/d/-b67ERVLg3cCiQ">Скачать программу</a>
        <?php
        $db = new dbhelper();
        ?>
        <div>
            <?php $db->getValues() ?>
        </div>
        <?php
    }

}

new content2();

