<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<?php
session_start();
require("../private/includes/requires.php");

?>
<title>GlueDrum</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<center>
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
            background-size:cover;
            background: url('images/glue_drum_background.jpg') calc(90%)calc(20%);
            background-size:     cover;                      /* <------ */
            background-repeat:   no-repeat;
            background-position: center center;

            width: 100%;
            height: 100%;

            -webkit-filter: blur(4px);
            -moz-filter: blur(4px);
            -o-filter: blur(4px);
            -ms-filter: blur(4px);
            filter: blur(4px);
        }
        .background {
           overflow: hidden;
            position: relative;

        }
        body{
            font-size: 40px;
            text-shadow: 1px 1px 4px #F1BE48;
            color: #C8102E;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }
        .button {
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
            font-size: 38px;
        }

        .button:hover {
            background-color: #C8102E;
            color: #F1BE48;
        }

        .border{
            border: gray double 5px;
            padding: 25px;

        }
        .textandpass{
            font-size: 26px;
            text-shadow: 1px 1px 4px #ffffff, -1px -1px 4px #ffffff;
            color: #000000;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }
        .text_names{
            font-size:25px;
        }
        #was_stored{
            font-size: 30px;
        }
    </style>

    <?php
    //print_r2($_SESSION);
    if(isset($_SESSION["message"]))
    {
        echo($_SESSION["message"]);
        unset($_SESSION["message"]);
    };
    if(!isset($_SESSION["user"])) {
        include("../private/includes/login.php");
    } else{
        include("../private/includes/save_access.php");
    }
    ?>

    <div class="background">
        <meta charset="UTF-8">


    </body>

    </div>

</html>
