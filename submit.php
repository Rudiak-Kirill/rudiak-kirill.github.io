<?php
require_once 'config.php';

// Проверка метода запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Проверка rate limit
if (!checkRateLimit($_SERVER['REMOTE_ADDR'])) {
    header('Location: index.php?error=rate_limit');
    exit;
}

// Валидация CSRF токена
if (!isset($_POST['csrf_token']) || !verifyCSRFToken($_POST['csrf_token'])) {
    header('Location: index.php?error=security');
    exit;
}

// Honeypot защита от спама
if (!empty($_POST[HONEYPOT_FIELD])) {
    // Это спам, перенаправляем без обработки
    header('Location: thanks.php');
    exit;
}

// Получение и очистка данных
$name = cleanInput($_POST['name'] ?? '');
$email = cleanInput($_POST['email'] ?? '');
$website = cleanInput($_POST['website'] ?? '');
$package = cleanInput($_POST['package'] ?? '');
$message = cleanInput($_POST['message'] ?? '');
$agreement = isset($_POST['agreement']);

// Валидация обязательных полей
$errors = [];

if (empty($name)) {
    $errors[] = 'Заполните имя';
}

if (empty($email)) {
    $errors[] = 'Заполните email';
} elseif (!validateEmail($email)) {
    $errors[] = 'Неверный формат email';
}

if (empty($website)) {
    $errors[] = 'Заполните URL сайта';
} elseif (!validateURL($website)) {
    $errors[] = 'Неверный формат URL сайта';
}

if (!$agreement) {
    $errors[] = 'Необходимо согласие на обработку персональных данных';
}

// Если есть ошибки, возвращаем на главную с сообщением
if (!empty($errors)) {
    $error_message = implode(', ', $errors);
    header('Location: index.php?error=' . urlencode($error_message));
    exit;
}

// Подготовка данных для отправки
$formData = [
    'name' => $name,
    'email' => $email,
    'website' => $website,
    'package' => $package,
    'message' => $message,
    'date' => date('Y-m-d H:i:s'),
    'ip' => $_SERVER['REMOTE_ADDR'],
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? ''
];

// Отправка email администратору
$adminEmailSent = sendAdminEmail($formData);

// Отправка email клиенту
$clientEmailSent = sendClientEmail($formData);

// Отправка уведомления в Telegram
$telegramSent = sendTelegramNotification($formData);

// Логирование результата
if (DEBUG_MODE) {
    $logMessage = "Заявка от {$name} ({$email}): ";
    $logMessage .= "Admin email: " . ($adminEmailSent ? 'OK' : 'FAIL') . ", ";
    $logMessage .= "Client email: " . ($clientEmailSent ? 'OK' : 'FAIL') . ", ";
    $logMessage .= "Telegram: " . ($telegramSent ? 'OK' : 'FAIL');
    logError($logMessage);
}

// Перенаправление на страницу благодарности
header('Location: thanks.php');
exit;

