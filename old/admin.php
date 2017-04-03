<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 2/12/17
 * Time: 12:43 PM
 */
require("../private/includes/requires.php");
?>
<!DOCTYPE html>
<html lang="en">
<title>Glue Admin</title>

<form name="savedText" action="admin.php" method="post">
    <input type="submit" name="submit" value="Display all">
</form>

<?php

//Never worked
//if($_POST === "reset")
//{
//    $query = "TRUNCATE TABLE portfilio1";
//    mysqli_query($connect, "TRUNCATE TABLE portfolio1");
//}

if(isset($_POST["submit"])) {
    if ($_POST["submit"] === "Display all") {
        $result = mysqli_query($connect, "SELECT * FROM portfolio1");

        $output = "";
        $output .= "<tr><td>Text Name</td> | <td>Text</td></tr><br>";

        while ($data = mysqli_fetch_assoc($result)) {
            $output .= "<tr><td>" . $data["text_name"] . "</td> | <td>" . $data["text"] . "</td></tr><br><br>";
        }

        echo($output);
    }
}
?>