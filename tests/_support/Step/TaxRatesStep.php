<?php

namespace Step;

use Page\AbstractPage;
use Page\TaxRatesPage;

/**
 * Class TaxRatesStep
 * @package Step
 */
class TaxRatesStep extends \AcceptanceTester
{
    /**
     * @param $taxRateName
     * @param $taxGroupName
     * @param $btnName
     * @throws \Exception
     */
    public function createTaxRates($taxRateName, $taxGroupName, $btnName)
    {
        $A= new AbstractStep($this->scenario);
        $I = $this;
        $I->amOnPage(TaxRatesPage::$ulrTaxRatesPage);
        $I->waitForText(TaxRatesPage::$txtTaxRatesTitle,30);
        $I->waitForElementVisible(AbstractPage::$btnNew,30);
        $I->click(AbstractPage::$btnNew);
        $I->waitForElementVisible(TaxRatesPage::$taxRateName,30);
        $I->click(TaxRatesPage::$taxRateName);
        $I->fillField(TaxRatesPage::$taxRateName,$taxRateName);
        $I->waitForElementClickable(TaxRatesPage::$taxGroup,30);
        $I->click(TaxRatesPage::$taxGroup);
        $I->searchTaxRate($taxGroupName);
        $I->scrollTo(TaxRatesPage::$shopperGroup);
        $I->waitForElementClickable(TaxRatesPage::$shopperGroup,30);
        $I->click(TaxRatesPage::$shopperGroup);
        $I->click(TaxRatesPage::$shopperGroupOption);
        $A->clickButton($btnName,TaxRatesPage::$txtTaxRatesTitle);
    }

    /**
     * @param $taxRateName
     * @param $txtTaxRatesEdit
     * @param $btnName
     * @throws \Exception
     */
    public function editTaxRates($taxRateName,$txtTaxRatesEdit, $btnName)
    {
        $A= new AbstractStep($this->scenario);
        $I = $this;
        $I->amOnPage(TaxRatesPage::$ulrTaxRatesPage);
        $A->search(AbstractPage::$filterSearch,$taxRateName);
        $I->waitForElementVisible(AbstractPage::$selectFirstChecbox);
        $I->click(AbstractPage::$selectFirstChecbox);
        $I->canSee($taxRateName);
        $I->waitForElementVisible(AbstractPage::$iconEdit,30);
        $I->click(AbstractPage::$iconEdit);
        $I->canSee(TaxRatesPage::$txtTaxRatesTitleEdit);
        $I->fillField(TaxRatesPage::$taxRateName,$txtTaxRatesEdit);
        $I->wait(0.2);
        $A->clickButton($btnName,TaxRatesPage::$txtTaxRatesTitle);
    }

    /**
     * @param $text
     * @throws \Exception
     */
    public function searchTaxRate($text)
    {
        $I = $this;
        $I->waitForElementClickable(TaxRatesPage::$searchTaxGroupTxtbox,30);
        $I->fillField(TaxRatesPage::$searchTaxGroupTxtbox,$text);
        $I->waitForElementClickable(TaxRatesPage::$taxGroupOption,30);
        $I->click(TaxRatesPage::$taxGroupOption);
    }
}