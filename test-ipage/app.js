/**
 * Created by kim on 2016-10-21.
 */
var app = angular.module('myApp', []);

app.controller('cntrl', function ($scope, $http, $window) {

    $scope.getdata = function () {
        $http.post("./get.php").success(function (data) {

            $scope.data= data;
            console.log(data);
        })
    }

    $scope.insert = function (email) {
        $http.post("./insert.php?email=" + email).success(function (data) {

            console.log(email);
            console.log(data);
        })
    }

    $scope.getdata();

});

