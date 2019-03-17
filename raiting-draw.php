<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 17.03.2019
 * Time: 19:12
 */
require('plugins/ratings/_drawrating.php');
require( 'include/functions.php' );
get_file();
require_once 'db.php';

?>

<div class="block-rating">
    <p> Общий рейтинг заведения </p>
    <div> <? echo rating_bar('id21', 5,'static');?> </div>
    <p> Цена: </p>
    <div> <? echo rating_bar('2id', 5,'static');?> </div>
    <p> Вкус/Качество: </p>
    <div> <? echo rating_bar('3id', 5,'static');?> </div>
    <p> Сервис(Комфорт): </p>
    <div> <? echo rating_bar('4id', 5,'static');?> </div>
    <p> Скорость: </p>
    <div> <? echo rating_bar('5id', 5,'static');?> </div>

</div>

