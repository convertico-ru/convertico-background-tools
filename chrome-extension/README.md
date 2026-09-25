# Chrome extension

## Current v0.1 workflow

1. Right-click an image.
2. Choose **Download image & open Convertico.ru**.
3. The browser downloads the image using the normal Downloads API.
4. The extension opens https://convertico.ru/remove-background/.
5. Upload the downloaded image to the tool.

This fallback works without a Convertico API and does not send the selected image to Convertico automatically.

## Local installation

1. Open `chrome://extensions/`.
2. Enable **Developer mode**.
3. Click **Load unpacked**.
4. Select this `chrome-extension` directory.

## Planned v0.2 workflow

After the secure remote-open endpoint is available, the extension can open the selected public image directly in the tool without first downloading it locally.
