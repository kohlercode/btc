<?php

declare(strict_types=1);

/**
 * Icon registration for btc (Bitcoin Hub).
 *
 * @author Simon Köhler (KOHLERCODE LLC)
 */

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

return [
    'btc-plugin-priceticker' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:btc/Resources/Public/Icons/plugin_priceticker.svg',
    ],
    'btc-plugin-coindetail' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:btc/Resources/Public/Icons/plugin_coindetail.svg',
    ],
    'btc-plugin-marketoverview' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:btc/Resources/Public/Icons/plugin_marketoverview.svg',
    ],
];
