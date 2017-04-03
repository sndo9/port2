<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 4/1/17
 * Time: 10:16 PM
 */

session_start();

require("../private/includes/requires.php");

if($_POST["submit"] != "Save"){
    redirect_to("index.php");
}

//print_r2($_POST);

$text_to_save = $_POST["textToSave"];
$text_name = $_POST["text_name"];
$user = $_SESSION["user"];

//print_r2($_SESSION);

$query = "SELECT * FROM texts WHERE textname='$text_name'";

$ret = mysqli_query($connect, $query);

if($ret->num_rows == 0){
    $query = "INSERT INTO texts (`textname`, `username`, `text`) VALUES 
      ('$text_name', '$user', '$text_to_save');
      ";

    mysqli_query($connect, $query);

    redirect_to("index.php");
} else {
    $_SESSION["error"] = "Text with that name already exists";
    $_SESSION["text"] = $text_to_save;

    redirect_to("index.php");
}