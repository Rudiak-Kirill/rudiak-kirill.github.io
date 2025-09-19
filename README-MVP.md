# PHP MVP - Личный сайт SEO специалиста

## 🚀 Быстрый старт

Это упрощённая версия сайта SEO-специалиста на PHP, готовая к запуску за 1 неделю.

### 📁 Структура проекта

```
seo-specialist-site/
├── index.php              # Главная страница
├── submit.php             # Обработчик формы
├── thanks.php             # Страница благодарности
├── config.php             # Настройки сайта
├── .htaccess              # Настройки Apache
├── assets/
│   ├── css/
│   │   └── style.css      # Основные стили
│   ├── js/
│   │   └── app.js         # JavaScript функции
│   └── images/            # Изображения сайта
└── README-MVP.md          # Эта документация
```

## ⚙️ Настройка

### 1. Загрузка на хостинг

1. Загрузите все файлы на ваш хостинг с поддержкой PHP
2. Убедитесь, что у вас есть доступ к файловой системе

### 2. Настройка config.php

Откройте файл `config.php` и заполните следующие данные:

```php
// Основные настройки сайта
define('SITE_NAME', 'Ваше имя/название');
define('SITE_EMAIL', 'your-email@domain.com');
define('SITE_PHONE', '+7 (XXX) XXX-XX-XX');
define('SITE_URL', 'https://yourdomain.com');

// SMTP настройки (опционально)
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_USERNAME', 'your-email@gmail.com');
define('SMTP_PASSWORD', 'your-app-password');

// Telegram уведомления (опционально)
define('TELEGRAM_BOT_TOKEN', 'your-bot-token');
define('TELEGRAM_CHAT_ID', 'your-chat-id');

// Безопасность
define('CSRF_SECRET', 'your-random-secret-key-change-this');
```

### 3. Настройка изображений

Добавьте следующие изображения в папку `assets/images/`:

- `hero-seo.jpg` - главное изображение (рекомендуется 800x600px)
- `case-ecommerce.jpg` - изображение кейса 1
- `case-b2b.jpg` - изображение кейса 2  
- `case-startup.jpg` - изображение кейса 3
- `og-image.jpg` - изображение для соцсетей (1200x630px)

### 4. Настройка домена

В файле `.htaccess` замените `yourdomain.com` на ваш реальный домен:

```apache
RewriteCond %{HTTP_REFERER} !^https?://(www\.)?yourdomain\.com [NC]
```

## 📧 Настройка отправки писем

### Вариант 1: SMTP (рекомендуется)

1. Создайте Gmail аккаунт или используйте существующий
2. Включите двухфакторную аутентификацию
3. Создайте пароль приложения
4. Заполните настройки в `config.php`:

```php
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'your-email@gmail.com');
define('SMTP_PASSWORD', 'your-app-password');
define('USE_SENDMAIL', false);
```

### Вариант 2: Sendmail (если SMTP не работает)

```php
define('USE_SENDMAIL', true);
```

## 📱 Настройка Telegram уведомлений

1. Создайте бота через @BotFather
2. Получите токен бота
3. Узнайте ID вашего чата (можно через @userinfobot)
4. Заполните в `config.php`:

```php
define('TELEGRAM_BOT_TOKEN', '123456789:ABCdefGHIjklMNOpqrsTUVwxyz');
define('TELEGRAM_CHAT_ID', '123456789');
```

## 🔒 Безопасность

### Обязательные настройки:

1. **Измените CSRF_SECRET** на случайную строку
2. **Настройте HTTPS** (автоматически через .htaccess)
3. **Защита от спама** включена (CSRF + honeypot)
4. **Rate limiting** (максимум 10 заявок в час с IP)

### Дополнительные меры:

- Регулярно обновляйте PHP
- Используйте сложные пароли
- Не передавайте секреты в Git
- Настройте бэкапы

## 📊 Аналитика

### Google Analytics 4

Добавьте в `index.php` перед закрывающим тегом `</head>`:

```html
<!-- Google Analytics -->
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
<!-- Яндекс.Метрика -->
<script type="text/javascript">
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/watch.js", "ym");

   ym(YOUR_COUNTER_ID, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
```

## 🎨 Кастомизация

### Изменение цветов

В файле `assets/css/style.css` найдите и измените:

```css
:root {
    --primary-color: #007cba;    /* Основной цвет */
    --secondary-color: #005a87;  /* Вторичный цвет */
    --accent-color: #28a745;     /* Акцентный цвет */
}
```

### Изменение контента

1. **Заголовки и тексты** - редактируйте в `index.php`
2. **Кейсы** - обновите данные в секции Cases
3. **FAQ** - добавьте/измените вопросы в секции FAQ
4. **Пакеты** - измените цены и описания в секции Pricing

### Добавление новых секций

1. Добавьте HTML в `index.php`
2. Добавьте стили в `assets/css/style.css`
3. При необходимости добавьте JavaScript в `assets/js/app.js`

## 🚀 Запуск

### 1. Проверка работоспособности

1. Откройте сайт в браузере
2. Проверьте все ссылки и кнопки
3. Протестируйте форму заявки
4. Убедитесь, что письма приходят

### 2. SEO оптимизация

1. Замените placeholder тексты на реальные
2. Добавьте реальные изображения
3. Настройте Google Search Console
4. Создайте sitemap.xml

### 3. Мониторинг

1. Настройте мониторинг доступности
2. Отслеживайте ошибки в логах
3. Мониторьте производительность
4. Анализируйте конверсии

## 📈 Оптимизация

### Производительность

- Изображения оптимизированы через .htaccess
- CSS и JS сжаты
- Включено кэширование
- Минифицированы ресурсы

### SEO

- Структурированные данные (JSON-LD)
- Оптимизированные мета-теги
- Мобильная адаптивность
- Быстрая загрузка

### Конверсия

- Чёткие призывы к действию
- Простая форма заявки
- Доверительные элементы (статистика, кейсы)
- Мобильная оптимизация

## 🛠️ Техническая поддержка

### Частые проблемы:

1. **Письма не приходят** - проверьте SMTP настройки
2. **Telegram не работает** - проверьте токен и chat_id
3. **Форма не отправляется** - проверьте права на запись файлов
4. **Ошибки 500** - проверьте логи сервера

### Логирование ошибок:

Включите в `config.php`:

```php
define('DEBUG_MODE', true);
```

Ошибки будут записываться в файл `error.log`.

## 📞 Контакты

При возникновении проблем:

1. Проверьте эту документацию
2. Посмотрите логи ошибок
3. Проверьте настройки хостинга
4. Обратитесь к техподдержке хостинга

---

**Время разработки**: 7 дней  
**Технологии**: PHP + HTML + CSS + JavaScript  
**Хостинг**: любой с поддержкой PHP  
**Стоимость**: $500-1000 (зависит от дизайна)

