# Bitcoin Hub (btc)

TYPO3 extension that provides frontend content elements for **realtime cryptocurrency data** via the [CoinGecko API](https://www.coingecko.com/en/api).

**Author:** Simon Köhler (KOHLERCODE LLC)

## Requirements

- TYPO3 14.x
- PHP 8.3+

## Installation

Install via Composer: `composer require kohlercode/btc`  
Or load the extension from `ext_emconf.php` and activate in the TYPO3 Extension Manager.

## Plugin structure (scalable)

| Plugin           | List type            | Purpose |
|-----------------|----------------------|--------|
| **Price Ticker**| `btc_priceticker`    | Compact list of coin prices (top N or custom IDs). |
| **Coin Detail** | `btc_coindetail`     | Single-coin view: price, market data, description. |
| **Market Overview** | `btc_marketoverview` | Table of top coins by market cap. |

All plugins use a **shared service** `CoinGeckoService` (`Classes/Service/CoinGeckoService.php`) so that:

- API logic lives in one place.
- New plugins (e.g. “Favorites”, “Compare”) only need a new controller + template and can reuse the same service and DTOs.

## Configuration

- **FlexForms** per plugin: limit, coin IDs, etc. (see Backend when adding the content element).
- **CoinGecko** public API is used by default; no API key required (rate limits apply). Optional: override the API base URL via `Configuration/Services.yaml` for `CoinGeckoService`.

## Adding a new plugin

1. Add controller under `Classes/Controller/`.
2. Register in `ext_localconf.php` with `ExtensionUtility::configurePlugin()`.
3. Register in `Configuration/TCA/Overrides/tt_content.php` with `addPlugin()` and optional FlexForm.
4. Add icon in `Configuration/Icons.php` and `Resources/Public/Icons/`.
5. Add Fluid template under `Resources/Private/Templates/<ControllerName>/`.
