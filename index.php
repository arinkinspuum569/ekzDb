<?php
require('components/header.php');
require_once "common/content.php";



class index extends content {
    function __construct() {
        $this->show_content();
    }

    function show_content()
    {
        ?>
        <div>
            ОСНОВНОЙ КОНТЕНТ СТРАНИЦЫ
        </div>
        <?php
    }
}

new index();


require('components/footer.php');
?>


