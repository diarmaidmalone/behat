# feature/thing.feature
Feature: To create a thing content type

Scenario: I log in and I create a new thing
	Given I am logged in as webmaster
	When I create a new thing
	Then I should see the created thing
