<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 4/3/17
 * Time: 5:43 PM
 */

?>
<div id="message">
    <?php
        if(isset($_SESSION["message"])){
            echo "<h1>" . $_SESSION["message"] . "</h1>";
            unset($_SESSION["message"]);
        } else {
            echo "<h1>Welcome, please login</h1>";
        }
    ?>

</div>
<hr>
<div id="login_box">
<table>
    <tr>
        <td><h1 class="">Username: </h1></td>
    <tr><td><input type="text" id="user"></td></tr>
    </tr>
    <tr>
        <td><h1>Password: </h1></td><tr><td><input type="password" id="pass"></td></tr>
    </tr>
</table>

    <input type="button" value="Login" id="register" onclick="check('login')">
<input type="button" value="Register" id="register" onclick="check('register')">
</div>

<script>
    function check(which) {
        $.post("ajax_programs/check_login.php", {
                user: $("#user").val(),
                pass: $("#pass").val(),
                stats: which
            }, function(data){
                if(data == "good") {
                    window.open("./index-mobile.php", "_self");
                }else {
                    $("#message").html(data);
                }
            }
        )
    };
</script>