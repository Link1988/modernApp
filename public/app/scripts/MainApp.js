'use strict';

/**
 * Aqui ocurre el patron de diseño chaining
 * Del modulo que hace la instancia corre todo el config
 * El modulo por medio de un arreglo de javascript inserta
 * esos recursos como ngCookies, ngRoute, etc
 *
 * En config hace la inyección de dependencias
 */

angular.module('mainApp', [
    'ngCookies',
    'ngResource',
    'ngSanitize',
    'ngRoute'
])
    .config(function ($routeProvider) {
        $routeProvider
        .when('/', {
            templateUrl: '/app/views/main.html',
            controller: 'MainCtrl'
        })
        .when('/users', {
            templateUrl: '/app/views/users.html',
            controller: 'UsersController'
        })
        .when('/user/:id', {
            templateUrl: '/app/views/user.html',
            controller: 'UserController'
        })
        .when('/user/:id/delete', {
            templateUrl: '/app/views/user_delete.html',
            controller: 'UserController'
        })
        .otherwise({
            redirectTo: '/'
        });
    });
