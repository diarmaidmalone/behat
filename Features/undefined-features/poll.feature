# feature/poll.feature
Feature: To create a poll content type

Scenario: I log in and I create a new poll
	Given I am logged in as webmaster
	When I create a new poll
	Then I should see the created poll
