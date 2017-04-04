<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 4/2/17
 * Time: 4:54 AM
 */
session_start();
?>

<html>
<head>
    <title></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
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
    #interface{
        font-size: 30px;
        margin-top: 20px;
    }
    #login_box{
        font-size: 50px;
        transform: translate(0%, 0%);
        zoom: 5;
    }
</style>
<body>
<div class="background">

</div>
<center>
    <div id="interface">
        <?php
            if(!isset($_SESSION["user"])){
                require ("../private/includes/login-mobile.php");
            } else {
                require ("../private/includes/save_access-mobile.php");
            }
        ?>

    </div>
</center>
</body>
</html>