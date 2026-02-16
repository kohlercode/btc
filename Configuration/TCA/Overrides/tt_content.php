<?php

declare(strict_types=1);

/**
 * TCA override: register Bitcoin Hub content elements.
 *
 * @author Simon Köhler (KOHLERCODE LLC)
 */

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || exit;

ExtensionManagementUtility::addPlugin(
    [
        'LLL:EXT:btc/Resources/Private/Language/locallang_db.xlf:plugin.priceticker.title',
        'btc_priceticker',
        'btc-plugin-priceticker',
    ],
    'list_type',
    'btc'
);

ExtensionManagementUtility::addPlugin(
    [
        'LLL:EXT:btc/Resources/Private/Language/locallang_db.xlf:plugin.coindetail.title',
        'btc_coindetail',
        'btc-plugin-coindetail',
    ],
    'list_type',
    'btc'
);

ExtensionManagementUtility::addPlugin(
    [
        'LLL:EXT:btc/Resources/Private/Language/locallang_db.xlf:plugin.marketoverview.title',
        'btc_marketoverview',
        'btc-plugin-marketoverview',
    ],
    'list_type',
    'btc'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['btc_priceticker'] = 'recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['btc_coindetail'] = 'recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['btc_marketoverview'] = 'recursive,select_key,pages';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['btc_priceticker'] = 'pi_flexform';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['btc_coindetail'] = 'pi_flexform';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['btc_marketoverview'] = 'pi_flexform';

ExtensionManagementUtility::addPiFlexFormValue(
    'btc_priceticker',
    'FILE:EXT:btc/Configuration/FlexForms/PriceTicker.xml'
);
ExtensionManagementUtility::addPiFlexFormValue(
    'btc_coindetail',
    'FILE:EXT:btc/Configuration/FlexForms/CoinDetail.xml'
);
ExtensionManagementUtility::addPiFlexFormValue(
    'btc_marketoverview',
    'FILE:EXT:btc/Configuration/FlexForms/MarketOverview.xml'
);
