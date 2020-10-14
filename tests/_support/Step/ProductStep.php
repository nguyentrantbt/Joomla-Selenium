<?php

namespace Step;

use Page\AbstractPage;
use Page\ProductPage;
use Step\AbstractStep;
use const http\Client\Curl\PROXY_HTTP;


/**
 * Class ProductStep
 * @package Step
 */
class ProductStep extends \AcceptanceTester
{
    /**
     * @param $productName
     * @param $productNumber
     * @param $price
     * @param $category
     * @param $vat
     * @param $btnName
     * @param $verifymess
     * @throws \Exception
     */
    public function createProduct($productName, $productNumber, $price, $category, $vat, $btnName, $verifymess)
    {
        $A= new AbstractStep($this->scenario);
        $I = $this;
        $I->amOnPage(ProductPage::$urlProductManagement);
        $I->waitForText(ProductPage::$productManagementText,30);
        $I->waitForElementVisible(AbstractPage::$btnNew,30);
        $I->click(AbstractPage::$btnNew);
        $I->waitForText(ProductPage::$newProductText,30);
        $I->waitForElementVisible(ProductPage::$productContent,30);
        $I->waitForElementVisible(ProductPage::$productName,30);
        $I->fillField(ProductPage::$productName,$productName);
        $I->waitForElementVisible(ProductPage::$productNumber,30);
        $I->fillField(ProductPage::$productNumber,$productNumber);
        $I->waitForElementVisible(ProductPage::$productPrice,30);
        $I->fillField(ProductPage::$productPrice,$price);
        $I->chooseVAT($vat);
        $I->chooseCategory($category);
        $I->attachFile(ProductPage::$productImage,ProductPage::$fileName);
        $A->clickButton($btnName, $verifymess);
    }

    /**
     * @param $text
     * @throws \Exception
     */
    public function chooseVAT($text)
    {
        $I = $this;
        $I->waitForElementVisible(ProductPage::$VAT_Tax,30);
        $I->waitForElementClickable(ProductPage::$VAT_Tax,30);
        $I->click(ProductPage::$VAT_Tax);
        $I->fillField(ProductPage::$VAT_TaxTxtbox,$text);
        $I->waitForElementClickable(ProductPage::$VAT_TaxOption,30);
        $I->click(ProductPage::$VAT_TaxOption);
    }

    /**
     * @param $text
     * @throws \Exception
     */
    public function chooseCategory($text)
    {
        $I = $this;
        $I->waitForElementVisible(ProductPage::$productCategory,30);
        $I->waitForElementClickable(ProductPage::$productCategory,30);
        $I->click(ProductPage::$productCategory);
        $I->waitForElementClickable(ProductPage::$categoryOption. $text."')]",30);
        $I->click(ProductPage::$categoryOption. $text."')]");
    }

    /**
     * @param $oldName
     * @param $newProduct
     * @param $btnName
     * @param $verifytext
     * @throws \Exception
     */
    public function editProduct($oldName, $newProduct, $btnName, $verifytext)
    {
        $A= new AbstractStep($this->scenario);
        $I = $this;
        $I->amOnPage(ProductPage::$urlProductManagement);
        $A->search(ProductPage::$searchField,$oldName);
        $I->waitForElementVisible(AbstractPage::$selectFirstChecbox);
        $I->click(AbstractPage::$selectFirstChecbox);
        $I->waitForElementVisible(AbstractPage::$btnEdit,30);
        $I->click(AbstractPage::$btnEdit);
        $I->waitForElementVisible(ProductPage::$productName,30);
        $I->fillField(ProductPage::$productName,$newProduct);
        $A->clickButton($btnName,$verifytext);
    }

    /**
     * @param $text
     * @throws \Exception
     */
    public function assignNewCategory($text)
    {
        $A= new AbstractStep($this->scenario);
        $I = $this;
        $I->amOnPage(ProductPage::$urlProductManagement);
        $A->search(ProductPage::$searchField,$text);
        $I->waitForElementVisible(AbstractPage::$selectFirstChecbox);
        $I->click(AbstractPage::$selectFirstChecbox);
        $I->waitForElementVisible(ProductPage::$btnAssignNewCategory,30);
        $I->click(ProductPage::$btnAssignNewCategory);
        $I->waitForElementVisible(ProductPage::$selectCategoryField,30);
        $I->click(ProductPage::$selectCategoryField);
        $I->waitForElementVisible(ProductPage::$productCategory2rdOption);
        $I->click(ProductPage::$productCategory2rdOption);
        $I->waitForElementVisible(ProductPage::$btnAssignNewCategory,30);
        $I->click(ProductPage::$btnAssignNewCategory);
        $I->waitForText(ProductPage::$messAddCategory,30);
    }

