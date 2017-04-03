<p>
    <font size="+55"><header>Portfolio 2:</header> </font>
    <font size="+55"><header>Ajax/Mobile GlueDrum</header> </font>
</p>
<p>
    <font size="+3"><subtitle>319: Mitra</subtitle><font>
</p>

<p>
    <subtitle>Robert Guetzlaff and William Paul</subtitle>
</p>

Please login.

<br><br>

<!--<form action="checklogin.php" method="post">-->
    <table>
        <tr>
            <td>Username:</td>
            <td><input type="text" id="user" name="user"></td>
        </tr>
        <tr>
            <td>Password: </td>
            <td><input type="password" id="pass" name="pass"></td>
        </tr>
        <tr>
            <td><input type="radio" name="login_register" value="login" checked>Login</td>
            <td><input type="radio" name="login_register" value="register">Register</td>
        </tr>
    </table>
    <input type="submit" value="Submit" name="submit" id="submit">
<!--</form>-->

<script>
    $("#submit").click(function(){
        var radios = jQuery("input[type='radio']");
        var radio = radios.filter(":checked");
        $stat = $(radio).attr('value');
        $.post("../private/ajax_programs/check_login.php", {
            user: $("#user").val(),
            pass: $("#pass").val(),
            stats: $stat
        }, function(data){
            //alert(data);
            if(data == "good") {
                //alert("should");
                window.open("./index.php", "_self");
            }
            }
        )
    })
</script>