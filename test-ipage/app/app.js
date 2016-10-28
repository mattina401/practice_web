/**
 * Created by kim on 2016-10-21.
 */
var app = angular.module('myApp', []);

app.controller('cntrl', function ($scope, $http, $window) {

    $scope.getdata = function () {
        $http.post("../ajax/get.php").success(function (data) {

            $scope.data= data;
            console.log(data);
        })
    }

    $scope.insert = function (email,password) {
        $http.post("../ajax/insert.php?email=" + email+"&password=" + password).success(function (data) {

            console.log(email);
            console.log(data);
        })
    }

    $scope.getdata();

});

