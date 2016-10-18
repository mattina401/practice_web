<?php
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-12
 * Time: 오후 3:31
 */

define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","test");

$dbhandle=new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE) or die("Unable to Connect DB");


?>