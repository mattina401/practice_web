/**
 * Created by kim on 2016-10-22.
 */
app.controller("LoginController", function ($scope, $http, $state) {


    //variables
    $scope.signUpInfo = {
        username: undefined,
        password: undefined
    }


    $scope.loginInfo = {
        username: undefined,
        password: undefined
    }

    //functions
    $scope.signUpUserUp = function() {
        var data = {
            username: $scope.signUpInfo.username,
            password: $scope.signUpInfo.password
        }

        $http.post("signup.php", data).success(function(response) {
           console.log(response);
            localStorage.setItem("user", JSON.stringify({user: response}))
            $state.go("application");
        }).error(function(error) {
            console.error(error);
        });
    }


    $scope.loginUser = function() {
        var data = {
            username: $scope.loginInfo.username,
            password: $scope.loginInfo.password
        }

        $http.post("login.php", data).success(function(response) {
            console.log(response);
            localStorage.setItem("user", JSON.stringify({user: response.uid}));
            $state.go("application");
        }).error(function(error) {
            console.error(error);
        });
    }


});