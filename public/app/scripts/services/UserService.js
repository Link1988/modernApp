'use strict';

angular.module('mainApp')

    .factory('UserService', function($resource){

        var users = $resource('/admin/user/:id', {id: '@id'}, {
            update : {method: 'PUT', params: {id: '@id'}}
        });

        users.new = function(){
            return new users();
        }

        return users;

    });