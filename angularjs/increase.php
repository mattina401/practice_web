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

<div>
    <button ng-click="x=x+1" ng-init="x=0">click me</button><br>
    value of x is {{x}}
    <br>
    <input ng-init="y=0" ng-blur="y=y+1">
    <input>
    value of y is {{y}}
</div>


</body>


</html>
