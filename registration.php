<?php
require_once 'db.php';

define('PATH_FOTOS', __DIR__ . '\images\_'); // путь для фото
if(!empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['password']) &&  isset($_POST['password']) && !empty($_POST['name']) &&  isset($_POST['name'])) {

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $password = md5($password);
    // регулярное выражение для проверки написания адреса электронной почты
    $regex = '/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/';

    if (preg_match($regex, $email)) {
        require_once 'db.php';
        //mysqli_query($connection, "SET NAMES UTF8");
        //mysqli_query($connection, "SET CHARACTER SET UTF8");
        //mysqli_query($connection, "SET character_set_connection='utf8'");
        $count = mysqli_query($connection, "SELECT uid FROM users WHERE email='$email';");

        // проверка адреса электронной почты
        if (mysqli_num_rows($count) != 0) {
            echo "Данный пользователь уже существует";
            }
        else {
            ini_set('upload_max_filesize', '1M'); //ограничение в 1 мб
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if ($_FILES['inputfile']['error'] == UPLOAD_ERR_OK && $_FILES['inputfile']['type'] == 'image/jpeg') { //проверка на наличие ошибок
                    $date = date('Y-m-d h-i-s', time());
                    $destination_dir = mysql_escape_string(PATH_FOTOS .$date.$_FILES['inputfile']['name']); // директория для размещения файла
                    if (move_uploaded_file($_FILES['inputfile']['tmp_name'], $destination_dir)) { //перемещение в желаемую директорию
                        echo 'File Uploaded'; //оповещаем пользователя об успешной загрузке файла
                        $kind_of_user = ($_POST['check_owner'] == 1) ? 1 : 0;
                        echo $kind_of_user;
                        echo $date;
                        $query = mysqli_query($connection, "INSERT INTO users (name, password, date_of_reg, email, phone, kind_of_user, photo)  values ('$name', '$password', '$date', '$email', '$phone', '$kind_of_user','$destination_dir');");
                        if ($query === FALSE) echo "Регистрация не удалась";
                        else {
                            echo "Вы зарегистрированы!";
                            echo "<a href=index.php>Вернуться на главную</a>";
                        }
                    } else {
                        echo 'File not uploaded';
                    }
                } else {
                    switch ($_FILES['inputfile']['error']) {
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
            }

        }
    }
    else {
        echo "Некорректный email";
    }

}

?>
<form method="post" action="registration.php" enctype="multipart/form-data">
    <label>Email</label>
    <input type="text" name="email" class="input" placeholder="asd@hf.ru"/>
    <label>Name</label>
    <input type="text" name="name" class="input" placeholder="ASD RU"/>
    <label>Phone</label>
    <input type="text" name="phone" class="input" placeholder="2222222"/>
    <label>Password </label>
    <input type="password" name="password" class="input"/>
    <label for="inputfile">Upload File</label>
    <input type="file" id="inputfile" name="inputfile"></br>
    <label>Я владелец</label>
    <input type="checkbox" name="check_owner" class="input" value="1"/></br>
    <input type="submit" value="Зарегистрироваться">
</form>
</body>
</html>
