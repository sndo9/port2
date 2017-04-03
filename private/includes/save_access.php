<div id="debug_code"></div>
<p id="username">Welcome
    <?php
    echo $_SESSION["user"];
    $user = $_SESSION["user"];
    ?>
    <br><button id="logout" onclick="logout()">Logout</button>
</p>
    <p>
    <div class=border>
        Access Saved Text:
    </p>

    <div id="saved_texts">

    </div>
</div>
<div class=border>



    <div id="save_text">
            <textarea id="textToSave" name="textToSave" cols="80" rows="10"></textarea>
        <p>
            <label class="textandpass" for="name">Text Title:</label>
            <input id="name1" name="text_name" type="text" placeholder="Save as" required />
            <button id="save_button">Save text</button>
    </div>

    <div id="disp_text">
        <div id="text_display">
            No text to display
        </div>
        <br><br>
        <button id="show_save" onclick="show_save_block()">Save text</button>
    </div>
</div>

<script>
    $saveBlock = $("#save_text")
    $textDisplay = $("#disp_text");
    $showButton = $("#show_save");
    $text_titles = $(".text_names");
    $save_text = $("#save_button");
    $text_to_save = $("#textToSave");
    $title_to_save = $("#name1");
    $saveBlock.hide();

function refresh_list() {
    $.post("ajax_programs/get_list.php", {
            user: '<?php echo $_SESSION["user"]?>'
        }, function(data){
            //alert(data);
            $("#saved_texts").html(data);
        }
    );
}
function show_save_block() {
    $saveBlock.show();
    $textDisplay.hide();
}

function get_texts(button){
    $text = $(button).attr('id');
    $.post("ajax_programs/get_text.php", {
            user: '<?php echo $user?>',
            textname: $text
        }, function(data){
            $("#text_display").html(data);
            $saveBlock.hide();
            $textDisplay.show();
        }
    )
}

$save_text.click(function(){
    var $retval;
    $.post("ajax_programs/save_text_ajax.php", {
        user: '<?php echo $user?>',
        text: $text_to_save.val(),
        text_title: $title_to_save.val()
    }, function(data){
        //$("#debug_code").html(data);
    }),
    $.post("ajax_programs/get_list.php", {
        user: '<?php echo $_SESSION["user"]?>'
    }, function(data){
        $("#saved_texts").html(data);
        $retval = data;
    });
    refresh_list();
    $saveBlock.hide();
    $textDisplay.show();
});

function logout() {
    $.post("ajax_programs/logout.php"),
        window.open("./index.php", "_self");
}

function delete_text(button) {
    $title = $(button).attr('id');
    //alert($title);
    $.post("ajax_programs/delete.php", {
            user: '<?php echo $_SESSION["user"]?>',
            title: $title
        }, function (data) {
            refresh_list();
            $("#text_display").html("No text to display");
        }
    )
}
refresh_list();




</script>
