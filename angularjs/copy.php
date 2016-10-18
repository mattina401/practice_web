<?php
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-11
 * Time: 오후 9:17
 */

?>

<!DOCTYPE html>

<html ng-app>

<head>
    <title></title>
    <script src="js/angular.js"></script>


</head>

<body>


<p ng-copy="copied=true">
    this p is actually having some text inside that.
</p>
<br>
<input type="text" ng-cut="cut=true" ng-paste="paste=true">
<br>
you have copied={{copied}}
<br>
you have copied={{cut}}
<br>
you have copied={{paste}}
<br>



</body>


</html>
