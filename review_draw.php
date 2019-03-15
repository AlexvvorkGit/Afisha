<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 14.03.2019
 * Time: 1:29
 */

require('include/functions.php');
require('plugins/ratings/_drawrating.php');
require_once 'db.php';

get_file();

$loc_id = 1;

$query = mysqli_query($connection, "SELECT `name`, `review_post_date`, `location`, `rating_1`, `rating_2`, `rating_3`, `rating_4`, `review_video`, `review_foto`, `review_comment` FROM `review` WHERE `location_id` = '$loc_id';");

//$row = mysqli_fetch_assoc($query);

//echo $row['name'];
//echo $row['review_foto'];
?>
<div class="conteiner-inner">

    <? while ($row = mysqli_fetch_assoc($query)) { ?>
    <p class="comment-review">
        <img class="comment-pic" src="icon_users/default.png"/> <span><? echo $row['name']; ?></span>
    </p>
    <div class="l-toggle">
        <div class="l-caption">
            <p>
                <img class="review-pic" src="<? echo $row['review_foto']; ?>">
                Оценки:<br>
                Цена: <? echo $row['rating_1']; ?> из 5 <br>
                Вкус/Качество: <? echo $row['rating_2']; ?> из 5 <br>
                Сервис(Комфорт): <? echo $row['rating_3']; ?> из 5 <br>
                Скорость: <? echo $row['rating_4']; ?> из 5 <br>
            </p>
            <input type="checkbox" id="hd-1" class="comment-hide"/>
            <label class="list" for="hd-1">Расскрыть весь отзыв</label>
            <div class="l-content">
                <video width="300" height="200" controls> <source src="<? echo $row['review_video']; ?>"> </video>
                <p>
                    <? echo $row['review_comment']; ?>
                </p>
            </div>
            <hr class="hr">
        </div>

    </div>
<? }?>
</div>