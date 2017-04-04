<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 4/3/17
 * Time: 7:24 PM
 */
    echo "<h1>Welcome ";
    echo $_SESSION["user"];
    $user = $_SESSION["user"];
    echo "</h1>";

?>
<button onclick="logout()">Logout</button>
<div id="debug_code"></div>
<style>
    #buttons{
        zoom: 5;
    }
    .border{
        zoom: 2;
    }
</style>
<div id="buttons">
    <button id="show_list" onclick="populate_list()">Saved texts</button>
    <button id="save_blob" onclick="hide_list()">New Text</button>
</div>
<div class="border">
    <div id="text_list">
        Access Saved Text:<br><br>

        <div id="saved_texts">
            <br>

        </div>

    </div>

    <div id="new_text">
        Save new text:<br>
        <textarea cols="50" rows="8" id="text" placeholder="Text here..."></textarea>
        <input type="text" id="title" placeholder="Text title..."><br>
        <button onclick="save_textblob()">Save Text</button>
    </div>

    <div id="to_show">

    </div>

</div>

<script>
function populate_list() {
    $.post("ajax_programs/get_list.php", {
            user: '<?php echo $_SESSION["user"]?>'
        }, function(data){
            //alert(data);
            $("#saved_texts").html(data);
        }
    );
    $("#text_list").show();
    $("#new_text").hide();
    $("#to_show").hide();
}

function hide_list(){
    $("#text_list").hide();
    $("#new_text").show();
}

function save_textblob() {
    var $retval;
    $.post("ajax_programs/save_text_ajax.php", {
        user: '<?php echo $user?>',
        text: $("#text").val(),
        text_title: $("#title").val()
    }, function(data){
        $("#debug_code").html(data);
    $("#text_list").show();
    $("#new_text").hide();
})}

function get_texts(button){
    var $text = $(button).attr('id');
    $.post("ajax_programs/get_text.php", {
            user: '<?php echo $user?>',
            textname: $text
        }, function(data){
            $("#to_show").html(data);
            $("#text_list").hide();
            $("#to_show").show();
        }
    )
}

function delete_text(button) {
    $title = $(button).attr('id');
    //alert($title);
    $.post("ajax_programs/delete.php", {
            user: '<?php echo $_SESSION["user"]?>',
            title: $title
        }, function (data) {
            populate_list();
            $("#text_list").show();
            $("#new_text").hide();
            $("#to_show").hide();
        }
    )
}

function logout() {
    $.post("ajax_programs/logout.php"),
        window.open("./index-mobile.php", "_self");
}

$("#to_show").hide();
$("#new_text").hide();
populate_list();
</script>