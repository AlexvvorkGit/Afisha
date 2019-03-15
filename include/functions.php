<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 07.03.2019
 * Time: 17:06
 */

function get_file( $name = null )
{
    //$templates = array();
    $name = (string) $name;
    if ( '' !== $name ) {
        $templates = "{$name}.php";
    }
    else
        $templates = "header.php";

    include $templates;

}

?>