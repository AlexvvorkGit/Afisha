<?php
require('plugins/ratings/_drawrating.php');
require('include/functions.php');

get_file();
?>

<a href="page.php?link=main" ><h1> Перейти на бета версию сайта </h1></a>

<?php
if (!empty($_SESSION['session_id'])) {
    echo "<p align=\"right\">Вы авторизированы как " . $_SESSION['session_username'] . "</p>";
    echo "<a href=localhost/afisha/logout.php>Выйти</a>";
} else {
    echo '
    <form method="post">
        <label>Email</label>
        <input type="text" name="email" class="input" autocomplete="on"/>
        <label>Password </label>
        <input type="password" name="password" class="input" autocomplete="on"/>
        <input type="submit" formaction="registration.php" class="button" value="Registration" />
        <input type="submit" formaction="login.php" class="button" value="Log in" />
    </form>';
}

get_file("review");
?>
<!--<input type="submit" formaction="review.php" class="button" value="Оставить отзыв" />-->


<?php
get_file("footer");
?>


