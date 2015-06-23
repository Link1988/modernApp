'use strict';

describe('Service: UserService', function(){

    beforeEach(module('mainApp'));

    /**
     * Mock de httpBackend
     */
    var service,
        httpBackend,
        mockUser,
        fetchUser;

    fetchUser = function() {
        httpBackend.expectGET('/admin/user/1').respond(mockUser);

        var user = service.get({id:1});

        httpBackend.flush();

        return user;
    }

    beforeEach(inject(function(UserService, $injector, $httpBackend) {
        service = UserService;
        //httpBackend = $injector.get('$httpBackend');
        httpBackend = $httpBackend;
        mockUser = {"id":1,"username":"link899","email":"alez.hdz.88@gmail.com","created_at":"2014-04-05 16:58:48","updated_at":"2014-04-05 16:58:53"};
    }));

    /**
     * Verifica que todas las expectivas se hayan cumplido
     * y que no haya request pendientes
     */
    afterEach(function(){
        httpBackend.verifyNoOutstandingExpectation();
        httpBackend.verifyNoOutstandingRequest();
    });

    it('should be able to fetch a list of all users',function(){

        var users = new Array();

        users.push(mockUser);

        httpBackend.expectGET('/admin/user').respond(users);

        /* Se obtienen todos los usuarios */
        var result = service.query();

        httpBackend.flush();

        expect(result[0].id).toBe(users[0].id);
        expect(result[0].username).toBe(users[0].username);
        expect(result[0].email).toBe(users[0].email);

    });

    it('should be able to fetch a single user',function(){

        var user = fetchUser();
        expect(user.username).toBe(mockUser.username);

    });

    it('should be able to create a new user', function(){
        var user = service.new();

        user.username = mockUser.username;
        user.email = mockUser.email;

        httpBackend.expectPOST('/admin/user').respond(mockUser);
        var response;
        user.$save({},function(data) {
            response = data;
        });
        httpBackend.flush();
        expect(response.username).toBe(user.username);
    });

    it('should be able to edit a user', function(){
        var user = fetchUser();
        user.username = "alez";
        user.email = "alec_899@hotmail.com";

        mockUser.username = user.username;
        mockUser.email = user.email;

        httpBackend.expectPUT('/admin/user/'+ user.id, user).respond(mockUser);

        var response;
        user.$update({id:user.id},function(data){
            response = data;
        });
        httpBackend.flush();
        expect(response.username).toBe(user.username);

    });

    it('should be able to delete a user', function(){
        var user = fetchUser();
        var message = {message:'OK'};

        // DELETE NO TE REGRESA UNA PROMESA
        httpBackend.expectDELETE('/admin/user/'+user.id).respond({message: 'DELETE OK'});
        var userDelete;

        user.$delete({id:1}, function(data) {
            userDelete = data;
        });

        httpBackend.flush();

        expect(deleteUser.message).toBe(message.message);
    });

});