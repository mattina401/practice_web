/**
 * Created by kim on 2016-10-22.
 */
app.controller("MainController", function($scope, $state) {
    //if user is not logged in
    if(localStorage['user'] === undefined) {
        $state.go("login");
    }
});