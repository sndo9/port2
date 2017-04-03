<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 4/2/17
 * Time: 4:12 AM
 */

require("requires.php");

$user = $_REQUEST["user"];
$title = $_REQUEST["title"];

print_r2($_REQUEST);

$query = "
    DELETE FROM texts WHERE username='$user' AND textname='$title'
";

mysqli_query($connect, $query);
echo mysqli_error($connect);