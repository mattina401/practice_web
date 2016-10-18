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

        mymodule.controller("x", function ($scope, $timeout) {

            $scope.miliSeconds = 0;
            var countUp = function () {
                $scope.miliSeconds += 1000;
                $timeout(countUp, 1000);
            }
            $timeout(countUp, 1000);


        });
    </script>

</head>

<body ng-app="mymodule">

<div ng-controller="x">

    <form id="form1">
        <div ng-controller="x">
            <span>Time (in ms): {{miliSeconds}}</span>
        </div>
    </form>


</div>


</body>


</html>
