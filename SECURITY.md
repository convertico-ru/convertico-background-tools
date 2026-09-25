# Security Policy

Please report security issues privately rather than opening a public issue.

For the remote-open design, treat server-side URL fetching as a high-risk surface. Any implementation must block private, loopback, link-local and cloud-metadata address ranges, re-check redirects, enforce strict file-size/time limits and verify decoded image content.

Until a private security contact is published, repository maintainers should enable GitHub Private Vulnerability Reporting in **Settings → Security → Code security and analysis**.
