# Known Issues

## Intergration techniques that will not be supported.

### Arbitrary query parameters

Using any query parameter beside `tab` and `section` causes problems when constructing the JSON object used to render screens. Shipping settings does this for example.

### Creating Settings tabs without extending WC_Settings_Page

Settings > Products > Approved download directories creates a page without extending `WC_Settings_Page`. Instead it uses the `woocommerce_settings_products` hook to populate the page directly.

## Integration techniques that can be migrated but have issues

### Using `DOMContentLoaded` in Javascript files to ensure DOM is ready

Using `DOMContentLoaded` in Javascript files to ensure DOM is ready doesn't always work. We could manually fire the event each time a page or tab is clicked, but that may cause unknown errors. Use of `jQuery.ready()` works well and `DOMContentLoaded` does not appear to be used, at least in a quick search of the Marketplace extension.
