<?php


namespace Page;

/**
 * Class ProductPage
 * @package Page
 */
class ProductPage
{
    /**
     * @var string
     */
    public static $urlProductManagement = "/administrator/index.php?option=com_redshop&view=product";

    /**
     * @var string
     */
    public static $productManagementText = "Product Management";

    /**
     * @var string
     */
    public static $btnAssignNewCategory = ".button-save";

    /**
     * @var string
     */
    public static $btnRemoveCategory = "//div[8]//button[1]";

    /**
     * @var string
     */
    public static $newProductText = "Product: [ New ]";

    /**
     * @var string
     */
    public static $productContent = ".content";

    /**
     * @var string
     */
    public static $productName = "#product_name";

    /**
     * @var string
     */
    public static $productNumber = "#product_number";

    /**
     * @var string
     */
    public static $productCategory2rdOption = "(//div[@class='select2-result-label'])[2]";

    /**
     * @var string
     */
    public static $productCategory = "//div[@id='s2id_product_category']//ul[@class='select2-choices']";

    /**
     * @var string
     */
    public static $categoryOption = "//div[@class='select2-result-label' and contains(text(),'";

    /**
     * @var string
     */
    public static $productPrice = "#product_price";

    /**
     * @var string
     */
    public static $VAT_Tax = "//div[@id='s2id_product_tax_group_id']";

    /**
     * @var string
     */
    public static $VAT_TaxTxtbox = "(//input[@type='text'])[46]";

    /**
     * @var string
     */
    public static $VAT_TaxOption = "(//div[@class='select2-result-label'])[1]";

    /**
     * @var string
     */
    public static $productImage = "(//input[@type='file'])[6]";

    /**
     * @var string
     */
    public static $fileName = "im1.jpeg";

    /**
     * @var string
     */
    public static $searchField = "#keyword";

    /**
     * @var string
     */
    public static $verifyTextSave_Close = "Product Management";

    /**
     * @var string
     */
    public static $verifyTextSave = "Product details saved";

    /**
     * @var string
     */
    public static $verifyTextSave_New = "Product: [ New ]";

    /**
     * @var string
     */
    public static $selectCategoryField = ".select2-choices";

    /**
     * @var string
     */
    public static $messAddCategory = "Category Assigned to Products Successfully";

    /**
     * @var string
     */
    public static $btnConfirmRemoveCategory = ".button-delete";

    /**
     * @var string
     */
    public static $messRemoveCategory = "Category Removed From Product Successfully";

    /**
     * @var string
     */
    public static $accessoryTab = "(//a[@role='tab'])[5]";

    /**
     * @var string
     */
    public static $accessoriesTxt = "Accessories";

    /**
     * @var string
     */
    public static $accessoryDropdownList = "#s2id_product_accessory_search";

    /**
     * @var string
     */
    public static $accessoryField = "#s2id_autogen3_search";

    /**
     * @var string
     */
    public static $productModel1 = "abc";

    /**
     * @var string
     */
    public static $productModel2 = "abc (123)";

    /**
     * @var string
     */
    public static $firstProductModel = "(//div[contains(@id,'select2-result-label')])[1]";

    /**
     * @var string
     */
    public static $messSaved = "saved";
}