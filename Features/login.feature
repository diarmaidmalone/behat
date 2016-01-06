# features/login.feature
Feature: Visit Invotra and login

  Scenario: I log in to Invotra
  	Given I am on "http://jonnie.invotra.io1test.com/user"
  	When I fill "edit-name" with "webmaster"
  	And I fill "edit-pid" with "2014"
  	And I fill "edit-pass" with "webmaster"
  	Then I press "Log in"
  	And I should be on "http://jonnie.invotra.io1test.com/users/web-mster"
