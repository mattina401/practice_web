<?php
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-11
 * Time: 오후 9:17
 */

?>

<!DOCTYPE html>

<html>

<head>
    <title></title>
    <script src="js/angular.js"></script>


    <script>
        var mymodule = angular.module("mymodule", []);

        mymodule.controller("x", function ($scope) {
            $scope.clickCounter = 0;
            $scope.check = function () {
                $scope.clickCounter++;
            }
        });
    </script>

</head>

<body ng-app="mymodule">


<div ng-controller="x">
    <input type="checkbox" ng-model="model" ng-change="check()"/>
    <input type="checkbox" ng-model="model"/>
    <label>I am working for second checkbox</label><br>
    Checkboxes are Checked = {{model}} <br>
    <div> counter ={{clickCounter}}</div>
</div>


</body>


</html>
