<?php


use Page\AbstractPage;
use Page\CategoryPage;
use Page\ProductPage;
use Step\AbstractStep;
use Step\CategoryStep;
use Step\ProductStep;
use Step\TaxGroupsStep;
use Step\TaxRatesStep;

/**
 * Class ProductCest
 */
class ProductCest
{
    /**
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * @var string
     */
    protected $adminName;

    /**
     * @var string
     */
    protected $adminPass;

    /**
     * @var string
     */
    protected $productName;

    /**
     * @var string
     */
    protected $productNewName;

    /**
     * @var string
     */
    protected $productNumber;

    /**
     * @var string
     */
    protected $price;

    /**
     * @var string
     */
    protected $category;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $shortDescrip;

    /**
     * @var string
     */
    protected $descrip;

    /**
     * @var string
     */
    protected $taxGroupName;

    /**
     * @var string
     */
    protected $taxRateName;

    /**
     * ProductCest constructor.
     */
    public function __construct()
    {
        $this->faker = Faker\Factory::create();
        $this->adminName = "admin";
        $this->adminPass = "admin";
        $this->title = $this->faker->bothify("Title ??");
        $this->shortDescrip = $this->faker->paragraph;
        $this->descrip = $this->faker->paragraph;
        $this->taxGroupName = $this->faker->lexify('Group name ?????');
        $this->taxRateName = $this->faker->lexify('Rates name ?????');
        $this->productName = $this->faker->bothify("Product Name ##??");
        $this->productNewName = $this->faker->bothify("Product Edit Name ##??");
        $this->productNumber = $this->faker->numerify();
        $this->price = $this->faker->numerify();
    }

    /**
     * @param ProductStep $I
     * @param AbstractStep $step1
     * @param CategoryStep $step2
     * @param TaxGroupsStep $step3
     * @param TaxRatesStep $step4
     * @throws Exception
     */
    public function product(ProductStep $I, AbstractStep $step1, CategoryStep $step2, TaxGroupsStep $step3, TaxRatesStep $step4){
        $step1->login($this->adminName, $this->adminPass);
        $I->wantToTest('Create a category');
        $step2->functionCreateCategory($this->title, $this->shortDescrip, $this->descrip,AbstractPage::$btnSave_Close,CategoryPage::$title);
        $I->wantToTest('Create a TaxGroup');
        $step3->createTaxGroup($this->taxGroupName,AbstractPage::$btnSave_Close);
        $I->wantToTest('Create a TaxRates');
        $step4->createTaxRates($this->taxRateName,$this->taxGroupName,AbstractPage::$btnSave_Close);
        $I->wantToTest('Create a Product');
        $I->createProduct($this->productName, $this->productNumber,$this->price,$this->title, $this->taxGroupName, AbstractPage::$btnSave_Close,ProductPage::$verifyTextSave_Close);
        $I->wantToTest('Edit a TaxGroup');
        $I->editProduct($this->productName,$this->productNewName,AbstractPage::$btnSave_Close,ProductPage::$verifyTextSave_Close);
        $I->wantToTest('Create Product accessory');
        $I->accessoryProduct($this->productNewName);
        $step1->publish(ProductPage::$urlProductManagement,ProductPage::$searchField,$this->productNewName);
        $I->assignNewCategory($this->productNewName);
        $I->removeCategory($this->productNewName);
        $step1->copy(ProductPage::$urlProductManagement,ProductPage::$searchField,$this->productNewName,AbstractPage::$copySuccessMessage);
        $step1->nonChecked(ProductPage::$urlProductManagement,ProductPage::$searchField,$this->productNewName,AbstractPage::$btnEdit);
        $I->editRequireFieldEmpty($this->productNewName);
        $I->createRequireFieldEmty();
        $step1->delete(ProductPage::$urlProductManagement,ProductPage::$searchField,$this->productNewName,AbstractPage::$messSuccessfully);
    }
}