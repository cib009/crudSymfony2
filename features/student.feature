Feature: Create Student

@javascript @insulated
Scenario: Create a new student
  Given I am on "http://192.168.1.92:8000/listStudents/create"
  When I fill in "crudbundle_student_name" with "Test"
  And I fill in "crudbundle_student_surname" with "Test"
  And I select "test" from "crudbundle_student[Classroom]"
  And I press "Crear estudiante!"
  Then I should be on "http://192.168.1.92:8000/listStudents/"


