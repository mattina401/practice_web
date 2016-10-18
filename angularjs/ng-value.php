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

            $scope.cars = ['MERCEDES', 'BMW', 'KIA'];
            $scope.my = {favorite: 'KIA'};
        });
    </script>

</head>

<body ng-app="mymodule">

<div ng-controller="x">
    <h4 id="favorite_CAR">Which is your favorite?</h4>
    <label ng-repeat="car in cars">
        {{car}}
        <input type="radio" ng-model="my.favorite" ng-value="car">
    </label>
    <div>Your Favorite car is: {{my.favorite}}</div>


</div>


</body>


</html>
