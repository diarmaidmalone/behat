# feature/external_resource.feature
Feature: To add an external resource content type

Scenario: I log in and I add a new external resource
	Given I am logged in as webmaster
	When I add a new external resource
	Then I should see the external resource
