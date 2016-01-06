# feature/group.feature
Feature: To create a group content type

Scenario: I log in and I create a new group
	Given I am logged in as webmaster
	When I create a new group
	Then I should see the created group
