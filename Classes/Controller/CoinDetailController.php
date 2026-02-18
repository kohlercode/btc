<?php

declare(strict_types=1);

namespace KOHLERCODE\Btc\Controller;

use KOHLERCODE\Btc\Service\CoinGeckoService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;

/**
 * Renders a single coin detail view (price, stats, description).
 *
 * @author Simon Köhler (KOHLERCODE LLC)
 */
class CoinDetailController extends ActionController
{
    public function __construct(
        private readonly CoinGeckoService $coinGeckoService,
        private readonly ExtensionConfiguration $extensionConfiguration,
    ) {
    }

    public function showAction(): ResponseInterface
    {
        $coinId = trim((string)($this->settings['coinId'] ?? 'bitcoin'));
        if ($coinId === '') {
            $coinId = 'bitcoin';
        }

        $coin = $this->coinGeckoService->getCoinById($coinId);
        $this->view->assign('coin', $coin);
        $this->view->assign('coinId', $coinId);
        $this->view->assign('extconf', $this->extensionConfiguration->get('btc'));
        return $this->htmlResponse();
    }
}
