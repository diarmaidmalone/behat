# feature/note.feature
Feature: To create a note content type

Scenario: I log in and I create a new note
	Given I am logged in as webmaster
	When I create a new note
	Then I should see the created note 
