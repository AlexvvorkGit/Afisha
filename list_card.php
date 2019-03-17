<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 17.03.2019
 * Time: 23:40
 */


require_once 'db.php';

define('DELIMITER', __DIR__);


$query = mysqli_query($connection, "SELECT cid, name, description, location, phones, category, photos, video FROM card;");
$count = 1;
$active = 1;
?>
<?
while ($row = mysqli_fetch_assoc($query)) {
    $image = explode(DELIMITER, $row['photos']);
    unset($image[0]);
     /*echo "<pre>"; print_r($image); echo "</pre>";*/
    ?>
    <div class="card-container">

        <?/* Bootstrap-carousel */?>
        <div id="card-carousel-<?echo $count;?>" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <? for ($img = 0; $img < count($image); $img++ ){?>
                <li data-target="#card-carousel-<?echo $count;?>" data-slide-to="<?echo $img;?>" class="<? if($active==1) {echo "active"; $active=0;} ?>"></li>
                <?}?>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                 <? $active=1; $counter =1; for ($img = 0; $img < count($image); $img++ ){?>
                <div class="carousel-item <? if($active==1) {echo "active"; $active=0;} ?>">
                    <img class="img-size-carousel" src="<? echo $image[$counter];?>" alt="slide-<?echo $img;?>">
                </div>
                <? $counter++; } $active=1;?>
            </div>
            <!-- List for slides -->
            <a class="carousel-control-prev" href="#card-carousel-<?echo $count;?>" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#card-carousel-<?echo $count;?>" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
    </div>

        <div class="right-descr">
        <div class="card-main-descr">
            <div class="card-category"><?echo $row['category'];?> </div>
            <div class="card-name"> <?echo $row['name'];?></div>
        </div>
        <div class="card-address"> <?echo $row['location'];?></div>
        <div class="card-phone"> <?echo $row['phones'];?></div>
        <div class="descr"> <?echo $row['description'];?></div>
        </div>
    </div>
    <script>
        $(function () {
            $('#card-carousel-<?echo $count; ?>').carousel({
                interval: 10000
            });
        });
    </script>



<?$count++; } ?>

