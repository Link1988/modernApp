'use strict';

describe('Controller: UsersCtrl', function () {

    // Se carga la app
    beforeEach(module('mainApp'));

    // Declaracion de variables

    var UsersCtrl,
        scope,
        httpBackend;

    // Inyeccion de dependecias en los controladores

    // Dentro de clousure en inject se le mandan los servicios
    //
    beforeEach(inject(function($controller, $rootScope, $httpBackend){
        // Crea una nuevo scope
        scope = $rootScope.$new();
        httpBackend = $httpBackend;
        UsersCtrl = $controller('UsersCtrl', {
            $scope: scope
        });
    }));

    it('should fetch a list of users',function() {
        httpBackend.expectGET('/admin/user').respond();

        httpBackend.flush();
    });



});