<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 17.03.2019
 * Time: 22:44
 */
require('include/functions.php');
get_file();
?>

    <div class="bar">
        <div class="left-sbar">

            <?
            if($_GET['link'] == 'main')
                get_file("list_card");

            if($_GET['link'] == 'page')
                echo "Пока ничего(";

            if($_GET['link'] == 'reg')
                get_file('registration');

            ?>

        </div>
        <div class="right-sbar">

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<?
get_file("footer");
?>