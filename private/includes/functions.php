<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 2/12/17
 * Time: 12:34 AM
 */
/**
 * @param $new_location
 */

function redirect_to($new_location){
    header("Location: " . $new_location);
    exit;
}

function print_r2($val){
    echo '<pre>';
    print_r($val);
    echo  '</pre>';
}