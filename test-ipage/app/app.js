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

    $scope.login = function (loginEmail, loginPassword) {
        $http.post("../ajax/login.php?loginEmail=" + loginEmail + "&loginPassword=" + loginPassword).success(function (data) {
            $scope.loginData = data;
            console.log(data);

            // login success
            if (data == "1") {
                $window.location.href = '../manage.php';
            }
        })
    }

    $scope.signup = function (signupEmail, signupPassword, signupConfirmPassword) {

        $scope.signupMsg = "";
        if (signupPassword != signupConfirmPassword) {
            $scope.signupMsg = "Password does not match the confirm password ";
        } else {
            $http.post("../ajax/signup.php?signupEmail=" + signupEmail + "&signupPassword=" + signupPassword).success(function (data) {
                $scope.signupData = data;
                console.log(data);
                $window.location.href = '../manage.php';
            })
        }
    }

    $scope.logout = function () {
        $http.post("../ajax/logout.php").success(function (data) {
            console.log(data);
            //log out success
            if (data == "1") {
                $window.location.href = '../index.php';
            }
        })
    }

    $scope.updatePassword = function (newPassword, updateConfirmPassword) {
        $scope.updatePasswordMsg = "";
        if (newPassword != updateConfirmPassword) {
            $scope.updatePasswordMsg = "Password does not match the confirm password ";
        } else {
            $http.post("../ajax/updatePassword.php?newPassword=" + newPassword).success(function (data) {
                $scope.updatePasswordData = data;
                console.log(data);
                //change password success
                if (data == "1") {
                    console.log("password changed")
                }
            })
        }

    }


});



//listController
app.controller('listController', function ($scope, $http,$window) {

    // display lists
    $scope.displayList = function () {

        $http.post("../ajax/displayList.php").success(function (data) {
            $scope.displayListData = data;
            console.log(data);
        });
    }


    // display shared lists
    $scope.displaySharedList = function () {

        $http.post("../ajax/displaySharedList.php").success(function (data) {
            $scope.displaySharedListData = data;
            console.log(data);
        });
    }


    // add list
    $scope.addList = function (newListName) {

        $http.post("../ajax/addList.php?newListName=" + newListName).success(function (data) {
            $scope.displayList();
            console.log(data);

        });
    }


    $scope.goTable = function (listId) {

        $http.post("../ajax/storeListId.php?listId=" + listId).success(function (data) {
            console.log(data);
            $window.location.href = '../task.php';
        })
    }


    $scope.displayList();
    $scope.displaySharedList();

});

//taskController
app.controller('tasksController', function ($scope, $http) {
    getTask(); // Load all available tasks

    function getTask() {
        $http.get("../ajax/getTask.php").success(function (data) {
            $scope.tasks = data;
            console.log(data);
        });
    };

    $scope.addTask = function (task) {
        $http.post("../ajax/addTask.php?task=" + task).success(function (data) {
            getTask();
            $scope.taskInput = "";
            console.log(task);
            console.log(data);
        });
    };
    $scope.deleteTask = function (task) {
        if (confirm("Are you sure to delete this line?")) {
            $http.post("../ajax/deleteTask.php?taskID=" + task).success(function (data) {
                getTask();
            });
        }
    };

    $scope.toggleStatus = function (item, status, task) {
        if (status == '2') {
            status = '0';
        } else {
            status = '2';
        }
        $http.post("../ajax/updateTask.php?taskID=" + item + "&status=" + status).success(function (data) {
            getTask()
            $scope.msg = item + "" + status + "" + task;
        });
    };


    $scope.editTask = function (editInput, itemId) {

        var inputData = {
            editInput: editInput,
            itemId: itemId
        }

        $http.post("../ajax/editTask.php", inputData).success(function (data) {
            getTask();
            console.log(data);

        });
    };


});


// send listId to modal

app.controller('MainCtrl', ['$scope', 'dataShare',
    function ($scope, dataShare) {
        $scope.send = function (listId) {
            dataShare.sendData(listId);
            console.log(listId);
        };

    }
]);
app.controller('MainCtrl2', ['$scope', '$http', 'dataShare',

    function ($scope, $http, dataShare) {

        //variables
        $scope.inviteInfo = {
            email: undefined,
            listId: undefined

        }

        $scope.invite = function () {

            var inputData =
            {
                email: $scope.inviteInfo.email,
                listId: $scope.inviteInfo.listId
            }

            $http.post("../ajax/invite.php", inputData).success(function (data) {
                $scope.data = data;
                console.log(data);
            });
        };


        $scope.$on('data_shared', function () {
            var listId = dataShare.getData();
            $scope.inviteInfo.listId = listId;
        });
    }
]);
app.factory('dataShare', function ($rootScope) {
    var service = {};
    service.data = false;
    service.sendData = function (data) {
        this.data = data;
        $rootScope.$broadcast('data_shared');
    };
    service.getData = function () {
        return this.data;
    };
    return service;
});


//inviteController
app.controller('invite', function ($scope, $http, $window) {

    $scope.getInvite = function () {

        $http.post("../ajax/get-invite.php").success(function (data) {
            $scope.inviteList = data;
            console.log(data);

        })

    }

    $scope.accept = function (sharedId) {

        $http.post("../ajax/accept.php?sharedId=" + sharedId).success(function (data) {
            console.log(data);
            $scope.getInvite();
        })

    }

    $scope.decline = function (sharedId) {

        $http.post("../ajax/decline.php?sharedId=" + sharedId).success(function (data) {
            console.log(data);
            $scope.getInvite();
        })

    }


    $scope.getInvite();


});