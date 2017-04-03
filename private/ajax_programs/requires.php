<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 4/2/17
 * Time: 5:51 AM
 */

if(file_exists("../database/databaseLogin.php"))
{
    require("../database/databaseLogin.php");
}
else
{
    require("../database/serverDatabase.php");
}
require("../includes/databaseFunctions.php");
require("../includes/functions.php");