// Функция отправки email администратору
function sendAdminEmail($data) {
    $subject = 'Новая заявка на SEO аудит - ' . $data['name'];
    
    $body = "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .header { background: #007cba; color: white; padding: 20px; text-align: center; }
            .content { padding: 20px; }
            .field { margin-bottom: 15px; }
            .label { font-weight: bold; color: #007cba; }
            .value { margin-top: 5px; }
            .footer { background: #f8f9fa; padding: 15px; text-align: center; font-size: 12px; color: #666; }
        </style>
    </head>
    <body>
        <div class='header'>
            <h2>🔔 Новая заявка на SEO аудит</h2>
        </div>
        
        <div class='content'>
            <div class='field'>
                <div class='label'>👤 Имя:</div>
                <div class='value'>{$data['name']}</div>
            </div>
            
            <div class='field'>
                <div class='label'>📧 Email:</div>
                <div class='value'><a href='mailto:{$data['email']}'>{$data['email']}</a></div>
            </div>
            
            <div class='field'>
                <div class='label'>🌐 Сайт:</div>
                <div class='value'><a href='{$data['website']}' target='_blank'>{$data['website']}</a></div>
            </div>
            
            <div class='field'>
                <div class='label'>📦 Пакет:</div>
                <div class='value'>" . getPackageName($data['package']) . "</div>
            </div>
            
            " . (!empty($data['message']) ? "
            <div class='field'>
                <div class='label'>💬 Сообщение:</div>
                <div class='value'>" . nl2br($data['message']) . "</div>
            </div>
            " : "") . "
            
            <div class='field'>
                <div class='label'>📅 Дата и время:</div>
                <div class='value'>{$data['date']}</div>
            </div>
            
            <div class='field'>
                <div class='label'>🌍 IP адрес:</div>
                <div class='value'>{$data['ip']}</div>
            </div>
        </div>
        
        <div class='footer'>
            <p>Это автоматическое сообщение с сайта " . SITE_NAME . "</p>
            <p>Ответьте клиенту в течение 24 часов</p>
        </div>
    </body>
    </html>
    ";
    
    $headers = [
        'From: ' . SITE_NAME . ' <' . SITE_EMAIL . '>',
        'Reply-To: ' . $data['email'],
        'Content-Type: text/html; charset=UTF-8',
        'X-Mailer: PHP/' . phpversion()
    ];
    
    return sendSMTPEmail(SITE_EMAIL, $subject, $body, $headers);
}

// Функция отправки email клиенту
function sendClientEmail($data) {
    $subject = 'Спасибо за заявку на SEO аудит!';
    
    $body = "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .header { background: #007cba; color: white; padding: 20px; text-align: center; }
            .content { padding: 20px; }
            .highlight { background: #f8f9fa; padding: 15px; border-left: 4px solid #007cba; margin: 15px 0; }
            .contact-info { background: #e3f2fd; padding: 15px; border-radius: 5px; margin: 15px 0; }
            .footer { background: #f8f9fa; padding: 15px; text-align: center; font-size: 12px; color: #666; }
        </style>
    </head>
    <body>
        <div class='header'>
            <h2>✅ Спасибо за заявку!</h2>
        </div>
        
        <div class='content'>
            <p>Здравствуйте, <strong>{$data['name']}</strong>!</p>
            
            <p>Ваша заявка на SEO аудит принята. Мы получили следующую информацию:</p>
            
            <div class='highlight'>
                <strong>Ваш сайт:</strong> {$data['website']}<br>
                <strong>Выбранный пакет:</strong> " . getPackageName($data['package']) . "<br>
                <strong>Дата заявки:</strong> {$data['date']}
            </div>
            
            <h3>📋 Что дальше?</h3>
            <ol>
                <li><strong>В течение 24 часов</strong> я свяжусь с вами для уточнения деталей</li>
                <li><strong>Проведу предварительный анализ</strong> вашего сайта</li>
                <li><strong>Подготовлю персональное предложение</strong> с планом работ</li>
                <li><strong>Обсудим сроки и условия</strong> сотрудничества</li>
            </ol>
            
            <div class='contact-info'>
                <h4>📞 Нужна срочная консультация?</h4>
                <p><strong>Телефон:</strong> " . SITE_PHONE . "</p>
                <p><strong>Telegram:</strong> <a href='https://t.me/yourusername'>@yourusername</a></p>
                <p><strong>Email:</strong> <a href='mailto:" . SITE_EMAIL . "'>" . SITE_EMAIL . "</a></p>
            </div>
            
            <h3>💡 Пока ждёте ответа</h3>
            <p>Можете подготовить:</p>
            <ul>
                <li>Доступы к Google Analytics и Яндекс.Метрике</li>
                <li>Информацию о целях и задачах сайта</li>
                <li>Данные о конкурентах</li>
                <li>Вопросы, которые вас интересуют</li>
            </ul>
        </div>
        
        <div class='footer'>
            <p>С уважением,<br><strong>" . SITE_NAME . "</strong></p>
            <p>Опыт работы с SEO с 2012 года</p>
        </div>
    </body>
    </html>
    ";
    
    $headers = [
        'From: ' . SITE_NAME . ' <' . SITE_EMAIL . '>',
        'Reply-To: ' . SITE_EMAIL,
        'Content-Type: text/html; charset=UTF-8',
        'X-Mailer: PHP/' . phpversion()
    ];
    
    return sendSMTPEmail($data['email'], $subject, $body, $headers);
}

// Функция получения названия пакета
function getPackageName($package) {
    switch ($package) {
        case 'express':
            return 'Express (от 15 000 ₽)';
        case 'pro':
            return 'Pro (от 35 000 ₽)';
        case 'full':
            return 'Full (от 60 000 ₽)';
        case 'custom':
            return 'Индивидуальный';
        default:
            return 'Не указан';
    }
}
?>

