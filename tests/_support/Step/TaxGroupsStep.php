<?php


namespace Step;

use Page\AbstractPage;
use Page\TaxGroupsPage;
use Step\AbstractStep;

/**
 * Class TaxGroupsStep
 * @package Step
 */
class TaxGroupsStep extends \AcceptanceTester
{
    /**
     * @param $taxGroupName
     * @param $btnName
     * @throws \Exception
     */
    public function createTaxGroup($taxGroupName, $btnName)
    {
        $A= new AbstractStep($this->scenario);
        $I = $this;
        $I->amOnPage(TaxGroupsPage::$ulrTaxGroupsPage);
        $I->waitForText(TaxGroupsPage::$txtTaxGroupTitle,30);
        $I->waitForElementVisible(AbstractPage::$btnNew,30);
        $I->click(AbstractPage::$btnNew);
        $I->waitForElementVisible(TaxGroupsPage::$taxGroupName,30);
        $I->click(TaxGroupsPage::$taxGroupName);
        $I->fillField(TaxGroupsPage::$taxGroupName,$taxGroupName);
        $A->clickButton($btnName,TaxGroupsPage::$txtTaxGroupTitle);
    }

    /**
     * @param $taxGroupName
     * @param $taxGroupNameEdit
     * @param $btnName
     * @throws \Exception
     */
    public function editTaxGroup($taxGroupName,$taxGroupNameEdit, $btnName)
    {
        $A= new AbstractStep($this->scenario);
        $I = $this;
        $I->amOnPage(TaxGroupsPage::$ulrTaxGroupsPage);
        $A->search(AbstractPage::$filterSearch,$taxGroupName);
        $I->waitForElementVisible(AbstractPage::$selectFirstChecbox);
        $I->click(AbstractPage::$selectFirstChecbox);
        $I->canSee($taxGroupName);
        $I->waitForElementVisible(AbstractPage::$iconEdit,30);
        $I->waitForElementClickable(AbstractPage::$iconEdit,30);
        $I->click(AbstractPage::$iconEdit);
        $I->wait(0.5);
        $I->fillField(TaxGroupsPage::$taxGroupName,$taxGroupNameEdit);
        $I->wait(0.5);
        $A->clickButton($btnName,TaxGroupsPage::$txtTaxGroupTitle);
    }
}