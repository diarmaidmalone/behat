# feature/promotion.feature
Feature: To create a promotion content type

Scenario: I log in and I create a new promotion 
	Given I am logged in as webmaster
	When I create a new promotion
	Then I should see the created promotion
