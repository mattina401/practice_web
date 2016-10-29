/**
 * Created by kim on 2016-10-21.
 */
var app = angular.module('myApp', []);

app.controller('cntrl', function ($scope, $http, $window) {

    /*
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
            $scope.getdata();
        })
    }

    $scope.getdata();

    */

    $scope.login = function(loginEmail,loginPassword) {
        $http.post("../ajax/login.php?loginEmail=" + loginEmail + "&loginPassword=" + loginPassword).success(function(data) {
            $scope.loginData = data;
            console.log(data);

            // login success
            if(data == "1") {
                $window.location.href = '../index.php';
            }
        })
    }

    $scope.signup = function(signupEmail,signupPassword,signupConfirmPassword) {

        $scope.signupMsg = "";
        if(signupPassword != signupConfirmPassword) {
            $scope.signupMsg = "Password does not match the confirm password ";
        } else {
            $http.post("../ajax/signup.php?signupEmail=" + signupEmail + "&signupPassword=" + signupPassword).success(function(data) {
                $scope.signupData = data;
                console.log(data);
            })
        }
    }

    $scope.logout = function() {
        $http.post("../ajax/logout.php").success(function(data) {
            console.log(data);
            //log out success
            if(data == "1") {
                $window.location.href = '../index.php';
            }
        })
    }





});

