<?php

require_once 'db.php';

if(!empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['password']) &&  isset($_POST['password']) ) {

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $password = md5($password);
    // регулярное выражение для проверки написания адреса электронной почты
    $regex = '/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/';

    if (preg_match($regex, $email)) {

        $count = mysqli_query($connection, "SELECT uid, name, email, kind_of_user FROM users WHERE email='$email' AND password='$password';");

        // проверка адреса электронной почты
        if (mysqli_num_rows($count) == 1) {
            $row = mysqli_fetch_assoc($count);
            session_start();
            $_SESSION['session_id'] = $row['uid'];
            $_SESSION['session_username'] = $row['name'];
            $_SESSION['session_email'] = $row['email'];
            $_SESSION['kind_of_user'] = $row['kind_of_user'];
            if ($row['kind_of_user'] == 1) {
                header("location: /ownermenu.php");
            }
            else header("location: http://localhost/afisha/index.php");
        } else {
            echo "Неправильный логин или пароль";
            echo "<a href=index.php>Попробовать снова</a>";
        }
    } else {
        header("location: http://localhost/afisha/index.php");
    }
}




