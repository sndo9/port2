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
$pass = password_hash($_POST["pass"], PASSWORD_BCRYPT, ['cost' => 10]);

if($_REQUEST["stats"] == "register"){

    if($user == "" || $pass == ""){
        echo "Username and password are required";
        exit();
    }
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
    } else{
        $_SESSION["message"] = "<h1>Incorrect username or password</h1>";
        exit();
    }
    //print_r2($_SESSION);
    echo "good";
}