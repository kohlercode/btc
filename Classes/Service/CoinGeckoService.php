<?php

declare(strict_types=1);

namespace KOHLERCODE\Btc\Service;

use KOHLERCODE\Btc\Domain\Model\Dto\CoinMarket;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

/**
 * Client for CoinGecko API. All plugin data should be fetched through this service.
 *
 * @author Simon Köhler (KOHLERCODE LLC)
 */
class CoinGeckoService
{
    private const DEFAULT_BASE_URL = 'https://api.coingecko.com/api/v3';

    public function __construct(
        private readonly ClientInterface $httpClient,
        private readonly RequestFactoryInterface $requestFactory,
        string $baseUrl = '',
    ) {
        $this->baseUrl = $baseUrl !== '' ? rtrim($baseUrl, '/') : self::DEFAULT_BASE_URL;
    }

    private string $baseUrl;

    /**
     * Fetch top N coins by market cap (for MarketOverview / PriceTicker).
     *
     * @return list<CoinMarket>
     */
    public function getMarkets(int $perPage = 10, int $page = 1): array
    {
        $url = $this->baseUrl . '/coins/markets?vs_currency=usd&order=market_cap_desc'
            . '&per_page=' . $perPage . '&page=' . $page . '&sparkline=false';
        $data = $this->request($url);
        if (!is_array($data)) {
            return [];
        }
        $list = [];
        foreach ($data as $item) {
            if (is_array($item)) {
                $list[] = CoinMarket::fromApiArray($item);
            }
        }
        return $list;
    }

    /**
     * Fetch a single coin by CoinGecko id (e.g. bitcoin, ethereum).
     */
    public function getCoinById(string $coinId): ?array
    {
        $url = $this->baseUrl . '/coins/' . rawurlencode($coinId)
            . '?localization=false&tickers=false&community_data=false&developer_data=false';
        $data = $this->request($url);
        return is_array($data) ? $data : null;
    }

    /**
     * Fetch multiple coins by ids (for PriceTicker with custom selection).
     *
     * @param list<string> $ids CoinGecko ids, e.g. ['bitcoin', 'ethereum']
     * @return list<CoinMarket>
     */
    public function getMarketsByIds(array $ids): array
    {
        if ($ids === []) {
            return [];
        }
        $url = $this->baseUrl . '/coins/markets?vs_currency=usd&ids='
            . implode(',', array_map('rawurlencode', $ids)) . '&sparkline=false';
        $data = $this->request($url);
        if (!is_array($data)) {
            return [];
        }
        $list = [];
        foreach ($data as $item) {
            if (is_array($item)) {
                $list[] = CoinMarket::fromApiArray($item);
            }
        }
        return $list;
    }

    /**
     * @return array<string, mixed>|null
     */
    private function request(string $url): ?array
    {
        $request = $this->requestFactory->createRequest('GET', $url);
        $response = $this->httpClient->sendRequest($request);
        if ($response->getStatusCode() !== 200) {
            return null;
        }
        $body = (string)$response->getBody();
        $decoded = json_decode($body, true);
        return is_array($decoded) ? $decoded : null;
    }
}
