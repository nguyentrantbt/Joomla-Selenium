<?php

namespace Page;

/**
 * Class AbstractPage
 * @package Page
 */
class AbstractPage
{
    /**
     * @var string
     */
    public static $urlRedShop = "/administrator/index.php?option=com_redshop";

    /**
     * @var string
     */
    public static $btnNew = ".button-new";

    /**
     * @var string
     */
    public static $btnEdit = ".button-edit";

    /**
     * @var string
     */
    public static $btnSave_Close = ".button-save";

    /**
     * @var string
     */
    public static $btnSave = ".button-apply";

    /**
     * @var string
     */
    public static $btnSave_New = ".button-save-new";

    /**
     * @var string
     */
    public static $btnCancel = ".button-cancel";

    /**
     * @var string
     */
    public static $btnPublish = ".button-publish";

    /**
     * @var string
     */
    public static $btnUnPublish = ".button-unpublish";

    /**
     * @var string
     */
    public static $btnCopy = ".button-copy";

    /**
     * @var string
     */
    public static $btnDelete = "//div[4]//button[1]";

    /**
     * @var string
     */
    public static $btnDelete1 = ".button-delete";

    /**
     * @var string
     */
    public static $userNameField = "#mod-login-username";

    /**
     * @var string
     */
    public static $passwordField = "#mod-login-password";

    /**
     * @var string
     */
    public static $btnLogin = ".login-button";

    /**
     * @var string
     */
    public static $welcomeRedShopTxt = "Welcome Super User";

    /**
     * @var string
     */
    public static $list = "//div[@id='j-main-container']";

    /**
     * @var string
     */
    public static $btnReset = ".reset";

    /**
     * @var string
     */
    public static $selectFirstChecbox = "#cb0";

    /**
     * @var string
     */
    public static $messSuccessfully = "successfully";

    /**
     * @var string
     */
    public static $copySuccessMessage = "Copied";

    /**
     * @var string
     */
    public static $btncheckin = ".button-checkin";

    /**
     * @var string
     */
    public static $iconEdit = ".fa-edit";

    /**
     * @var string
     */
    public static $filterSearch = "#filter_search";

    /**
     * @var string
     */
    public static $checkinSuccessMessage = "1 items successfully checked in.";

    /**
     * @var string
     */
    public static $selectAllChecbox = "//input[@name='checkall-toggle']";

    /**
     * @var string
     */
    public static $searchFailMessage = "No Matching Results";
}