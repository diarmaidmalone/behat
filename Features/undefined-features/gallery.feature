# feature/gallery.feature
Feature: To create a gallery content type

Scenario: I log in and I create a new gallery
	Given I am logged in as webmaster
	When I create a new gallery
	Then I should see the created gallery
