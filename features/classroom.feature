Feature: Create Classroom

@javascript @insulated
Scenario: Create a new classroom
  Given I am on "http://192.168.1.92:8000/listClassroom/create"
  When I fill in "crudbundle_classroom_nombre" with "Test"
  And I press "Crear Aula!"
  Then I should be on "http://192.168.1.92:8000/listClassroom/"


