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

    <style>
        .changeColor {
            color: blue;
        }

        .changeSize {
            font-size: 30px;
        }

        .italic {
            font-style: italic;
        }
    </style>

</head>

<body>


<div>
    <p ng-class="style">Hello my name is rex</p><br>
    <input ng-model="style">

    <p ng-class="{changeColor:a,changeSize:b,italic:c}">Hello my name is kim</p><br>
    <input type="checkbox" ng-model="a"> Color <br>
    <input type="checkbox" ng-model="b"> Size <br>
    <input type="checkbox" ng-model="c"> Italic <br>
</div>



</body>


</html>
