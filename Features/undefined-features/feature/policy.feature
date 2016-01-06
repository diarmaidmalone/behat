# feature/policy.feature
Feature: To create a new policy content type

Scenario: I log in and I create a new policy
	Given I am logged in as webmaster
	When I create a new policy
	Then I should see the created policy
