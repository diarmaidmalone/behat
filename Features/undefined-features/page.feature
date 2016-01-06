# feature/page.feature
Feature: To create a page content type

Scenario: I log in and I create a new page
	Given I am logged in as webmaster
	When I create a new page
	Then I should see the created page
