<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 18.03.2019
 * Time: 13:20
 */

require('include/functions.php');
require_once 'db.php';

define('DELIMITER', __DIR__);

get_file();

$cid = $_GET['id_card'];
$query = mysqli_query($connection, "SELECT cid, name, description, location, phones, category, photos, video FROM card WHERE cid = '$cid';");

$row = mysqli_fetch_assoc($query);
$image = explode(DELIMITER, $row['photos']);
unset($image[0]);
?>

<div class="target_content">
    <div class="tc_head">
        <div class="main_img"><img src="<? echo $image[1]; ?>" alt="main photo"></div>
        <div class="main_descr">
            <div class="tc_name">
                <?echo $row['name'];?>
            </div>
            <div class="tc_contact"> <?echo $row['phones'] . '<br>' . $row['location'] ?>  </div>
        </div>
        <div class="tc_photo">
        <?for($img=2; $img <= count($image); $img++ ){?>
            <img src="<? echo $image[$img];?>" alt="" class="">
        <?}?>
        </div>
        <div class="tc_descr"> <? $row['description'];?> </div>
        <div class="tc_video">
            <video src="video/_2019-03-13%2010-12-38K-391%20-%20Mystery%20(The%20Escape%20Game).mp4"></video> </div>
        <div class="tc_map">  </div>
    </div>

    <?
get_file('footer');
?>