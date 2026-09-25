const TOOL_URL = 'https://convertico.ru/remove-background/';
const MENU_ID = 'convertico-remove-background';

chrome.runtime.onInstalled.addListener(() => {
  chrome.contextMenus.create({
    id: MENU_ID,
    title: 'Download image & open Convertico.ru',
    contexts: ['image']
  });
});

chrome.contextMenus.onClicked.addListener(async (info) => {
  if (info.menuItemId !== MENU_ID || !info.srcUrl) return;

  try {
    await chrome.downloads.download({
      url: info.srcUrl,
      saveAs: false,
      conflictAction: 'uniquify'
    });
  } catch (error) {
    console.warn('Convertico helper: image download failed', error);
  }

  await chrome.tabs.create({ url: TOOL_URL });
});
