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

    <header class="header">

        <div class="main-conteiner">

            <nav class="nav">
                <img src="logo/Afisha__logo.png" alt="logo company" class="logo">

                <ul class="ul menu">
                    <li class="li"><a href="#">Главная</a></li>
                    <li class="li"><a href="#">Страница</a></li>
                    <li class="li"><a href="#">Должна</a></li>
                    <li class="li"><a href="#">Быть</a></li>
                    <li class="li"><a href="#">Туту</a></li>
                </ul>
                <div class="phone">
                    +7 909 909 99 99
                </div>
            </nav>
            <div class="offer">


            </div>

        </div>
    </header>
    <div class="bar">
        <div class="left-sbar">

            <? get_file("list_card"); ?>


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