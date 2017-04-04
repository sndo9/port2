<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 4/3/17
 * Time: 7:24 PM
 */

?>
<style>
    #buttons{
        zoom: 3;
    }
</style>
<div id="buttons">
    <button id="show_list">Saved texts</button>
    <button id="save_blob">New Text</button>
</div>
<div class="border">
<div id="text_list">
    Access Saved Text:

    <div id="saved_texts">
        <br>

    </div>

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
};



populate_list();
</script>