# 🚀 PHP MVP - Личный сайт SEO специалиста

> **Готовый к запуску сайт для продажи SEO-аудитов за 1 неделю**

## 📋 Что включено

### ✅ Полнофункциональный сайт:
- **Главная страница** с Hero, Pricing, Cases, FAQ, Contact
- **Форма заявки** с валидацией и защитой от спама
- **Отправка писем** администратору и клиенту
- **Telegram уведомления** (опционально)
- **Страница благодарности** после отправки формы
- **SEO оптимизация** (мета-теги, JSON-LD, микроразметка)
- **Адаптивный дизайн** для всех устройств

### ✅ Безопасность:
- CSRF защита
- Honeypot против спама
- Rate limiting (10 заявок/час)
- Валидация всех полей
- Защита от XSS атак

### ✅ Производительность:
- Сжатие gzip
- Кэширование файлов
- Оптимизация изображений
- Lazy loading
- Минификация ресурсов

## 🚀 Быстрый старт

### 1. Загрузка на хостинг
```bash
# Загрузите все файлы на ваш PHP хостинг
# Убедитесь, что у вас есть доступ к файловой системе
```

### 2. Настройка config.php
```php
// Основные настройки
define('SITE_NAME', 'Ваше имя/название');
define('SITE_EMAIL', 'your-email@domain.com');
define('SITE_PHONE', '+7 (XXX) XXX-XX-XX');
define('SITE_URL', 'https://yourdomain.com');

// SMTP настройки (для отправки писем)
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_USERNAME', 'your-email@gmail.com');
define('SMTP_PASSWORD', 'your-app-password');

// Telegram уведомления (опционально)
define('TELEGRAM_BOT_TOKEN', 'your-bot-token');
define('TELEGRAM_CHAT_ID', 'your-chat-id');

// Безопасность - ОБЯЗАТЕЛЬНО ИЗМЕНИТЕ!
define('CSRF_SECRET', 'your-random-secret-key-change-this');
```

### 3. Добавьте изображения
Поместите в папку `assets/images/`:
- `hero-seo.jpg` - главное изображение (800x600px)
- `case-ecommerce.jpg` - кейс 1
- `case-b2b.jpg` - кейс 2  
- `case-startup.jpg` - кейс 3
- `og-image.jpg` - для соцсетей (1200x630px)

### 4. Настройте домен
В файле `.htaccess` замените `yourdomain.com` на ваш реальный домен.

## 📧 Настройка отправки писем

### Вариант 1: SMTP (рекомендуется)
```php
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'your-email@gmail.com');
define('SMTP_PASSWORD', 'your-app-password');
define('USE_SENDMAIL', false);
```

### Вариант 2: Sendmail
```php
define('USE_SENDMAIL', true);
```

## 📱 Настройка Telegram

1. Создайте бота через @BotFather
2. Получите токен бота
3. Узнайте ID чата (через @userinfobot)
4. Заполните в config.php

## 📊 Аналитика

### Google Analytics 4
```html
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'GA_MEASUREMENT_ID');
</script>
```

### Яндекс.Метрика
```html
<script type="text/javascript">
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/watch.js", "ym");
   ym(YOUR_COUNTER_ID, "init", {clickmap:true,trackLinks:true,accurateTrackBounce:true,webvisor:true});
</script>
```

## 🎨 Кастомизация

### Изменение цветов
В `assets/css/style.css`:
```css
:root {
    --primary-color: #007cba;    /* Основной цвет */
    --secondary-color: #005a87;  /* Вторичный цвет */
    --accent-color: #28a745;     /* Акцентный цвет */
}
```

### Изменение контента
- **Заголовки и тексты** - редактируйте в `index.php`
- **Кейсы** - обновите данные в секции Cases
- **FAQ** - добавьте/измените вопросы
- **Пакеты** - измените цены и описания

## 🔒 Безопасность

### Обязательные настройки:
1. **Измените CSRF_SECRET** на случайную строку
2. **Настройте HTTPS** (автоматически через .htaccess)
3. **Используйте сложные пароли**
4. **Регулярно обновляйте PHP**

### Дополнительные меры:
- Настройте бэкапы
- Мониторьте логи ошибок
- Не передавайте секреты в Git

## 📈 Оптимизация

### SEO готов:
- Структурированные данные (JSON-LD)
- Оптимизированные мета-теги
- Мобильная адаптивность
- Быстрая загрузка

### Производительность:
- Изображения оптимизированы
- CSS и JS сжаты
- Включено кэширование
- Минифицированы ресурсы

## 🛠️ Техническая поддержка

### Частые проблемы:

1. **Письма не приходят**
   - Проверьте SMTP настройки
   - Убедитесь, что пароль приложения правильный

2. **Telegram не работает**
   - Проверьте токен и chat_id
   - Убедитесь, что бот добавлен в чат

3. **Форма не отправляется**
   - Проверьте права на запись файлов
   - Включите DEBUG_MODE в config.php

4. **Ошибки 500**
   - Проверьте логи сервера
   - Убедитесь в корректности PHP синтаксиса

### Логирование ошибок:
```php
define('DEBUG_MODE', true);
```
Ошибки будут в файле `error.log`.

## 📋 Чек-лист перед запуском

- [ ] Настроен config.php
- [ ] Добавлены изображения
- [ ] Настроен SMTP
- [ ] Создан Telegram бот (опционально)
- [ ] Изменен CSRF_SECRET
- [ ] Обновлен домен в .htaccess
- [ ] Протестирована форма заявки
- [ ] Проверены все ссылки
- [ ] Настроена аналитика
- [ ] Создан бэкап

## 📊 Структура файлов

```
php-mvp/
├── index.php              # Главная страница
├── submit.php             # Обработчик формы
├── thanks.php             # Страница благодарности
├── config.php             # Настройки сайта
├── .htaccess              # Настройки Apache
├── README.md              # Эта документация
└── assets/
    ├── css/
    │   └── style.css      # Основные стили
    ├── js/
    │   └── app.js         # JavaScript функции
    └── images/            # Папка для изображений
```

## 🎯 Результат

После настройки у вас будет:

- ✅ **Рабочий сайт** за 1 день
- ✅ **Автоматический сбор заявок** 
- ✅ **Email уведомления**
- ✅ **Telegram интеграция**
- ✅ **SEO оптимизация**
- ✅ **Мобильная версия**
- ✅ **Защита от спама**
- ✅ **Быстрая загрузка**

---

**Время разработки**: 7 дней  
**Технологии**: PHP + HTML + CSS + JavaScript  
**Хостинг**: любой с поддержкой PHP  
**Стоимость**: $500-1000 (зависит от дизайна)

**🚀 Готово к запуску!**
