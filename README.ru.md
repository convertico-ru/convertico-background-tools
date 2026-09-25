# Convertico.ru Background Tools

Open-source интеграции для [удаления фона в Convertico.ru](https://convertico.ru/remove-background/).

Репозиторий содержит небольшие инструменты, которые упрощают переход от изображения в браузере или WordPress к обработке в Convertico.ru.

## Состав

- `chrome-extension/` — контекстное меню для изображений в Chrome/Chromium.
- `wordpress-plugin/` — действие для изображений в WordPress Media Library.
- `docs/REMOTE-OPEN-SPEC.md` — спецификация будущей безопасной передачи удалённого изображения в Convertico.ru.

Версия `v0.1.x` — рабочая стартовая версия без серверного API. One-click передача файла появится после реализации remote-open endpoint.
