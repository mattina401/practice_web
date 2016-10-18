/**
 * Created by kim on 2016-10-11.
 */



var AuthorApp = angular.module('AuthorApp',[]);

AuthorApp.controller("MyController",function($scope){

    $scope.authors = [

        {'name' : 'Maruti Makwana'},
        {'name' : 'rex'},
        {'name' : 'kim'},
        {'name' : 'lee'}
    ];

});