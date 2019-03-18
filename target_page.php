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
    </div>
        <div class="tc_photo">
        <?for($img=2; $img <= count($image); $img++ ){?>
            <img src="<? echo $image[$img];?>" alt="" class="">
        <?}?>
        </div>
        <div class="tc_descr"> <? echo $row['description'];?> </div>
        <div class="tc_video">
            <video width="800px" controls> <source src="video\_2019-03-13 10-08-12K-391 - Mystery (The Escape Game).mp4"/></video>
        </div>
        <div class="tc_map">  </div>

</div>
    <?
get_file('footer');
?>