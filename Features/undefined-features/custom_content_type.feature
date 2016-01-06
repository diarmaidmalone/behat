# feature/custom_content_type.feature
Feature: To create a custom content type

Scenario: I log in and I create a new custom content type
	Given I am logged in as webmaster
	When I create a new custom content type
	Then I should see the created custom content type
