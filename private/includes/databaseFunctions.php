<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 2/11/17
 * Time: 4:54 PM
 */
/**
 * @param $text
 */
function get_text($text){
    $result = mysqli_query($connect, $text);

    if($result){

    } else {
        echo $query . '<br />';
        die("Database query failed. " . mysqli_error($connect));
    }
}

/**
 * @param $query
 */
function store_text($query){
    $result = mysqli_query($connect, $query);

}