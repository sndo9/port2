<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 2/12/17
 * Time: 11:39 AM
 */
session_start();
require("../private/includes/requires.php");
if(!isset($_SESSION["txt"]))
{
    redirect_to("index.php");
}
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<title>GlueDrum: Access Text</title>
<html lang="en">
<style>
    .background:before{

        content: "";
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: -1;

        display: block;
        background-image: url('../public/images/glue_drum_background.jpg');
        background-size:cover;
        background-position: calc(90%) calc(40%);

        width: 100%;
        height: 100%;
        */
        -webkit-filter: blur(4px);
        -moz-filter: blur(4px);
        -o-filter: blur(4px);
        -ms-filter: blur(4px);
        filter: blur(4px);
    }
    .text1{
        font-size: 22px;
        color: white;
        text-shadow: 0px 0px 4px black ;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
    }
    .text2{
        font-size: 26px;
        color: white;
        text-shadow: 0px 0px 3px black ;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
    }
    .background {
        overflow: hidden;
        position: relative;
    }
    div.container {
        width: 100%;
    }
    article {
        margin-left: 50%;
        border-left: 2px solid white;
        padding: 1em;
        overflow: hidden;
    }
    side {
        font-size: 24px;
        float: left;
        max-width: 50%;
        margin: 0;
        padding: 1em;
    }
    .headerfooter{
        letter-spacing: 1px;
        font-size: 28px;
        line-height: 10;
        margin: auto;
        width: 40%;
        color: white;
        text-shadow: 0px 0px 2px black ;
    }
    .button {
        -webkit-transition-duration: 0.4s;
        transition-duration: 0.4s;
        font-size: 20px;
        width: 15%;
    }

    .button:hover {
        background-color: #000000;
        color: #ffffff;
    }
    .border{
        border: white double 2px;
        padding: 25px;
        padding-top: 10px;
        border-radius: 3px;
        box-shadow: 0px 0px 0px 8px rgba(0,0,0,0.3);
    }
    .AccessText{
        word-wrap: break-word;
        max-width: 95%;
        color: white;
        text-shadow: 0px 0px 2px black ;
        padding-top: 20px;
    }
</style>
<div class = background>
<body>
<side>
    <div class="border">
        <div class="text2">
            Saved Text:
        </div>
        <div>__________________________________________________________________________</div>
        <div id="AccessText" class="AccessText"><?php
            echo($_SESSION["txt"]);
            unset($_SESSION["txt"]);
            ?>  </div>

    </div>
</side>



<article>
    <subtitle class="text2" size="+4">Save Text:</subtitle>
    </p>

    <div class="container">
        <form name="savedText" action="processing.php" method="post">
            <textarea name="textToSave" cols="80" rows="10"></textarea>
            <p>
                <label class = text1 for="name">Text Title:</label>
                <input id="name1" name="text_name" type="text" placeholder="Save as" required />
            <div id="isNameDuplicate1"></div>
            </p>
            <p>
                <label class = text1 for="password">Password:</label>
                <input id="password1" name="password" type="password" placeholder="Password" required />
            <div id="isPasswordValid1"></div>
            </p>
            <input type="submit" class="button" id="save" name="submit" value="Save" />
        </form>

        <form name="accessText" action="processing.php" method="post">
            <p>
                <subtitle class="text2" >Access Saved Text:</subtitle>
            </p>
            <p>
                <label class = text1 for="name">Text Title:</label>
                <input id="name" name="text_name" type="text" placeholder="Open as" required />
            <div id="isNameDuplicate"></div>
            </p>
            <p>
                <label class = text1 for="password">Password:</label>
                <input id="password" name="password" type="password" placeholder="Password" required />
            <div id="isPasswordValid"></div>
            </p>
            <input type="submit" class ="button" id="access" name="submit" value="Access" />
        </form>
    </div>
</article>
<div class = headerfooter>Work of Robert Guetzlaff & William Paul for 319 Portfolio 1 </div>
</html>

