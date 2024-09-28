# Settings Tester

A companion plugin to test Reactification of WooCommerce Settings. This plugin includes all known possible integration methods for adding UI|UX elements to WooCommerce settings. The integration methods are intentionally stripped down for testing purposes.

Integration for Modern screens is also included.

See [Settings implementation](https://github.com/woocommerce/woocommerce/pull/48340) in Core WooCommerce.

## Integration Methods

Below are checklists for each way an extension can add functionality to WooCommerce settings. If the checkbox is checked, that means the integration method has been implemented to a satisfactory degree.

### Components

-   [x] title
-   [ ] info
-   [ ] sectionend
-   [x] text
-   [ ] password
-   [ ] datetime
-   [ ] datetime-local
-   [ ] date
-   [ ] month
-   [ ] time
-   [ ] week
-   [ ] number
-   [ ] email
-   [ ] url
-   [ ] tel
-   [ ] color
-   [ ] textarea
-   [ ] select
-   [ ] multiselect
-   [x] radio
-   [x] checkbox
-   [ ] image_width
-   [ ] single_select_page
-   [ ] single_select_page_with_search
-   [ ] single_select_country
-   [ ] multi_select_countries
-   [ ] relative_date_selector

### Custom Views

-   [x] Use of `woocommerce_admin_field_` hook to output arbitrary HTML.
-   [x] Extending `WC_Settings_Page` with custom `output` method to render arbitrary HTML.

### Javascript

-   [x] Plain Javascript to interact with the DOM.
-   [x] jQuery to interact with the DOM.
-   [x] Use of `document.addEventListener( 'DOMContentLoaded', () => { ... } )` to bind JS to the DOM.
-   [x] Use of `jQuery.ready()` to bind JS to the DOM.

### SlotFill

-   [x] Use of SlotFill for rendering React components making use of Gutenberg context.

### Conditional Rendering

-   [x] Use of arbitrary query parameters to conditionally render a view.

### Save hooks

More research is required to determine how hooks are being used when settings are saved.

### Modern Screens

-   [ ] Add a modern React screen via configuration and client side filtering.

## Getting Started

### Prerequisites

-   [NPM](https://www.npmjs.com/)
-   [Composer](https://getcomposer.org/download/)
-   [wp-env](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/)

### Installation and Build

```
npm install
npm run build
wp-env start
```
