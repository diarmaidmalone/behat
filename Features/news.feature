# features/news.feature
Feature: Visit Invotra and create a news article content type

Scenario: I log in and create a new news article
  	Given I am logged in as webmaster
  	When I create a new news article
  	Then I should see the created news article
