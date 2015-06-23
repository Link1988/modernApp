'use-strict';

describe('Controller: Users',function(){
    beforeEach(module('mainApp'));

    var UsersController,
    controller,
    httpBackend,
    scope;

    beforeEach(inject(function($controller,$rootScope,$httpBackend){
        scope = $rootScope.$new();
        httpBackend = $httpBackend;
        controller = $controller;
    }));

    afterEach(function() {
        httpBackend.verifyNoOutstandingExpectation();
        httpBackend.verifyNoOutstandingRequest();
    });

    it('should fetch a list of users',function(){
        httpBackend.expectGET('/admin/user').respond();
        UsersController = controller('UsersController',{
            $scope:scope
        });
        httpBackend.flush();
    });
});