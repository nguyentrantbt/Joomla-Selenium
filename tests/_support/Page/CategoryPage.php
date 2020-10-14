<?php

namespace Page;

/**
 * Class CategoryPage
 * @package Page
 */
class CategoryPage
{
    /**
     * @var string
     */
    public static $ulrCategory = "/administrator/index.php?option=com_redshop&view=categories";

    /**
     * @var string
     */
    public static $categoryTab = ".fa-sitemap";

    /**
     * @var string
     */
    public static $tittleCategory = "#jform_name";

    /**
     * @var string
     */
    public static $categoryTxt = "Category [ New ]";

    /**
     * @var string
     */
    public static $parentDropdownList = "#s2id_jform_parent_id";

    /**
     * @var string
     */
    public static $templatesParent = "//div[contains(@id,'select2-result-label')][contains(text(),'Templates')]";

    /**
     * @var string
     */
    public static $templateDropdownList = "#s2id_jform_template";

    /**
     * @var string
     */
    public static $listTemplate = "//div[contains(@id,'select2-result-label')][contains(text(),'list')]";

    /**
     * @var string
     */
    public static $comparisonDropdownList = "#s2id_jform_compare_template_id";

    /**
     * @var string
     */
    public static $compareComparison = "//div[contains(@id,'select2-result-label')][contains(text(),'compare')]";

    /**
     * @var string
     */
    public static $textAreaShortDescrip = "#jform_short_description";

    /**
     * @var string
     */
    public static $textAreaDescrip = "#jform_description";

    /**
     * @var string
     */
    public static $editorShortDescrip = "(//a[@title=\"Toggle editor\"])[1]";

    /**
     * @var string
     */
    public static $editorDescrip = "(//a[@title=\"Toggle editor\"])[2]";

    /**
     * @var string
     */
    public static $image = "im1.jpeg";

    /**
     * @var string
     */
    public static $categoryImage = "(//input[@type=\"file\"])[1]";

    /**
     * @var string
     */
    public static $iconEdit = ".fa-edit";

    /**
     * @var string
     */
    public static $message = "Item saved.";

    /**
     * @var string
     */
    public static $titleEdit = "Category [ Edit ]";

    /**
     * @var string
     */
    public static $titleNew = "Category [ New ]";

    /**
     * @var string
     */
    public static $title = "Category Management";

    /**
     * @var string
     */
    public static $copySuccessMessage = "Category Copied";

    /**
     * @var string
     */
    public static $editFailMessage = "Invalid field:  Category ";

    /**
     * @var string
     */
    public static $checkinSuccessMessage = "1 items successfully checked in.";

    /**
     * @var string
     */
    public static $messUnPublish = "1 item successfully unpublished";

    /**
     * @var string
     */
    public static $messPublish = "1 item successfully published";

    /**
     * @var string
     */
    public static $deleteSuccessMessage = "items successfully deleted";
}