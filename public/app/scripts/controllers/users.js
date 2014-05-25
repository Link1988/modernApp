'use strict'

angular.module('mainApp')

    .controller('UsersCtrl', function($scope, UserService) {

        $scope.users = UserService.query();

    })

    .controller('UserCtrl', function($scope, UserService) {

        $scope.users = UserService.query();

    });
