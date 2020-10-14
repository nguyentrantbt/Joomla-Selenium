<?php

namespace Step;


use Page\AbstractPage;
use Page\CategoryPage;

/**
 * Class CategoryStep
 * @package Step
 */
class CategoryStep extends \AcceptanceTester
{
    /**
     * @param $title
     * @param $shortDescrip
     * @param $descrip
     * @param $button
     * @param $message
     * @throws \Exception
     */
    public function functionCreateCategory($title, $shortDescrip, $descrip, $button, $titlePage)
    {
        $I = $this;
        $I->waitForElementVisible(CategoryPage::$categoryTab,30);
        $I->click(CategoryPage::$categoryTab);
        $I->waitForElementVisible(AbstractPage::$btnNew,10);
        $I->click(AbstractPage::$btnNew);
        $I->waitForText(CategoryPage::$categoryTxt,30);
        $I->waitForElementVisible(CategoryPage::$tittleCategory,10);
        $I->click(CategoryPage::$tittleCategory);
        $I->fillField(CategoryPage::$tittleCategory,$title);
        $I->waitForElementVisible(CategoryPage::$parentDropdownList,10);
        $I->click(CategoryPage::$parentDropdownList);
        $I->waitForElementVisible(CategoryPage::$templatesParent,10);
        $I->click(CategoryPage::$templatesParent);
        $I->waitForElementVisible(CategoryPage::$templateDropdownList,10);
        $I->click(CategoryPage::$templateDropdownList);
        $I->waitForElementVisible(CategoryPage::$listTemplate,10);
        $I->click(CategoryPage::$listTemplate);
        $I->waitForElementVisible(CategoryPage::$comparisonDropdownList,10);
        $I->click(CategoryPage::$comparisonDropdownList);
        $I->waitForElementVisible(CategoryPage::$compareComparison,10);
        $I->click(CategoryPage::$compareComparison);
        $I->waitForElementVisible(CategoryPage::$editorShortDescrip,10);
        $I->click(CategoryPage::$editorShortDescrip);
        $I->fillField(CategoryPage::$textAreaShortDescrip,$shortDescrip);
        $I->waitForElementVisible(CategoryPage::$editorDescrip,10);
        $I->click(CategoryPage::$editorDescrip);
        $I->fillField(CategoryPage::$textAreaDescrip,$descrip);
        $I->scrollTo(CategoryPage::$tittleCategory);
        $I->waitForElement(CategoryPage::$categoryImage,10);
        $I->attachFile(CategoryPage::$categoryImage,CategoryPage::$image);
        $A = new AbstractStep($this->scenario);
        $A->clickButton($button,$titlePage);
    }

    /**
     * @param $title
     * @param $title1
     * @param $button
     * @param $titlePage
     * @throws \Exception
     */
    public function editCategory($title,$title1, $button,$titlePage){
        $I = $this;
        $A = new AbstractStep($this->scenario);
        $I->amOnPage(CategoryPage::$ulrCategory);
        $A->search(AbstractPage::$filterSearch,$title);
        $I->comment("checkin");
        $I->click(AbstractPage::$selectFirstChecbox);
        $I->click(AbstractPage::$btncheckin);
        $I->comment("edit");
        $I->click(CategoryPage::$iconEdit);
        $I->see(CategoryPage::$titleEdit);
        $I->waitForElementVisible(CategoryPage::$tittleCategory,30);
        $I->fillField(CategoryPage::$tittleCategory,$title1);
        $A->clickButton($button,$titlePage);
    }

    /**
     * @param $title
     * @throws \Exception
     */
    public function editCategory_Badcase($title){
        $I = $this;
        $A = new AbstractStep($this->scenario);
        $I->amOnPage(CategoryPage::$ulrCategory);
        $A->search(AbstractPage::$filterSearch,$title);
        $I->click(CategoryPage::$iconEdit);
        $I->see(CategoryPage::$titleEdit);
        $I->waitForElementVisible(CategoryPage::$tittleCategory,30);
        $I->fillField(CategoryPage::$tittleCategory,"");
        $I->click(AbstractPage::$btnSave_Close);
        $I->see(CategoryPage::$editFailMessage);
    }
}
