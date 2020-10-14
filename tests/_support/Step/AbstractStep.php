<?php

namespace Step;


use Page\AbstractPage;
use Page\ProductPage;

/**
 * Class AbstractStep
 * @package Step
 */
class AbstractStep extends \AcceptanceTester
{
    /**
     * @param $userName
     * @param $passWord
     * @throws \Exception
     */
    public function login($userName, $passWord)
    {
        $I = $this;
        $I->amOnPage(AbstractPage::$urlRedShop);
        $I->waitForElementVisible(AbstractPage::$userNameField, 30);
        $I->fillField(AbstractPage::$userNameField, $userName);
        $I->fillField(AbstractPage::$passwordField, $passWord);
        $I->waitForElementVisible(AbstractPage::$btnLogin, 30);
        $I->click(AbstractPage::$btnLogin);
        $I->waitForText(AbstractPage::$welcomeRedShopTxt, 30);
        $I->see(AbstractPage::$welcomeRedShopTxt);
    }

    /**
     * @param $searchField
     * @param $text
     * @throws \Exception
     */
    public function search($searchField, $text)
    {
        $I = $this;
        $I->waitForElementVisible(AbstractPage::$btnReset);
        $I->waitForElementClickable(AbstractPage::$btnReset);
        $I->wait(0.2);
        $I->waitForElementVisible(AbstractPage::$btnReset,30);
        $I->click(AbstractPage::$btnReset);
        $I->waitForElementVisible($searchField,30);
        $I->fillField($searchField,$text);
        $I->pressKey($searchField,\Facebook\WebDriver\WebDriverKeys::ENTER);
    }

    /**
     * @param $url
     * @param $searchField
     * @param $title
     * @param $message
     * @throws \Exception
     */
    public function delete($url,$searchField,$title,$message){
        $I = $this;
        $I->amOnPage($url);
        $I->search($searchField,$title);
        $I->waitForElementClickable(AbstractPage::$selectAllChecbox);
        $I->click(AbstractPage::$selectAllChecbox);
        $I->waitForElementVisible(AbstractPage::$btnDelete1);
        $I->click(AbstractPage::$btnDelete1);
        $I->acceptPopup();
        $I->waitForText($message, 30);
        $I->research($searchField,$title);
    }

    /**
     * @param $searchField
     * @param $text
     * @throws \Exception
     */
    public function research($searchField,$text)
    {
        $I = $this;
        $I->waitForElementVisible(AbstractPage::$btnReset);
        $I->waitForElementClickable(AbstractPage::$btnReset);
        $I->wait(0.2);
        $I->click(AbstractPage::$btnReset);
        $I->waitForElementVisible($searchField,30);
        $I->fillField($searchField,$text);
        $I->pressKey($searchField,\Facebook\WebDriver\WebDriverKeys::ENTER);
        $I->see(AbstractPage::$searchFailMessage);
    }

    /**
     * @param $button
     * @param $title
     */
    public function clickButton($button,$title)
    {
        $I = $this;
        switch($button){
            case AbstractPage::$btnSave:
            {
                $I->click(AbstractPage::$btnSave);
                $I->see($title);
                break;
            }
            case AbstractPage::$btnSave_Close:
            {
                $I->click(AbstractPage::$btnSave_Close);
                $I->see($title);
                break;
            }
            case AbstractPage::$btnSave_New:
            {
                $I->click(AbstractPage::$btnSave_New);
                $I->see($title);
                break;
            }
            case AbstractPage::$btnCancel:
            {
                $I->click(AbstractPage::$btnCancel);
                $I->see($title);
                break;
            }
        }
    }

    /**
     * @param $url
     * @param $searchField
     * @param $item
     * @throws \Exception
     */
    public function publish($url, $searchField, $item)
    {
        $I = $this;
        $A = new AbstractStep($this->scenario);
        $I->amOnPage($url);
        $A->search($searchField, $item);
        $I->waitForElementVisible(AbstractPage::$selectFirstChecbox,30);
        $I->click(AbstractPage::$selectFirstChecbox);
        $I->click(AbstractPage::$btnPublish);
        $I->waitForText(AbstractPage::$messSuccessfully,30);
    }

    /**
     * @param $url
     * @param $searchField
     * @param $item
     * @throws \Exception
     */
    public function unPublish($url, $searchField, $item)
    {
        $I = $this;
        $A = new AbstractStep($this->scenario);
        $I->amOnPage($url);
        $A->search($searchField, $item);
        $I->waitForElementVisible(AbstractPage::$selectFirstChecbox);
        $I->click(AbstractPage::$selectFirstChecbox);
        $I->click(AbstractPage::$btnUnPublish);
        $I->waitForText(AbstractPage::$messSuccessfully,30);
    }

    /**
     * @param $url
     * @param $searchField
     * @param $text
     * @param $message
     * @throws \Exception
     */
    public function copy($url,$searchField,$text,$message){
        $I = $this;
        $I->amOnPage($url);
        $I->search($searchField,$text);
        $I->waitForElementClickable(AbstractPage::$selectFirstChecbox);
        $I->click(AbstractPage::$selectFirstChecbox);
        $I->waitForElementVisible(AbstractPage::$btnCopy);
        $I->click(AbstractPage::$btnCopy);
        $I->waitForText($message, 30);
        $I->search($searchField,$text);
        $I->see($text." (2)");
    }

    /**
     * @param $url
     * @param $searchField
     * @param $item
     * @param $button
     * @throws \Exception
     */
    public function nonChecked($url, $searchField, $item,$button)
    {
        $I = $this;
        $A = new AbstractStep($this->scenario);
        $I->amOnPage($url);
        $A->search($searchField, $item);
        $I->waitForElementVisible($button);
        $I->click($button);
        $I->acceptPopup();
    }

    /**
     * @param $url
     * @param $button
     * @param $title
     * @param $message
     * @throws \Exception
     */
    public function checkin($url,$button,$title,$message){
        $I = $this;
        $I->amOnPage($url);
        $I->search($button,$title);
        $I->waitForElementClickable(AbstractPage::$selectFirstChecbox);
        $I->click(AbstractPage::$selectFirstChecbox);
        $I->waitForElementVisible(AbstractPage::$btncheckin);
        $I->click(AbstractPage::$btncheckin);
        $I->waitForText($message, 30);
    }
}