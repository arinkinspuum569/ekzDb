<?php


require_once "common/content.php";
require_once "index.php";

class page{
    private $content; /* свойства и методы с данным модификатором доступны только из текущего класса*/

    function __construct(content $content){
        /*Для обращения к свойствам и методам объекта внутри
        его класса применяется ключевое слово this.
        Для обращения к полям и методам внутри класса также применяется оператор доступа ->, перед которым идет $this.
         Причем это $this указывает именно на текущий объект.*/

        $this->content = $content;
        $this->show_content();


    }
    private function show_content()
    {
        print "<div class='content'>"; /*  Метод print() в HTML выводит содержимое текущего окна.*/
        $this->content->show_content();
        print "</div>";
    }

}
