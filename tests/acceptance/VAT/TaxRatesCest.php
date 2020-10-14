<?php

use Step\AbstractStep;
use Page\AbstractPage;
use Page\TaxRatesPage;
use Step\TaxRatesStep;
use Page\TaxGroupsPage;
use Step\TaxGroupsStep;

/**
 * Class TaxRatesCest
 */
class TaxRatesCest
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
    protected $taxRateName;

    /**
     * @var string
     */
    protected $taxRateNameEdit;

    /**
     * @var
     */
    protected $btnName;

    /**
     * @var string
     */
    protected $taxGroupName;

    /**
     * TaxRatesCest constructor.
     */
    public function __construct()
    {
        $this->faker = Faker\Factory::create();
        $this->userNameAdmin = "admin";
        $this->passWordAdmin = "admin";
        $this->taxRateName = $this->faker->lexify('Rates name ?????');
        $this->taxGroupName = $this->faker->lexify('Group name ?????');
        $this->taxRateNameEdit = $this->faker->lexify('Rates name edit ?????');
    }

    /**
     * @param TaxRatesStep $I
     * @param AbstractStep $step
     * @param TaxGroupsStep $group
     * @throws Exception
     */
    public function createTaxRates (TaxRatesStep $I, AbstractStep $step, TaxGroupsStep $group)
    {
        $step->login($this->userNameAdmin, $this->passWordAdmin);
        $group->createTaxGroup($this->taxGroupName,AbstractPage::$btnSave_Close);
        $I->createTaxRates($this->taxRateName,$this->taxGroupName,AbstractPage::$btnSave_Close);
        $I->editTaxRates($this->taxRateName,$this->taxRateNameEdit, AbstractPage::$btnSave_Close);
        $step->checkin(TaxRatesPage::$ulrTaxRatesPage,AbstractPage::$filterSearch,$this->taxRateNameEdit,AbstractPage::$checkinSuccessMessage);
        $step->nonChecked(TaxRatesPage::$ulrTaxRatesPage,AbstractPage::$filterSearch,$this->taxRateNameEdit,AbstractPage::$btncheckin);
        $step->delete(TaxRatesPage::$ulrTaxRatesPage,AbstractPage::$filterSearch,$this->taxRateNameEdit,AbstractPage::$messSuccessfully);
    }
}