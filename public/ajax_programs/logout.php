<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 4/2/17
 * Time: 3:25 AM
 */

session_start();
unset($_SESSION["user"]);
session_destroy();