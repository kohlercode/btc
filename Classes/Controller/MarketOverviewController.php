<?php

declare(strict_types=1);

namespace KOHLERCODE\Btc\Controller;

use KOHLERCODE\Btc\Service\CoinGeckoService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Renders a market overview (top coins by market cap).
 *
 * @author Simon Köhler (KOHLERCODE LLC)
 */
class MarketOverviewController extends ActionController
{
    public function __construct(
        private readonly CoinGeckoService $coinGeckoService,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $limit = (int)($this->settings['limit'] ?? 20);
        $limit = min(max(1, $limit), 100);

        $coins = $this->coinGeckoService->getMarkets($limit, 1);
        $this->view->assign('coins', $coins);
        return $this->htmlResponse();
    }
}
