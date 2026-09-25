# Secure remote-open specification

## Goal

Allow an integration to send a public image URL to Convertico.ru and open the appropriate tool with that image ready for the user.

Example client request:

```text
GET /open?tool=remove-background&url=https%3A%2F%2Fexample.com%2Fphoto.jpg
```

The `/open` route should be a short-lived handoff endpoint, **not an indexable landing page**.

## Recommended flow

1. Validate `tool` against a strict allow-list.
2. Parse the supplied URL and accept only `http` or `https`.
3. Resolve the hostname server-side.
4. Reject loopback, private, link-local, multicast, reserved and cloud-metadata destinations.
5. Fetch with a strict timeout, maximum body size and redirect limit.
6. Re-run destination validation after every redirect.
7. Verify that the final payload is actually a supported image by decoding it; do not trust only the extension or `Content-Type` header.
8. Store the image in short-lived temporary storage.
9. Create an opaque one-time token associated with the temporary image.
10. Store the token in a short-lived same-site session/cookie or other server-side session mechanism.
11. Return an HTTP redirect to the clean canonical tool URL:

```text
302 Location: https://convertico.ru/remove-background/
```

12. The tool reads the temporary session and loads the image.
13. Delete the temporary image automatically after a short TTL or immediately after successful import.

## Why redirect to a clean URL?

The public product page should remain:

```text
https://convertico.ru/remove-background/
```

Do not create a crawlable family of URLs containing arbitrary remote image URLs. That can create duplicate/index-noise problems and leak source URLs into analytics, logs or search indexes.

## SSRF requirements

A server-side URL importer must explicitly defend against SSRF. At minimum reject destinations resolving to:

- `127.0.0.0/8`
- `10.0.0.0/8`
- `172.16.0.0/12`
- `192.168.0.0/16`
- `169.254.0.0/16`
- IPv6 loopback/link-local/private ranges
- cloud metadata endpoints
- non-HTTP(S) schemes

Also guard against DNS rebinding and redirect-to-private-host behavior.

## Suggested limits

Start conservatively:

- maximum source image size: 20 MB
- connect timeout: 3 seconds
- total fetch timeout: 10 seconds
- redirects: maximum 3
- image formats: JPEG, PNG, WebP initially
- temporary file TTL: 10 minutes

Adjust only after observing real traffic and resource usage.

## Abuse controls

Consider per-IP rate limiting and a global concurrency limit. Do not allow the endpoint to become a generic proxy or arbitrary URL fetcher.

## Client upgrade path

After this endpoint is production-ready, integrations can replace the v0.1 fallback with a direct call to:

```text
https://convertico.ru/open?tool=remove-background&url=<encoded-public-image-url>
```
