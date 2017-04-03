<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 4/1/17
 * Time: 11:06 PM
 */

require("requires.php");

if(!isset($_REQUEST["user"])){
    redirect_to("index.php");
}

//print_r2($_REQUEST);

$user = $_REQUEST["user"];
$textname = $_REQUEST["textname"];

$query = "
    SELECT * FROM texts WHERE username='$user';
";

//echo $query;

$ret = mysqli_query($connect, $query);
//echo mysqli_error($connect);

$num = 0;

while($entry = mysqli_fetch_assoc($ret)){
    $num++;

    $title = $entry["textname"];
    $text = $entry["text"];

    if($num == $textname){
        echo "
            <p id=ttitle><u><b>$title</b></u></p><p id='was_stored'>$text</p>
            <button onclick='delete_text(this)' id='$title'>Delete</button>
        ";
    }
}

//print_r2($entry);

//echo $entry["text"];