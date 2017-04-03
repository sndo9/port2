<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 4/1/17
 * Time: 8:56 PM
 */
require_once("../private/includes/requires.php");
session_start();

if(!isset($_POST["login_register"])){
    redirect_to("index.php");
}

$user = $_POST["user"];
$pass = password_hash($_POST["pass"], PASSWORD_BCRYPT, ['cost' => 10]);

print_r2($_POST);

if($_POST["login_register"] == "register"){

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

        $_SESSION["login_message"] = "User Registered";


    }

    else $_SESSION["login_message"] = "Username already exists";
    redirect_to("index.php");

}

if($_POST["login_register"] == "login"){
    $query = "
        SELECT * FROM user WHERE username='$user'
    ";

    $ret = mysqli_query($connect, $query);

    $user = mysqli_fetch_assoc($ret);

    if(password_verify($_POST["pass"], $user["password"])){
        $_SESSION["user"] = $_POST["user"];
        redirect_to("index.php");
    }
}