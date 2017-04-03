<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 4/2/17
 * Time: 3:34 AM
 */
session_start();
require("requires.php");

//print_r2($_REQUEST);

$user = $_REQUEST["user"];
$pass = $_REQUEST["pass"];

if($_REQUEST["stats"] == "register"){
    $query = "
        SELECT * FROM user WHERE username='$user';
    ";

    $ret = mysqli_query($connect, $query);

    if($ret->num_rows == 0){
        $query = "
            INSERT INTO `user` (`username`, `password`) VALUES ('$user', '$pass')
        ";

        //echo $query;

        mysqli_query($connect, $query);

        echo "User Registered";
        exit();


    }

    echo "Username already exists";

}

if($_REQUEST["stats"] == "login"){
    $query = "
        SELECT * FROM user WHERE username='$user'
    ";

    $ret = mysqli_query($connect, $query);

    $user = mysqli_fetch_assoc($ret);

    if(password_verify($_REQUEST["pass"], $user["password"])){
        $_SESSION["user"] = $_REQUEST["user"];
    }

    echo "good";
}