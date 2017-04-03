<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 4/2/17
 * Time: 12:27 AM
 */

require("requires.php");

//print_r2($_REQUEST);

$user = $_REQUEST["user"];
$text = $_REQUEST["text"];
$text_title = $_REQUEST["text_title"];

if($text_title == ""){
    echo "Must enter a title.";
    exit();
}

$query = "
    SELECT * FROM texts WHERE username='$user' AND textname='$text_title'
";

$ret = mysqli_query($connect, $query);

if($ret->num_rows){
    echo "You already have a saved text with that name.";
    exit();
}

$query = "
    INSERT INTO texts (`username`, `textname`, `text`) VALUES ('$user', '$text_title', '$text')
";

mysqli_query($connect, $query);

echo "Entry added";