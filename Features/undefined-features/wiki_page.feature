# feature/wiki_page.feature
Feature: To create a wiki page content type

Scenario: I log in and I create a new wiki page
	Given I am logged in as webmaster
	When I create a new wiki page
	Then I should see the created wiki page
