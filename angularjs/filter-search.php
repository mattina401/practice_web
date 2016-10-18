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

        mymodule.controller("x", function ($scope, $filter) {

            $scope.cars = [
                {carId: 001, carName: 'Santro'},
                {carId: 002, carName: 'Swift Dzire'},
                {carId: 003, carName: '120'},
                {carId: 004, carName: 'Verna'},
                {carId: 005, carName: 'City'}
            ];

            $scope.cars2 = $scope.cars;
            $scope.$watch('search', function (val) {
                $scope.cars = $filter('filter')($scope.cars2, val);
            });

        });
    </script>

</head>

<body ng-app="mymodule">

<div ng-controller="x">

    <input type="text" ng-model="search">
    <table>
        <tbody>
        <tr ng-repeat="car in cars">
            <td>{{car.carId}}</td>
            <td>{{car.carName}}</td>

        </tr>
        </tbody>
    </table>


</div>


</body>


</html>
