<?php
/**
 * Extension configuration for btc (Bitcoin Hub)
 *
 * @author Simon Köhler (KOHLERCODE LLC)
 */

$EM_CONF['btc'] = [
    'title' => 'Bitcoin Hub',
    'description' => 'Frontend plugins showing realtime cryptocurrency information via the CoinGecko API.',
    'category' => 'plugin',
    'author' => 'Simon Köhler',
    'author_email' => '',
    'state' => 'alpha',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '14.0.0-14.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
