# Bitcoin Hub (btc)

Show **live cryptocurrency prices and market data** on your TYPO3 website. Bitcoin Hub adds three content elements you can drop onto any page: a price ticker, a single-coin detail view, and a sortable market overview table. Data is loaded from the [CoinGecko API](https://www.coingecko.com/en/api)—no API key required.

**Author:** Simon Köhler (KOHLERCODE LLC)

---

## Live Examples

- https://globaltactic.com/crypto/market-overview
- https://globaltactic.com/crypto/prices
- https://globaltactic.com/crypto/prices/bitcoin

## Requirements

- TYPO3 14.x  
- PHP 8.3+

---

## Installation

- **Composer:** `composer require kohlercode/btc`  
- **Or:** Install and activate the extension in the TYPO3 Extension Manager.

---

## Plug and play

- **No setup required** — Install, add a content element, and it works.
- **No TypoScript** — You don’t need to include any setup or configuration in your site.
- **No “set” inclusion** — The extension registers its content elements automatically.
- **Default styling included** — Each plugin comes with its own CSS so it looks good in any template. Styles are responsive and work on desktop and mobile.
- **Customize if you like** — You can override the Fluid template files and the CSS to match your design. Copy the templates from `Resources/Private/Templates/` into your site package or another extension and adjust markup and styling as needed.

---

## Content elements

After installation you’ll find these under **Content elements** when editing a page:

| Content element      | What it does |
|----------------------|--------------|
| **Bitcoin Hub: Price Ticker**   | A compact list of coin prices (e.g. top 10 or your chosen coins). |
| **Bitcoin Hub: Coin Detail**    | One coin in detail: current price, market cap, volume, 24h change, and description. |
| **Bitcoin Hub: Market Overview**| A table of the top coins by market cap. Column headers are clickable to sort. |

Each element has its own settings (e.g. number of coins, which coin to show). Configure them in the content element’s **Plugin settings** tab in the TYPO3 backend.

---

## Configuration

- **Plugin settings:** When you add a content element, use the **Plugin settings** tab (FlexForm) to set limits, coin IDs, etc.
- **CoinGecko:** The extension uses the public CoinGecko API by default. No API key is needed; their [rate limits](https://www.coingecko.com/en/api/pricing) apply.

---

## Customizing templates and CSS

- **Templates:** To change the markup, copy the Fluid templates from `EXT:btc/Resources/Private/Templates/` into your site package (or another extension) and override them there.
- **Styles:** The extension ships with compiled CSS in `Resources/Public/Css/`. To change styles you can override those files or replace the CSS reference in your template. The source is SCSS in `Resources/Private/Scss/`; run `npm run build:css` after editing (see `package.json`).
