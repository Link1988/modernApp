'use strict';

describe('Controller: MainCtrl', function () {

  // load the controller's module
  // Se ejecuta una funcion antes de cualquier prueba
  // Se asegura de cargar el modulo en este caso es mainApp
  beforeEach(module('mainApp'));

  var MainCtrl,
    scope;

  // Initialize the controller and a mock scope
  // Pasa el controlador y el rootScope y en base a
  // esto crea un nuevo scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    MainCtrl = $controller('MainCtrl', {
      $scope: scope
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(scope.awesomeThings.length).toBe(3);
  });

  it('should have a greeting',function() {
    expect(scope.greeting).toBe("Hola desde Angular");
  });

  it("contains spec with an expectation", function() {
      expect(true).toBe(true);
  });
});
