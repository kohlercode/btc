<?php

declare(strict_types=1);

/**
 * Bitcoin Hub – Plugin registration and bootstrap.
 *
 * @author Simon Köhler (KOHLERCODE LLC)
 */

defined('TYPO3') || exit;

(static function (): void {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Btc',
        'PriceTicker',
        [\KOHLERCODE\Btc\Controller\PriceTickerController::class => 'list'],
        [\KOHLERCODE\Btc\Controller\PriceTickerController::class => 'list'],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Btc',
        'CoinDetail',
        [\KOHLERCODE\Btc\Controller\CoinDetailController::class => 'show'],
        [\KOHLERCODE\Btc\Controller\CoinDetailController::class => 'show'],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Btc',
        'MarketOverview',
        [\KOHLERCODE\Btc\Controller\MarketOverviewController::class => 'list'],
        [\KOHLERCODE\Btc\Controller\MarketOverviewController::class => 'list'],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );
})();
