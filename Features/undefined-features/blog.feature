# feature/blog.feature
Feature: To create a blog content type

Scenario: I log in and I create a new list
	Given I am logged in as webmaster
	When I create a new blog
	Then I should see the created blog
