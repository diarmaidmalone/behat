# feature/discussion.feature
Feature: To create a event content type

Scenario: I log in and I create a new discussion
	Given I am logged in as webmaster
	When I create a new discussion
	Then I should see the created discussion
