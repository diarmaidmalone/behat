# feature/question.feature
Feature: To create a question content type

Scenario: I log in and I create a new question
	Given I am logged in as webmaster
	When I create a new question
	Then I should see the created question