    /**
     * @param $text
     * @throws \Exception
     */
    public function removeCategory($text)
    {
        $A= new AbstractStep($this->scenario);
        $I = $this;
        $I->amOnPage(ProductPage::$urlProductManagement);
        $A->search(ProductPage::$searchField,$text);
        $I->waitForElementVisible(AbstractPage::$selectFirstChecbox);
        $I->click(AbstractPage::$selectFirstChecbox);
        $I->waitForElementVisible(ProductPage::$btnRemoveCategory,30);
        $I->click(ProductPage::$btnRemoveCategory);
        $I->waitForElementVisible(ProductPage::$selectCategoryField,30);
        $I->click(ProductPage::$selectCategoryField);
        $I->waitForElementVisible(ProductPage::$productCategory2rdOption);
        $I->click(ProductPage::$productCategory2rdOption);
        $I->waitForElementVisible(ProductPage::$btnConfirmRemoveCategory,30);
        $I->click(ProductPage::$btnConfirmRemoveCategory);
        $I->waitForText(ProductPage::$messRemoveCategory,30);
    }

    /**
     * @param $product
     * @throws \Exception
     */
    public function editRequireFieldEmpty($product)
    {
        $A= new AbstractStep($this->scenario);
        $I = $this;
        $I->amOnPage(ProductPage::$urlProductManagement);
        $A->search(ProductPage::$searchField,$product);
        $I->waitForElementVisible(AbstractPage::$selectFirstChecbox);
        $I->click(AbstractPage::$selectFirstChecbox);
        $I->waitForElementVisible(AbstractPage::$btnEdit,30);
        $I->click(AbstractPage::$btnEdit);
        $I->waitForElementVisible(ProductPage::$productName,30);
        $I->clearField(ProductPage::$productName);
        $A->click(AbstractPage::$btnSave_Close);
        $I->acceptPopup();
    }

    /**
     * @throws \Exception
     */
    public function createRequireFieldEmty()
    {
        $A= new AbstractStep($this->scenario);
        $I = $this;
        $I->amOnPage(ProductPage::$urlProductManagement);
        $I->waitForText(ProductPage::$productManagementText,30);
        $I->waitForElementVisible(AbstractPage::$btnNew,30);
        $I->click(AbstractPage::$btnNew);
        $I->waitForText(ProductPage::$newProductText,30);
        $I->waitForElementVisible(ProductPage::$productContent,30);
        $I->waitForElementVisible(ProductPage::$productName,30);
        $I->fillField(ProductPage::$productName,"");
        $I->click(AbstractPage::$btnSave_Close);
        $I->acceptPopup();
    }

    /**
     * @param $product
     * @throws \Exception
     */
    public function accessoryProduct($product)
    {
        $A= new AbstractStep($this->scenario);
        $I = $this;
        $I->amOnPage(ProductPage::$urlProductManagement);
        $A->search(ProductPage::$searchField,$product);
        $I->waitForElementVisible(AbstractPage::$selectFirstChecbox);
        $I->click(AbstractPage::$selectFirstChecbox);
        $I->waitForElementVisible(AbstractPage::$btnEdit,30);
        $I->click(AbstractPage::$btnEdit);
        $I->waitForElementVisible(ProductPage::$accessoryTab,30);
        $I->click(ProductPage::$accessoryTab);
        $I->waitForElementVisible(ProductPage::$accessoryDropdownList,30);
        $I->click(ProductPage::$accessoryDropdownList);
        $I->fillField(ProductPage::$accessoryField,ProductPage::$productModel1);
        $I->pressKey(ProductPage::$accessoryField,\Facebook\WebDriver\WebDriverKeys::ENTER);
        $I->waitForElementVisible(ProductPage::$firstProductModel,30);
        $I->click(ProductPage::$firstProductModel);
        $I->waitForText(ProductPage::$productModel2,30);
        $I->waitForElementVisible(AbstractPage::$btnSave_Close,30);
        $I->click(AbstractPage::$btnSave_Close);
        $I->wait(5);
        $I->waitForText(ProductPage::$messSaved,30);
    }
}