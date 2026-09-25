# Contributing

Thanks for your interest in Convertico.ru Background Tools.

## Scope

Please keep contributions focused on small image-workflow integrations around Convertico.ru. Before implementing a large feature, open an issue describing the user problem and proposed workflow.

## Pull requests

1. Keep changes small and reviewable.
2. Do not add analytics, advertising SDKs or hidden network requests.
3. Do not upload user images without an explicit user action.
4. Document any new permissions required by a browser extension or CMS plugin.
5. Update the relevant README when behavior changes.

## Development

The Chrome extension intentionally has no build step in v0.1.x. Load the `chrome-extension` directory as an unpacked extension in a Chromium-based browser.

The WordPress plugin is a single-file starter. Copy `wordpress-plugin/convertico-background-tools.php` into a plugin directory for local testing.
