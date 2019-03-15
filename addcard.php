<?php
session_start();
require( 'include/functions.php' );
get_file();

    if ($_SESSION['kind_of_user'] == 1) {
        echo "<a href=ownermenu.php>Вернуться на главную</a>";
        if (!empty($_POST['name']) && isset($_POST['name']) && !empty($_POST['location']) && isset($_POST['location'])) {
            require_once 'db.php';
            $owner_id = $_SESSION["session_id"];
            $name = mysqli_real_escape_string($connection, $_POST['name']);
            $location = mysqli_real_escape_string($connection, $_POST['location']);
            $phones = mysqli_real_escape_string($connection, $_POST['phones']);
            $category = mysqli_real_escape_string($connection, $_POST['category']);
            //ini_set('upload_max_filesize', '1M'); //ограничение в 1 мб
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $query = mysqli_query($connection, "INSERT INTO card (name, owner_id, location, phones, category) values('$name', '$owner_id', '$location', '$phones', '$category');");
                if ($query != FALSE) {
                    echo "Визитка добавлена в базу. Загрузка файлов.. ";
                    $uploading_of_photo = false;
                    $uploading_of_description = false;

                    if ($_FILES['descriptionfile']['error'] == UPLOAD_ERR_OK) {
                        $date = date('Y-m-d-h:i:s', time());
                        $destination_dir0 = __DIR__ . "/descriptions" . $date . $_FILES['descriptionfile']['name']; // директория для размещения файла
                        if (!(move_uploaded_file($_FILES['descriptionfile']['tmp_name'], $destination_dir0))) { //перемещение в желаемую директорию
                            echo 'Файл описания не загружен на сервер'; //оповещаем пользователя об успешной загрузке файла
                            $destination_dir0 = "";
                        } else $uploading_of_description = true;
                    }


                    if ($_FILES['imagefile1']['error'] == UPLOAD_ERR_OK) {
                        $date = date('Y-m-d-h:i:s', time());
                        $destination_dir1 = "/var/www/html/afisha/images" . '/' . $date . $_FILES['imagefile1']['name']; // директория для размещения файла
                        if (!(move_uploaded_file($_FILES['imagefile1']['tmp_name'], $destination_dir1))) { //перемещение в желаемую директорию
                            echo 'Изображение 1 не загружено на сервер'; //оповещаем пользователя об успешной загрузке файла
                            $destination_dir1 = "";
                        } else $uploading_of_photo = true;

                    }
                    if ($_FILES['imagefile2']['error'] == UPLOAD_ERR_OK) {
                        $date = date('Y-m-d-h:i:s', time());
                        $destination_dir2 = "/var/www/html/afisha/images" . '/' . $date . $_FILES['imagefile2']['name']; // директория для размещения файла
                        if (!(move_uploaded_file($_FILES['imagefile2']['tmp_name'], $destination_dir2))) { //перемещение в желаемую директорию
                            echo 'Изображение 2 не загружено на сервер'; //оповещаем пользователя об успешной загрузке файла
                            $destination_dir2 = "";
                        } else $uploading_of_photo = true;
                    }
                    if ($_FILES['imagefile3']['error'] == UPLOAD_ERR_OK) {
                        $date = date('Y-m-d-h:i:s', time());
                        $destination_dir3 = "/var/www/html/afisha/images" . '/' . $date . $_FILES['imagefile3']['name']; // директория для размещения файла
                        if (!(move_uploaded_file($_FILES['imagefile3']['tmp_name'], $destination_dir3))) { //перемещение в желаемую директорию
                            echo 'Изображение 3 не загружено на сервер'; //оповещаем пользователя об успешной загрузке файла
                            $destination_dir3 = "";
                        } else $uploading_of_photo = true;
                    }
                    if (($uploading_of_description == true) or ($uploading_of_photo == true)) {
                        echo "Загрузка файлов на сервер завершена";
                        $query = mysqli_query($connection, "SELECT cid FROM card WHERE name='$name' AND location='$location';");
                        $row = mysqli_fetch_assoc($query);
                        $cid=$row["cid"];
                        echo $cid;
                        $destination_dir = " " . $destination_dir1 . " " . $destination_dir2 . " " . $destination_dir3 . " ";
                        $query = mysqli_query($connection, "UPDATE card SET description='$destination_dir0', photos='$destination_dir' WHERE cid='$cid';");
                        if ($query == FALSE)
                            echo "Добавление файлов в базу не удалось";
                        else echo "Файлы загружены на сервер";
                    }
                    else echo "Файлы не были выбраны или произошла ошибка загрузки файлов на сервер";
                }
                else echo "Визитка не добавлена в базу";
            }
        }
    }


?>
<form method="post" action="addcard.php" enctype="multipart/form-data">
<label>Название заведения</label>
<input type="text" name="name" class="input"/>
<label>Адрес заведения</label>
<input type="text" name="location" class="input"/>
<label>Телефоны для связи (через пробел)</label>
<input type="text" name="phones">
    <label>Выбрать категорию</label>
<select name="category">
    <option selected value="museum">Музей</option>
    <option value="bar">Бар</option>
    <option value="restaurant">Ресторан</option>
    <option value="cafe">Кафе</option>
    <option value="quest">Квест</option>
    <option value="other">Другое</option>
</select>
<label for="descriptionfile">Загрузить файл с описанием</label>
<input type="file" id="descriptionfile" name="descriptionfile">
    <label>Добавить фотографии</label>

<input type="file" id="imagefile1" name="imagefile1">
    <input type="file" id="imagefile2" name="imagefile2">
    <input type="file" id="imagefile3" name="imagefile3">
    <input type="submit" value="Добавить визитку">
</form>
<?
get_file("footer");
?>