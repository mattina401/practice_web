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
    <input ng-init="x=0" ng-keyup="x=x+1">{{x}}
    <br>
    <input ng-init="y=0" ng-keydown="y=y+1">{{y}}
    <input type="checkbox" ng-model="check">
    <textarea ng-disabled="check"></textarea>
</div>



</body>


</html>
