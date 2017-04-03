<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 2/12/17
 * Time: 12:05 AM
 */
session_start();
require("../private/includes/requires.php");

if(!isset($_POST["submit"]))
{
    redirect_to("index.php");
}
//Save Text
if($_POST["submit"] === "Save")
{
    $text_name = mysqli_real_escape_string($connect,$_POST["text_name"]);
    $textToSave = mysqli_real_escape_string($connect,$_POST["textToSave"]);

    $query = "SELECT text_name FROM portfolio1 WHERE text_name = \"" . $_POST["text_name"] . "\"";
    //echo($query);
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) > 0)
    {
        //echo("u");
        $_SESSION["message"] = "Title already in use";
        $_SESSION["text"] = $_POST["textToSave"];
        redirect_to("index.php");
    }
    else
    {
        //echo("k");
    }

    $password = password_hash($_POST["password"], PASSWORD_BCRYPT, ['cost' => 10]);
    $query = "INSERT INTO portfolio1 (text_name, password, text) VALUES ('";
    $query .= $text_name;
    $query .= "', '";
    $query .= $password;
    $query .= "', '";
    $query .= $textToSave;
    $query .= "');";

    mysqli_query($connect, $query);

    $_SESSION["message"] = "Text Saved!";

    redirect_to("index.php");
}
//Get Text
else if($_POST["submit"] === "Access")
{
    $query = "SELECT * FROM portfolio1 WHERE text_name = \"";
    $query .= $_POST["text_name"];
    $query .= "\";";

    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) > 0)
    {

    }
    else
    {
        $_SESSION["message"] = "Text does not exist";
        redirect_to("index.php");
    }

    $string = "false";

    $data = mysqli_fetch_assoc($result);
    if(password_verify($_POST["password"], $data["password"]))
    {
        $_SESSION["txt"] = $data["text"];
        redirect_to("displayData.php");
    }
    else
    {
        $_SESSION["message"] = "incorrect password";
        redirect_to("index.php");
    }





}
?>

<html>
<title>Processing</title>
<h1>Getting data</h1>
<?php
echo($query);
echo("<br>");
print_r2($_POST);
?>
</html>
