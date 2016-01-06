# feature/job_role.feature
Feature: To create a job role content type

Scenario: I log in and I create a new job role
	Given I am logged in as webmaster
	When I create a new job role
	Then I should see the created job role
