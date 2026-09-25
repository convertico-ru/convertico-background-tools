# Convertico.ru Background Tools

Open-source shortcuts and integrations for working with images in the [Convertico.ru Background Remover](https://convertico.ru/remove-background/).

Convertico.ru is a browser-based image toolkit. This repository focuses on small integrations that make the background-removal workflow easier from browsers and content-management systems.

## What is included

### Chrome / Chromium shortcut extension

Adds an image context-menu action. In the current fallback mode it downloads the selected image and opens the Convertico.ru Background Remover in a new tab, so the file is ready to upload locally.

Location: [`chrome-extension/`](chrome-extension/)

### WordPress integration starter

Adds a **Remove background with Convertico.ru** action to WordPress Media Library attachments.

Location: [`wordpress-plugin/`](wordpress-plugin/)

### Remote-open integration specification

A proposed server-side integration that will allow supported clients to hand a public image URL to Convertico.ru and open the Background Remover with a temporary image session.

The design intentionally avoids putting permanent image URLs into indexable tool URLs and includes SSRF protections.

See: [`docs/REMOTE-OPEN-SPEC.md`](docs/REMOTE-OPEN-SPEC.md)

## Project status

`v0.1.x` is an integration preview. The Chrome fallback workflow works without a Convertico API. The WordPress integration currently acts as a shortcut. One-click image handoff is planned after the remote-open endpoint is implemented on Convertico.ru.

## Background Remover

Use the online tool:

https://convertico.ru/remove-background/

Typical use cases include product photos, profile images, marketplace listings, presentations, transparent PNG assets and quick visual editing.

## Principles

- Small integrations with a clear user benefit.
- No hidden tracking or background data collection.
- No upload of user files without an explicit user action.
- Open-source code that can be reviewed before use.
- Keep canonical product pages on Convertico.ru; integrations should not create indexable duplicates.

## Roadmap

- [x] Public repository scaffold
- [x] Chrome context-menu fallback
- [x] WordPress Media Library shortcut
- [ ] Secure remote-open endpoint
- [ ] One-click Chrome handoff
- [ ] One-click WordPress handoff
- [ ] Optional return-to-WordPress workflow
- [ ] Browser extension store release

## Contributing

Bug reports and small focused pull requests are welcome. See [CONTRIBUTING.md](CONTRIBUTING.md).

## Security

If you find a security issue, please do not open a public issue. See [SECURITY.md](SECURITY.md).

## License

MIT License. See [LICENSE](LICENSE).
