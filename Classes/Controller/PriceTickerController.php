<?php

declare(strict_types=1);

namespace KOHLERCODE\Btc\Controller;

use KOHLERCODE\Btc\Service\CoinGeckoService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;

/**
 * Renders a compact ticker list of coin prices (top N or selected ids).
 *
 * @author Simon Köhler (KOHLERCODE LLC)
 */
class PriceTickerController extends ActionController
{
    public function __construct(
        private readonly CoinGeckoService $coinGeckoService,
        private readonly ExtensionConfiguration $extensionConfiguration,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $limit = (int)($this->settings['limit'] ?? 10);
        $limit = min(max(1, $limit), 50);
        $coinIds = $this->settings['coinIds'] ?? '';

        if ($coinIds !== '') {
            $ids = array_map('trim', array_filter(explode(',', $coinIds)));
            $coins = $this->coinGeckoService->getMarketsByIds($ids);
        } else {
            $coins = $this->coinGeckoService->getMarkets($limit, 1);
        }

        $this->view->assign('coins', $coins);
        $this->view->assign('extconf', $this->extensionConfiguration->get('btc'));
        return $this->htmlResponse();
    }
}
