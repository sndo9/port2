<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 4/2/17
 * Time: 2:06 AM
 */
require("requires.php");
$user = $_REQUEST["user"];

usleep(500);

$query = "
  SELECT * FROM `texts` WHERE username='$user'
";

//echo $query;

$ret = mysqli_query($connect, $query);
echo mysqli_error($connect);

if($ret->num_rows == 0){
    $output = "No saved texts found";
} else{
    $output = "";
    $num = 0;
    while($entry = mysqli_fetch_assoc($ret)){
        $text_title = $entry["textname"];
        $num++;
        $output .= "<p id='$num' class='text_names' onclick='get_texts(this)'>$text_title</p>";
    }
}

echo $output;