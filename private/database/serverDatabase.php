<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 2/12/17
 * Time: 4:42 PM
 */

    $host_name  = "db669358712.db.1and1.com";
    $database   = "db669358712";
    $user_name  = "dbo669358712";
    $password   = "Stjps3skwQfGlZO5";


    $connect = mysqli_connect($host_name, $user_name, $password, $database);

    if(mysqli_connect_errno())
    {
        echo '<p>Verbindung zum MySQL Server fehlgeschlagen: '.mysqli_connect_error().'</p>';
    }
    else
    {

    }
?>