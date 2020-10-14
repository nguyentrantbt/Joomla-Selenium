<?php

use Step\AbstractStep;
use Page\AbstractPage;
use Page\TaxGroupsPage;
use Step\TaxGroupsStep;

/**
 * Class TaxGroupsCest
 */
class TaxGroupsCest
{
    /**
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * @var string
     */
    protected $userNameAdmin;

    /**
     * @var string
     */
    protected $passWordAdmin;

    /**
     * @var string
     */
    protected $taxGroupName;

    /**
     * @var string
     */
    protected $taxGroupNameEdit;

    /**
     * TaxGroupsCest constructor.
     */
    public function __construct()
    {
        $this->faker = Faker\Factory::create();
        $this->userNameAdmin = "admin";
        $this->passWordAdmin = "admin";
        $this->taxGroupName = $this->faker->lexify('Group name ?????');
        $this->taxGroupNameEdit = $this->faker->lexify('Group name edit ?????');
    }

    /**
     * @param TaxGroupsStep $I
     * @param AbstractStep $step
     * @throws Exception
     */
    public function createEditDeleteTaxGroup (TaxGroupsStep $I, AbstractStep $step)
    {
        $step->login($this->userNameAdmin, $this->passWordAdmin);
        $I->createTaxGroup($this->taxGroupName,AbstractPage::$btnSave_Close);
        $step->checkin(TaxGroupsPage::$ulrTaxGroupsPage,AbstractPage::$filterSearch,$this->taxGroupName,AbstractPage::$checkinSuccessMessage);
        $step->nonChecked(TaxGroupsPage::$ulrTaxGroupsPage,AbstractPage::$filterSearch,$this->taxGroupName,AbstractPage::$btncheckin);
        $step->unPublish(TaxGroupsPage::$ulrTaxGroupsPage,AbstractPage::$filterSearch,$this->taxGroupName);
        $step->publish(TaxGroupsPage::$ulrTaxGroupsPage,AbstractPage::$filterSearch,$this->taxGroupName);
        $I->editTaxGroup($this->taxGroupName,$this->taxGroupNameEdit, AbstractPage::$btnSave_Close);
        $step->delete(TaxGroupsPage::$ulrTaxGroupsPage,AbstractPage::$filterSearch,$this->taxGroupNameEdit,AbstractPage::$messSuccessfully);
    }
}