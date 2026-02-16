# Changelog

All notable changes to the **Bitcoin Hub (btc)** extension are documented here.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/).

---

## [1.0.0] - 2025-02-16

### Added

- **Extension setup**
  - TYPO3 v14 extension key `btc` (Bitcoin Hub) with `ext_emconf.php` and Composer package `kohlercode/btc`.
  - Extension icon at `Resources/Public/Icons/Extension.svg`.

- **Plugins (content elements)**
  - **Price Ticker** (`btc_priceticker`): List of coin prices (top N or custom CoinGecko IDs via FlexForm).
  - **Coin Detail** (`btc_coindetail`): Single-coin view with price, market data, and description (coin ID via FlexForm).
  - **Market Overview** (`btc_marketoverview`): Table of top coins by market cap (limit via FlexForm).

- **Backend**
  - TCA registration in `Configuration/TCA/Overrides/tt_content.php` for all three plugins.
  - Icon registration in `Configuration/Icons.php` for each plugin.
  - FlexForms: `PriceTicker.xml`, `CoinDetail.xml`, `MarketOverview.xml` for plugin settings.
  - Extbase plugin registration in `ext_localconf.php`.

- **API and domain**
  - `CoinGeckoService`: Central service for CoinGecko API (markets, coin by ID, markets by IDs).
  - `CoinMarket` DTO in `Classes/Domain/Model/Dto/CoinMarket.php` for list/overview data.
  - Dependency injection via `Configuration/Services.yaml`.

- **Frontend**
  - Fluid templates: `PriceTicker/list.html`, `CoinDetail/show.html`, `MarketOverview/list.html`.
  - Default layout `Resources/Private/Layouts/default.html`.
  - All user-facing labels and table headers use `<f:translate>` / LLL (no hardcoded strings).

- **Localization**
  - English (default): `locallang_db.xlf`, `locallang_flexform.xlf`, `locallang.xlf`.
  - German: `de.locallang_db.xlf`, `de.locallang_flexform.xlf`, `de.locallang.xlf`.
  - Spanish: `es.locallang_db.xlf`, `es.locallang_flexform.xlf`, `es.locallang.xlf`.
  - XLIFF indentation: 2 spaces (TYPO3 v14 standard).

- **Project**
  - `.gitignore` for Composer, IDE, TYPO3 temp, and env files.
  - `README.md` with installation and plugin structure.

### Changed

- Fluid 5 naming: layout reference set to lowercase `default` (matching `default.html`).

---

[1.0.0]: https://github.com/kohlercode/btc/releases/tag/v1.0.0
