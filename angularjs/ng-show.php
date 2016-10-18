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
        var mymodule=angular.module("mymodule",[]);

        mymodule.controller("x", function($scope) {
            $scope.initialname="rex";
            $scope.initialemail="aa@aa.com";

            $scope.age ="55";
            $scope.pattern = /^\d*$/;
            //positive number
        });
    </script>

</head>

<body ng-app="mymodule">
<div ng-controller="x">
    <form name="form1">
        <label>Name:</label>
        <input name="name" ng-model="initialname" required>
        <span style="color: red" ng-show="form1.name.$error.required">
            please provide your name
        </span>
        <br>
        <label>Email:</label>
        <input type="email" name="email" ng-model="initialemail" required>
        <span style="color: red" ng-show="form1.email.$error.required">
            please provide your email
        </span>
        <br>
        <label>Age:</label>
        <input name="age" ng-model="age" ng-pattern="pattern">
        <span style="color: red" ng-show="form1.age.$error.pattern">
            Age must be positive
        </span>
        <br>
    </form>
</div>





</body>


</html>
