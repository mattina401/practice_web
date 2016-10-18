<?php
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-14
 * Time: 오전 12:06
 */

define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","apptosucceed");

$dbhandle=new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE) or die("Unable to Connect DB");


?>