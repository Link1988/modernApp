'use strict';

angular.module('mainApp')
	.controller('UsersController', function ($scope,UserService) {
		$scope.users = UserService.query();
	})
	.controller('UserController', function ($scope,UserService,$routeParams) {
		if($routeParams.id) {
			$scope.user = UserService.get({id:$routeParams.id});

			$scope.send = function(){
				$scope.user.$update();
			}

			$scope.delete = function(){
				$scope.user.$delete();
			};
		} else {
			$scope.user = UserService.new();
			$scope.send = function(){
				$scope.user.$save();
			}
		}
	});