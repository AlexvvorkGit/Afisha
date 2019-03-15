<?php
session_start();
require( 'include/functions.php' );
get_file();
?>

<?
if ($_SESSION['kind_of_user'] == 1) {
    require_once 'db.php';
    echo "<a href=addcard.php>Добавить визитку</a>";
    $owner_id=$_SESSION["session_id"];
    $query = mysqli_query($connection, "SELECT cid, name, description, location, phones, category, photos, video FROM card WHERE owner_id='$owner_id';");

    while ($row = mysqli_fetch_assoc($query)) {
        echo "<div class='card'>";
        echo "<h2>".$row['name']."</h2>";
        echo '<a class="link_in_card" href="delete.php?id='.$row['cid'].'">delete</a><br>';
        echo '<a class="link_in_card" href="update.php?id='.$row['cid'].'">update</a>';
        echo "<p>"."address: ".$row['location']."<br>"."phones: ".$row['phones']."</p>";
        echo "<p>"."category: ".$row['category']."</p>";
        echo "<br>";
        $text = file_get_contents($row['description']);
        // Переводим содержимое в видимую форму
        $text = htmlspecialchars($text);
        // Выводим содержимое файла
        echo "<table>";
        echo "<td width='60%'>";
        echo "<b>".$text."</b>";
        echo "</td>";

        $image = explode(" /var/www/html/afisha/", $row['photos']);

        echo "<td>";
        // header('Content-type: image/jpeg');
        echo "<div class='images'>";
        /*foreach ($image as &$value) {
             echo "<img width='50%' height='50%' src='$value'>";
             echo "<br>";
         } */
        echo "<img width='100%' height='100%' src='$image[1]'>";
        echo "</div>";
        echo "</td>";
        echo "</table>";
        //echo $row['videos'];
        echo "</div>";
    }

    echo "</table>";
}
get_file("footer");
?>
