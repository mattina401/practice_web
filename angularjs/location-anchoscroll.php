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

    <style>
        #div {
            height:350px;
            overflow: auto;
        }
        #down {
            display: block;
            margin-top: 2000px;
        }
    </style>


    <script>
        var mymodule = angular.module("mymodule", []);

        mymodule.controller("x", function ($scope, $location, $anchorScroll) {

            $scope.goDown = function(){
                $location.hash('down');
                $anchorScroll();
            }
            $scope.goUp = function(){
                $location.hash('up');
                $anchorScroll();
            }



        });
    </script>




</head>

<body ng-app="mymodule">

<div id="div" ng-controller="x">
    <div style="color: green">
        <a id="up" ng-click="goDown()">Go Down</a>
    </div>

    <div style="color: red">
        <a id="down" ng-click="goUp()">You're at the bottom</a>
    </div>


</div>


</body>


</html>
