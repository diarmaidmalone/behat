# feature/webform.feature
Feature: To create a webform content type

Scenario: I log in and create a new webform
	Given I am logged in as webmaster
	When I create a new webform
	Then I should see the created webform
