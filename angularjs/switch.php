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
            $scope.div = ['div1', 'div2', 'div3'];
            $scope.selectedDiv = $scope.div[0];
        });
    </script>

</head>

<body ng-app="mymodule">

<div ng-controller="x">
    <select ng-model="selectedDiv" ng-options="item for item in div"></select>
    you selected={{selectedDiv}}
    <hr>
    <div ng-switch="selectedDiv">
        <div style="border: 1px solid black;" ng-switch-when="div1">
            hello from first div
        </div>

        <div style="border: 1px solid black;" ng-switch-when="div2">
            hello from second div
        </div>

        <div style="border: 1px solid black;" ng-switch-when="div3">
            hello from third div
        </div>

    </div>
</div>


</body>


</html>
