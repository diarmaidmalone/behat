<?php
use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Behat\Mink\Mink,
    Behat\Mink\Session,
    Behat\Mink\Driver\Selenium2Driver;
use Behat\MinkExtension\Context\MinkContext,
    Behat\MinkExtension\Context\MinkAwareContext;

use Selenium\Client as SeleniumClient;

// Require 3rd-party libraries here:
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    /**
     * Initializes context.
     * Every scenario gets its own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $mink = new Mink(array(
		    'selenium2' => new Session(new Selenium2Driver($parameters['wd_capabilities']['browser'], $parameters['wd_capabilities'], $parameters['wd_host'])),
		));
		
		$this->gui = $mink->getSession('selenium2');
    }

    //Logging in
    
    /**
     * @Given /^I am on "([^"]*)"$/
     */
    public function iAmOn($arg1)
    {
        $this->gui->start();
        $this->gui->visit($arg1);
    }

    /**
     * @When /^I fill "([^"]*)" with "([^"]*)"$/
     */
    public function iFillWith($arg1, $arg2)
    {
        $page = $this->gui->getPage();
        $page->fillField($arg1, $arg2);
    }
    
    /**
     * @Then /^I press "([^"]*)"$/
     */
    public function iPress($arg1)
    {
    	$page = $this->gui->getPage();
    	$page->find("css", "input[value='$arg1']")->click();
        $this->gui->wait(1000);
    }

    /**
     * @When /^I mouse over "([^"]*)"$/
     */
    public function iHoverOver($arg1)
    {
        $page = $this->gui->getPage();
    	$page->find("css", "input[title='$arg1']")->mouseOver();
        $this->gui->wait(1000);
    }

    /**
     * @Then /^I should be on "([^"]*)"$/
     */
    public function iShouldBeOn($arg1)
    {
        $page = $this->gui->getCurrentUrl();
        assertEquals($page, $arg1);
        $this->gui->stop();
    }
    
    /**
     * @Given /^I log in$/
     */
    public function iLogIn()
    {
        $page = $this->gui->getPage();
        $page->fillField("edit-name", "webmaster");
        $page->fillField("edit-pid", "2014");
        $page->fillField("edit-pass", "webmaster");
        $page->find("css", "input[value='Log in']")->click();
        $this->gui->wait(1000);
    }

    //News article creation
    
    /**
     * @Given /^I am logged in as webmaster$/
     */
    public function iAmLoggedInAsWebmaster()
    {
    	$this->gui->start();
        $this->gui->visit("http://jonnie.invotra.io1test.com/user");
        $page = $this->gui->getPage();
        $page->fillField("edit-name", "webmaster");
        $page->fillField("edit-pid", "2014");
        $page->fillField("edit-pass", "webmaster");
        $page->find("css", "input[value='Log in']")->click();
        $this->gui->wait(1000);
    }

    public function iSaveNode()
    {
    	$page = $this->gui->getPage();
    	$this->iWaitForjQueryToFinish();
        $page->findButton('edit-submit')->press();
        //$this->pressButton('Submit');
 	$this->iWaitForjQueryToFinish();
    	// Check if error is on the page
    }
    
    public function iWaitForjQueryToFinish($time = 15000)
    {
        $this->gui->wait($time, '(typeof(jQuery)=="undefined" || (0 === jQuery.active && 0 === jQuery(\':animated\').length))');
    }
    
    /**
     * @When /^I create a new news article$/
     */
    public function iCreateANewNewsArticle()
    {
        $this->gui->visit("http://jonnie.invotra.io1test.com/node/add/news");
        $page = $this->gui->getPage();
        $page->fillField("title", "test1");
        $page->selectFieldOption('body[und][0][format]', "plain_text", true );
        $page->fillField("body[und][0][value]", "test1");
        $page->selectFieldOption('edit-field-site-section-und-0-target-id-select-1', "145", true );
        $this->gui->wait(1000);
        $this->iSaveNode();
    }

    /**
     * @Then /^I should see the created news article$/
     */
    public function iShouldSeeTheCreatedNewsArticle()
    {
        $page = $this->gui->getCurrentUrl();
        assertEquals($page, "http://jonnie.invotra.io1test.com/news/*");
        assertEquals('id="page-title"', "test1");
    }

    // List creation   
    /**
     * @When /^I create a new list$/
     */
    public function iCreateANewList()
    {
        $this->gui->visit("http://jonnie.invotra.io1test.com/node/add/list");
        $page = $this->gui->getPage();
        $page->fillField("title", "test1");
        $page->selectFieldOption('body[und][0][format]', "plain_text", true );
        $page->fillField("body[und][0][value]", "test1");
        $page->selectFieldOption('edit-field-site-section-und-0-target-id-select-1', "145", true );
        $this->gui->wait(1000);
        $this->iSaveNode();
    }

    /**
     * @Then /^I should see the created list$/
     */
    public function iShouldSeeTheCreatedList()
    {
        assertEquals('id="page-title"', "test1");
    }
}
