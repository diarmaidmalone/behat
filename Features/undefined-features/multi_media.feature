# feature/multi_media.feature
Feature: To create a multi media content type

Scenario: I log in and I create a new multi media content type
	Given I am logged in as webmaster
	When I create a new multi media content type
	Then I should see the created multi media content type
