<?php

declare(strict_types=1);

namespace KOHLERCODE\Btc\Domain\Model\Dto;

/**
 * DTO for a single coin market data from CoinGecko API.
 *
 * @author Simon Köhler (KOHLERCODE LLC)
 */
final readonly class CoinMarket
{
    public function __construct(
        public string $id,
        public string $symbol,
        public string $name,
        public string $image,
        public float $currentPrice,
        public float $marketCap,
        public float $totalVolume,
        public float $priceChange24h,
        public float $priceChangePercentage24h,
        public int $marketCapRank,
    ) {
    }

    public static function fromApiArray(array $data): self
    {
        return new self(
            id: (string)($data['id'] ?? ''),
            symbol: (string)($data['symbol'] ?? ''),
            name: (string)($data['name'] ?? ''),
            image: (string)($data['image'] ?? ''),
            currentPrice: (float)($data['current_price'] ?? 0.0),
            marketCap: (float)($data['market_cap'] ?? 0.0),
            totalVolume: (float)($data['total_volume'] ?? 0.0),
            priceChange24h: (float)($data['price_change_24h'] ?? 0.0),
            priceChangePercentage24h: (float)($data['price_change_percentage_24h'] ?? 0.0),
            marketCapRank: (int)($data['market_cap_rank'] ?? 0),
        );
    }
}
