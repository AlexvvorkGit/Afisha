<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 09.03.2019
 * Time: 17:00
 */

require_once 'db.php';
define('DATE_FORMAT', 'Y-m-d h-i-s'); // формат даты для медиафайлов
define('PATH_VIDEO', __DIR__ . '\video\_'); // путь для видео с обзора
define('PATH_FOTOS', __DIR__ . '\photo_review\_'); // путь для фото с обзора

if (!empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['nikname']) && isset($_POST['nikname']) && !empty($_POST['comment']) && isset($_POST['comment'])) {
    require( 'include/functions.php' );
    get_file();

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $nikname = mysqli_real_escape_string($connection, $_POST['nikname']);
    $comment = mysqli_real_escape_string($connection, $_POST['comment']);
    $location = mysqli_real_escape_string($connection, $_POST['loc']);
    $location_id = mysqli_real_escape_string($connection, $_POST['loc_id']);
    $r1 = $_POST['2id-review'];
    $r2 = $_POST['3id-review'];
    $r3 = $_POST['4id-review'];
    $r4 = $_POST['5id-review'];
    $path_video;
    $path_foto;
    ini_set('upload_max_filesize', '10M'); //ограничение для загрузки видео и фото в 35 мб
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $date = date(DATE_FORMAT, time());

        // --- Upload Video ---
        if ($_FILES['inputvideo']['error'] == UPLOAD_ERR_OK && $_FILES['inputvideo']['type'] == 'video/mp4') { //проверка на наличие ошибок
            $destination_dir = PATH_VIDEO . $date . $_FILES['inputvideo']['name']; // директория для размещения файла
            $destination_dir_sql = "video\_" . $date . $_FILES['inputvideo']['name'];
            if (move_uploaded_file($_FILES['inputvideo']['tmp_name'], $destination_dir)) { //перемещение в желаемую директорию
                echo 'Video Uploaded'; //оповещаем пользователя об успешной загрузке файла
                $path_video = mysql_escape_string($destination_dir_sql);
            } else {
                echo 'File not uploaded';
            }
        } else {
            switch ($_FILES['inputvideo']['error']) {
                case UPLOAD_ERR_FORM_SIZE:
                case UPLOAD_ERR_INI_SIZE:
                    echo 'File Size exceed';
                    brake;
                case UPLOAD_ERR_NO_FILE:
                    echo 'FIle Not selected';
                    break;
                default:
                    echo 'Something is wrong';
            }
        }

        // --- Upload FOTO ---
        if ($_FILES['inputfoto']['error'] == UPLOAD_ERR_OK && $_FILES['inputfoto']['type'] == 'image/jpeg') { //проверка на наличие ошибок
            $destination_dir = PATH_FOTOS . $date . $_FILES['inputfoto']['name']; // директория для размещения файла
            $destination_dir_sql = "photo_review\_" . $date . $_FILES['inputfoto']['name'];
            if (move_uploaded_file($_FILES['inputfoto']['tmp_name'], $destination_dir)) { //перемещение в желаемую директорию
                echo 'Fotos Uploaded'; //оповещаем пользователя об успешной загрузке файла
                $path_foto = mysql_escape_string($destination_dir_sql);
            } else {
                echo 'Fotos not uploaded';
            }
        } else {
            switch ($_FILES['inputfoto']['error']) {
                case UPLOAD_ERR_FORM_SIZE:
                case UPLOAD_ERR_INI_SIZE:
                    echo 'File Size exceed';
                    brake;
                case UPLOAD_ERR_NO_FILE:
                    echo 'FIle Not selected';
                    break;
                default:
                    echo 'Something is wrong';
            }
        }
        $post_date = date('Y-m-d h:i:s', time());
        echo $r1.$r2.$r3.$r4;
        $query = mysqli_query($connection, "INSERT INTO `review`(`email`, `review_post_date`, `location`, `rating_1`, `rating_2`, `rating_3`, `rating_4`, `review_video`, `review_foto`, `review_comment`, `location_id`, `name`) VALUES ('$email', '$post_date','$location', '$r1','$r2','$r3','$r4','$path_video','$path_foto','$comment', '$location_id', '$nikname');");

    }
}
?>

<div class="review-modal">
    <div class="user-modal-window">
    <div id="review-show-form">
        <form method="post" action="review.php" class="review_form" target="_blank" enctype="multipart/form-data">
            <p style="display:none;">
                <label for="nikname"> Локация </label>
                <input type="text" name="loc" id="loc" placeholder="loca"/>
            </p>
            <p style="display:none;">
                <label for="nikname"> Локация_id</label>
                <input type="text" name="loc_id" id="loc_id" placeholder="loca"/>
            </p>
            <p class="fieldset">
                <label class="label-review" for="nikname"> Имя (Никнэйм):</label>
                <input class="input-review" type="text" name="nikname" id="nikname" placeholder="Имя"/>
            </p>
            <p class="fieldset">
                <label class="label-review" for="email"> Email:</label>
                <input class="input-review" type="text" name="email" id="email" placeholder="E-mail"/>
            </p>
            <p class="fieldset">
                <label class="label-review"> Цена:</label>
                <?php echo rating_bar('2id', 5); ?>
                <input type="number" style="display: none" class="2id-review" id="2id-review" name="2id-review">
            </p>
            <p class="fieldset">
                <label class="label-review"> Вкус/Качество:</label>
                <?php echo rating_bar('3id', 5); ?>
                <input  type="number" style="display: none" class="3id-review" id="3id-review"  name="3id-review">
            </p>
            <p class="fieldset">
                <label class="label-review"> Сервис(Комфорт):</label>
                <?php echo rating_bar('4id', 5); ?>
                <input class="input-review" type="number" style="display: none" class="4id-review" id="4id-review"  name="4id-review">
            </p>
            <p class="fieldset">
                <label class="label-review"> Скорость:</label>
                <?php echo rating_bar('5id', 5); ?>
                <input type="number" style="display: none" class="5id-review" id="5id-review"  name="5id-review">
            </p>
            <p class="fieldset">
                <label class="label-review" for="comment"> Отзыв:</label>
                <textarea class="input-review" rows="5" name="comment" id="comment"></textarea>
            </p>
            <p class="fieldset">
                <label class="label-review" for="inputfoto"> Загрузить фото: </label>
                <input type="file" id="inputfoto" name="inputfoto"/>
            </p>
            <p class="fieldset">
                <label class="label-review" for="inputvideo"> Загрузить видео: </label>
                <input type="file" id="inputvideo" name="inputvideo"/>
            </p>
            <p class="submit">
                <input class="input-buttom" type="submit" value="Отправить"/>
            </p>
        </form>
    </div>
    </div>
</div>