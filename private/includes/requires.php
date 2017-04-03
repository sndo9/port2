<?php
/**
 * Created by PhpStorm.
 * User: sndo9
 * Date: 2/12/17
 * Time: 12:36 AM
 */

if(file_exists("../private/database/databaseLogin.php"))
{
    require("../private/database/databaseLogin.php");
}
else
{
    require("../private/database/serverDatabase.php");
}
require("../private/includes/databaseFunctions.php");
require("../private/includes/functions.php");