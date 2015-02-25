Feature: Student crud

Scenario: Create a new student
  Given I am on "http://localhost:8000/listStudents/create"
  When I fill in "crudbundle_student_name" with "Test"
