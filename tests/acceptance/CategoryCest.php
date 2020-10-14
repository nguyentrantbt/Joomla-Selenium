<?php

use Page\AbstractPage;
use Page\CategoryPage;
use Step\AbstractStep;
use Step\CategoryStep;

/**
 * Class CategoryCest
 */
class CategoryCest
{
    /**
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $title1;

    /**
     * @var string
     */
    protected $shortDescrip;
    /**
     * @var string
     */
    protected $descrip;

    /**
     * CategoryCest constructor.
     */
    public function __construct()
    {
        $this->faker = Faker\Factory::create();
        $this->userNameAdmin = "admin";
        $this->passWordAdmin = "admin";
        $this->title = $this->faker->title;
        $this->title = $this->faker->bothify("Title ??");
        $this->title1 = $this->faker->title;
        $this->title1 = $this->faker->bothify("Title edit ??");
        $this->shortDescrip = $this->faker->paragraph;
        $this->descrip = $this->faker->paragraph;
        $this->number = $this->faker->numberBetween(0,10);
    }

    /**
     * @param CategoryStep $I
     * @param AbstractStep $A
     * @throws Exception
     */
    public function category(CategoryStep $I, AbstractStep $A)
    {
        $A->login($this->userNameAdmin, $this->passWordAdmin);

        $I->functionCreateCategory($this->title, $this->shortDescrip, $this->descrip,AbstractPage::$btnSave,CategoryPage::$titleEdit);
        $I->functionCreateCategory($this->title, $this->shortDescrip, $this->descrip,AbstractPage::$btnSave_Close,CategoryPage::$title);
        $I->functionCreateCategory($this->title, $this->shortDescrip, $this->descrip,AbstractPage::$btnSave_New,CategoryPage::$titleNew);
        $I->functionCreateCategory($this->title, $this->shortDescrip, $this->descrip,AbstractPage::$btnSave_New,CategoryPage::$titleNew);
        $I->functionCreateCategory($this->title, $this->shortDescrip, $this->descrip,AbstractPage::$btnCancel,CategoryPage::$title);

        $I->editCategory_Badcase($this->title);

        $A->nonChecked(CategoryPage::$ulrCategory,AbstractPage::$filterSearch,$this->title,AbstractPage::$btnCopy);
        $A->nonChecked(CategoryPage::$ulrCategory,AbstractPage::$filterSearch,$this->title,AbstractPage::$btnDelete);
        $A->nonChecked(CategoryPage::$ulrCategory,AbstractPage::$filterSearch,$this->title,AbstractPage::$btnPublish);
        $A->nonChecked(CategoryPage::$ulrCategory,AbstractPage::$filterSearch,$this->title,AbstractPage::$btnUnPublish);

        $I->editCategory($this->title,$this->title1,AbstractPage::$btnSave,CategoryPage::$titleEdit);
        $I->editCategory($this->title,$this->title1,AbstractPage::$btnSave_Close,CategoryPage::$title);
        $I->editCategory($this->title,$this->title1,AbstractPage::$btnSave_New,CategoryPage::$titleNew);
        $I->editCategory($this->title,$this->title1,AbstractPage::$btnCancel,CategoryPage::$title);

        $A->copy(CategoryPage::$ulrCategory,AbstractPage::$filterSearch,$this->title1,CategoryPage::$copySuccessMessage);
        $A->unPublish(CategoryPage::$ulrCategory,AbstractPage::$filterSearch,$this->title1);
        $A->publish(CategoryPage::$ulrCategory,AbstractPage::$filterSearch,$this->title1);
        $A->checkin(CategoryPage::$ulrCategory,AbstractPage::$filterSearch,$this->title1,CategoryPage::$checkinSuccessMessage);
        $A->delete(CategoryPage::$ulrCategory,AbstractPage::$filterSearch,$this->title1,CategoryPage::$deleteSuccessMessage);
        $A->research(AbstractPage::$filterSearch,$this->title1);
    }
}