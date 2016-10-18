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
            $scope.templatePages=[
                {temp: 'firstPage', url: 'change-style.php'},
                {temp: 'secondPage', url: 'ng-show.php'}
            ];
            $scope.tempPage=$scope.templatePages[0];
        });
    </script>

</head>

<body ng-app="mymodule">

<div ng-controller="x">
    <select ng-model="tempPage" ng-options="p.temp for p in templatePages">
        <option value="">(Empty)</option>
    </select>
    <div ng-include="tempPage.url"></div>


</div>




</body>


</html>
