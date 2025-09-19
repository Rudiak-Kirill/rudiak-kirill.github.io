<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Спасибо за заявку! - SEO Аудиты</title>
    <meta name="description" content="Ваша заявка принята. Мы свяжемся с вами в течение 24 часов.">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="thanks-page">
        <div class="container">
            <div class="thanks-content">
                <div class="thanks-icon">✅</div>
                <h1>Спасибо за заявку!</h1>
                <p class="thanks-subtitle">Ваша заявка на SEO аудит принята. Я свяжусь с вами в течение 24 часов.</p>
                
                <div class="thanks-info">
                    <h3>📋 Что дальше?</h3>
                    <div class="steps">
                        <div class="step">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h4>Анализ заявки</h4>
                                <p>Изучу ваш сайт и подготовлю предварительную оценку</p>
                            </div>
                        </div>
                        
                        <div class="step">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h4>Связь с вами</h4>
                                <p>Свяжусь в течение 24 часов для обсуждения деталей</p>
                            </div>
                        </div>
                        
                        <div class="step">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h4>Персональное предложение</h4>
                                <p>Предоставлю детальный план работ и сроки</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="thanks-contact">
                    <h3>📞 Нужна срочная консультация?</h3>
                    <div class="contact-methods">
                        <div class="contact-method">
                            <strong>📱 Телефон:</strong>
                            <a href="tel:<?php echo str_replace([' ', '(', ')', '-'], '', SITE_PHONE); ?>" class="contact-link">
                                <?php echo SITE_PHONE; ?>
                            </a>
                        </div>
                        
                        <div class="contact-method">
                            <strong>✉️ Email:</strong>
                            <a href="mailto:<?php echo SITE_EMAIL; ?>" class="contact-link">
                                <?php echo SITE_EMAIL; ?>
                            </a>
                        </div>
                        
                        <div class="contact-method">
                            <strong>💬 Telegram:</strong>
                            <a href="https://t.me/yourusername" target="_blank" class="contact-link">
                                @yourusername
                            </a>
                        </div>
                    </div>
                    
                    <div class="working-hours">
                        <strong>🕐 Время работы:</strong> Пн-Пт: 9:00 - 18:00 (МСК)
                    </div>
                </div>
                
                <div class="thanks-tips">
                    <h3>💡 Пока ждёте ответа</h3>
                    <p>Можете подготовить следующую информацию:</p>
                    <ul class="tips-list">
                        <li>📊 Доступы к Google Analytics и Яндекс.Метрике</li>
                        <li>🎯 Информацию о целях и задачах сайта</li>
                        <li>🏢 Данные о конкурентах</li>
                        <li>❓ Вопросы, которые вас интересуют</li>
                        <li>📈 Текущие показатели трафика и конверсии</li>
                    </ul>
                </div>
                
                <div class="thanks-guarantee">
                    <h3>🛡️ Наши гарантии</h3>
                    <div class="guarantees">
                        <div class="guarantee">
                            <strong>⏰ Быстрый ответ</strong>
                            <p>Свяжемся в течение 24 часов</p>
                        </div>
                        <div class="guarantee">
                            <strong>💎 Качественный анализ</strong>
                            <p>Практические рекомендации от эксперта</p>
                        </div>
                        <div class="guarantee">
                            <strong>🔄 Поддержка</strong>
                            <p>Консультации в течение месяца</p>
                        </div>
                    </div>
                </div>
                
                <div class="thanks-actions">
                    <a href="/" class="btn btn-primary">Вернуться на главную</a>
                    <a href="#pricing" class="btn btn-secondary">Посмотреть пакеты</a>
                </div>
                
                <div class="thanks-social">
                    <p>Подписывайтесь на обновления:</p>
                    <div class="social-links">
                        <a href="https://t.me/yourusername" target="_blank" rel="noopener" class="social-link">
                            📱 Telegram
                        </a>
                        <a href="https://linkedin.com/in/yourprofile" target="_blank" rel="noopener" class="social-link">
                            💼 LinkedIn
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Дополнительные стили для страницы благодарности -->
    <style>
        .thanks-page {
            min-height: 100vh;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 60px 0 40px;
            display: flex;
            align-items: center;
        }
        
        .thanks-content {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .thanks-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
        }
        
        .thanks-content h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #007cba;
        }
        
        .thanks-subtitle {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 2.5rem;
        }
        
        .thanks-info,
        .thanks-contact,
        .thanks-tips,
        .thanks-guarantee {
            text-align: left;
            margin: 2rem 0;
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 10px;
            border-left: 4px solid #007cba;
        }
        
        .thanks-info h3,
        .thanks-contact h3,
        .thanks-tips h3,
        .thanks-guarantee h3 {
            margin-bottom: 1rem;
            color: #007cba;
        }
        
        .steps {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .step {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .step-number {
            background: #007cba;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
        }
        
        .step-content h4 {
            margin-bottom: 0.25rem;
            color: #333;
        }
        
        .step-content p {
            margin: 0;
            color: #666;
            font-size: 0.9rem;
        }
        
        .contact-methods {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }
        
        .contact-method {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .contact-link {
            color: #007cba;
            text-decoration: none;
            font-weight: 500;
        }
        
        .contact-link:hover {
            text-decoration: underline;
        }
        
        .working-hours {
            padding-top: 1rem;
            border-top: 1px solid #ddd;
            color: #666;
        }
        
        .tips-list {
            list-style: none;
            padding: 0;
        }
        
        .tips-list li {
            padding: 0.5rem 0;
            color: #555;
        }
        
        .guarantees {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }
        
        .guarantee {
            text-align: center;
            padding: 1rem;
            background: white;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }
        
        .guarantee strong {
            display: block;
            margin-bottom: 0.5rem;
            color: #007cba;
        }
        
        .guarantee p {
            margin: 0;
            font-size: 0.9rem;
            color: #666;
        }
        
        .thanks-actions {
            margin: 2rem 0;
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .thanks-social {
            padding-top: 2rem;
            border-top: 1px solid #e9ecef;
        }
        
        .thanks-social p {
            margin-bottom: 1rem;
            color: #666;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }
        
        .social-link {
            padding: 0.5rem 1rem;
            background: #007cba;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        
        .social-link:hover {
            background: #005a87;
        }
        
        @media (max-width: 768px) {
            .thanks-content {
                padding: 2rem 1rem;
            }
            
            .thanks-content h1 {
                font-size: 2rem;
            }
            
            .step {
                flex-direction: column;
                text-align: center;
            }
            
            .contact-methods {
                text-align: center;
            }
            
            .contact-method {
                justify-content: center;
            }
            
            .thanks-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .social-links {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</body>
</html>

