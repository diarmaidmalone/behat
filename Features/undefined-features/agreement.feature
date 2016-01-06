# feature/agreement.feature
Feature: To create an agreement content type

Scenario: I log in and I create a new agreement
	Given I am logged in as webmaster
	When I create a new agreement
	Then I should see the agreement created
