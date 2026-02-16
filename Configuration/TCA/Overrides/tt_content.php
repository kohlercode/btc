<?php

declare(strict_types=1);

/**
 * TCA override: register Bitcoin Hub content elements.
 *
 * @author Simon Köhler (KOHLERCODE LLC)
 */

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || exit;

// Define your unique category key
$customGroup = 'bitcoin_hub';


ExtensionUtility::registerPlugin(
    // extension name, matching the PHP namespaces (but without the vendor)
    'Btc',
    // arbitrary, but unique plugin name (not visible in the backend)
    'PriceTicker',
    // plugin title, as visible in the drop-down in the backend, use "LLL:" for localization
    'Price Ticker Plugin',
    // plugin icon, use an icon identifier from the icon registry
    'btc-plugin-priceticker',
    // plugin group, to define where the new plugin will be located in
    $customGroup,
    // plugin description, as visible in the new content element wizard
    'Shows all information about Prices',
);

ExtensionUtility::registerPlugin(
    // extension name, matching the PHP namespaces (but without the vendor)
    'Btc',
    // arbitrary, but unique plugin name (not visible in the backend)
    'CoinDetail',
    // plugin title, as visible in the drop-down in the backend, use "LLL:" for localization
    'Coin Detail Plugin',
    // plugin icon, use an icon identifier from the icon registry
    'btc-plugin-coindetail',
    // plugin group, to define where the new plugin will be located in
    $customGroup,
    // plugin description, as visible in the new content element wizard
    'Shows all information about Coins',
);

ExtensionUtility::registerPlugin(
    // extension name, matching the PHP namespaces (but without the vendor)
    'Btc',
    // arbitrary, but unique plugin name (not visible in the backend)
    'MarketOverview',
    // plugin title, as visible in the drop-down in the backend, use "LLL:" for localization
    'Market Overview Plugin',
    // plugin icon, use an icon identifier from the icon registry
    'btc-plugin-marketoverview',
    // plugin group, to define where the new plugin will be located in
    $customGroup,
    // plugin description, as visible in the new content element wizard
    'Shows all information about Markets',
);


ExtensionManagementUtility::addPiFlexFormValue(
    '*', // Apply to all plugins if needed, or use specific signature
    'FILE:EXT:btc/Configuration/FlexForms/CoinDetail.xml',
    'btc_coindetail'
);

ExtensionManagementUtility::addPiFlexFormValue(
    '*', // Apply to all plugins if needed, or use specific signature
    'FILE:EXT:btc/Configuration/FlexForms/MarketOverview.xml',
    'btc_marketoverview'
);

ExtensionManagementUtility::addPiFlexFormValue(
    '*', // Apply to all plugins if needed, or use specific signature
    'FILE:EXT:btc/Configuration/FlexForms/PriceTicker.xml',
    'btc_priceticker'
);

$GLOBALS['TCA']['tt_content']['types']['btc_priceticker']['showitem'] .= ',--div--;Plugin Settings,pi_flexform';
$GLOBALS['TCA']['tt_content']['types']['btc_coindetail']['showitem'] .= ',--div--;Plugin Settings,pi_flexform';
$GLOBALS['TCA']['tt_content']['types']['btc_marketoverview']['showitem'] .= ',--div--;Plugin Settings,pi_flexform';
// Define the global group for your Bitcoin Hub
$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['itemGroups']['bitcoin_hub'] = 'Bitcoin Hub';