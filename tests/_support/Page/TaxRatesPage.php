<?php

namespace Page;

/**
 * Class TaxRatesPage
 * @package Page
 */
class TaxRatesPage
{
    /**
     * @var string
     */
    public static $ulrTaxRatesPage = "/administrator/index.php?option=com_redshop&view=tax_rates";

    /**
     * @var string
     */
    public static $txtTaxRatesTitle = "VAT Rates";

    /**
     * @var string
     */
    public static $txtTaxRatesTitleEdit = "Tax Rate [ Edit ]";

    /**
     * @var string
     */
    public static $txtTaxGroupTitle = "VAT / Tax Group Management";

    /**
     * @var string
     */
    public static $taxRateName = "//input[@id='jform_name']";

    /**
     * @var string
     */
    public static $txtEditTaxRatesTitle = 'VAT/Tax Group [ Edit ]';

    /**
     * @var string
     */
    public static $taxGroup = "//div[@id='s2id_jform_tax_group_id']//a[@class='select2-choice']";

    /**
     * @var string
     */
    public static $taxGroupOption = "(//div[@class='select2-result-label'])[1]";

    /**
     * @var string
     */
    public static $shopperGroup= "//ul[@class='select2-choices']";

    /**
     * @var string
     */
    public static $shopperGroupOption= "//div[@id='select2-drop']//li[2]";

    /**
     * @var string
     */
    public static $searchTaxGroupTxtbox = "(//input[@type='text'])[8]";
}