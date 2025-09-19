<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEO Аудиты с 2012 года - Профессиональная оптимизация сайтов</title>
    <meta name="description" content="SEO аудиты сайтов с 2012 года. Express/Pro/Full пакеты. Рост трафика на 150%+ за 3 месяца. Консультации и внедрение.">
    <meta name="keywords" content="seo аудит, оптимизация сайта, продвижение сайта, технический аудит">
    <meta name="author" content="<?php echo SITE_NAME; ?>">
    
    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="SEO Аудиты с 2012 года - Профессиональная оптимизация сайтов">
    <meta property="og:description" content="SEO аудиты сайтов с 2012 года. Express/Pro/Full пакеты. Рост трафика на 150%+ за 3 месяца.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL; ?>">
    <meta property="og:image" content="<?php echo SITE_URL; ?>/assets/images/og-image.jpg">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SEO Аудиты с 2012 года">
    <meta name="twitter:description" content="Профессиональные SEO аудиты сайтов с 2012 года">
    
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="canonical" href="<?php echo SITE_URL; ?>">
    
    <!-- JSON-LD разметка -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "<?php echo SITE_NAME; ?>",
        "description": "Профессиональные SEO аудиты сайтов с 2012 года",
        "url": "<?php echo SITE_URL; ?>",
        "telephone": "<?php echo SITE_PHONE; ?>",
        "email": "<?php echo SITE_EMAIL; ?>",
        "foundingDate": "2012",
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "RU"
        },
        "sameAs": [
            "https://t.me/yourusername",
            "https://linkedin.com/in/yourprofile"
        ],
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "SEO Аудиты",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Express SEO Аудит",
                        "description": "Быстрый аудит приоритетных проблем сайта"
                    },
                    "price": "15000",
                    "priceCurrency": "RUB"
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Pro SEO Аудит",
                        "description": "Полный технический аудит с консультацией"
                    },
                    "price": "35000",
                    "priceCurrency": "RUB"
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Full SEO Аудит",
                        "description": "Комплексный аудит с анализом юзабилити"
                    },
                    "price": "60000",
                    "priceCurrency": "RUB"
                }
            ]
        }
    }
    </script>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <div class="container">
                <div class="nav-brand">
                    <a href="/"><?php echo SITE_NAME; ?></a>
                </div>
                <div class="nav-menu">
                    <a href="#pricing">Пакеты</a>
                    <a href="#cases">Кейсы</a>
                    <a href="#faq">FAQ</a>
                    <a href="#contact">Контакты</a>
                </div>
                <div class="nav-mobile-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>SEO-аудиты с 2012 года</h1>
                <p class="hero-subtitle">Профессиональная оптимизация сайтов. Рост органического трафика на 150%+ за 3 месяца</p>
                
                <div class="hero-stats">
                    <div class="stat">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Проектов</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">150%</span>
                        <span class="stat-label">Рост трафика</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">12</span>
                        <span class="stat-label">Лет опыта</span>
                    </div>
                </div>
                
                <div class="hero-cta">
                    <a href="#contact" class="btn btn-primary">Заказать аудит</a>
                    <a href="#cases" class="btn btn-secondary">Посмотреть кейсы</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="assets/images/hero-seo.jpg" alt="SEO аудит сайта" loading="lazy">
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="pricing">
        <div class="container">
            <h2>Пакеты SEO-аудитов</h2>
            <p class="section-subtitle">Выберите подходящий пакет для вашего проекта</p>
            
            <div class="pricing-grid">
                <!-- Express Audit -->
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Express</h3>
                        <div class="price">от 15 000 ₽</div>
                        <div class="duration">2-3 дня</div>
                    </div>
                    <ul class="features">
                        <li>✓ Приоритетные проблемы (топ-10)</li>
                        <li>✓ Чек-лист исправлений</li>
                        <li>✓ Мгновенная отправка отчёта</li>
                        <li>✓ Технические рекомендации</li>
                    </ul>
                    <a href="#contact" class="btn btn-primary" data-package="express">Заказать</a>
                </div>
                
                <!-- Pro Audit -->
                <div class="pricing-card featured">
                    <div class="badge">Популярный</div>
                    <div class="pricing-header">
                        <h3>Pro</h3>
                        <div class="price">от 35 000 ₽</div>
                        <div class="duration">5-7 дней</div>
                    </div>
                    <ul class="features">
                        <li>✓ Полный технический аудит</li>
                        <li>✓ Контент-анализ</li>
                        <li>✓ Конкурентный анализ</li>
                        <li>✓ Консультация 60 мин</li>
                        <li>✓ Приоритизированный план</li>
                    </ul>
                    <a href="#contact" class="btn btn-primary" data-package="pro">Заказать</a>
                </div>
                
                <!-- Full Audit -->
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Full</h3>
                        <div class="price">от 60 000 ₽</div>
                        <div class="duration">10-14 дней</div>
                    </div>
                    <ul class="features">
                        <li>✓ Всё из Pro +</li>
                        <li>✓ Анализ юзабилити</li>
                        <li>✓ Анализ конверсии</li>
                        <li>✓ Стратегические рекомендации</li>
                        <li>✓ Консультация 120 мин</li>
                        <li>✓ Follow-up поддержка</li>
                    </ul>
                    <a href="#contact" class="btn btn-primary" data-package="full">Заказать</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Cases Section -->
    <section id="cases" class="cases">
        <div class="container">
            <h2>Результаты наших клиентов</h2>
            <p class="section-subtitle">Реальные кейсы с измеримыми результатами</p>
            
            <div class="cases-grid">
                <!-- Кейс 1 -->
                <div class="case-card">
                    <div class="case-image">
                        <img src="assets/images/case-ecommerce.jpg" alt="Кейс интернет-магазина" loading="lazy">
                    </div>
                    <div class="case-content">
                        <h3>Интернет-магазин электроники</h3>
                        <div class="case-results">
                            <div class="result">
                                <span class="result-number">+180%</span>
                                <span class="result-label">Органический трафик</span>
                            </div>
                            <div class="result">
                                <span class="result-number">+250</span>
                                <span class="result-label">Новых ключевых слов</span>
                            </div>
                        </div>
                        <p>За 4 месяца увеличили органический трафик в 2.8 раза через техническую оптимизацию и контент-стратегию. Сайт поднялся в ТОП-3 по основным запросам.</p>
                        <div class="case-tags">
                            <span class="tag">E-commerce</span>
                            <span class="tag">Техническая оптимизация</span>
                        </div>
                    </div>
                </div>
                
                <!-- Кейс 2 -->
                <div class="case-card">
                    <div class="case-image">
                        <img src="assets/images/case-b2b.jpg" alt="Кейс корпоративного сайта" loading="lazy">
                    </div>
                    <div class="case-content">
                        <h3>Корпоративный сайт B2B</h3>
                        <div class="case-results">
                            <div class="result">
                                <span class="result-number">+120%</span>
                                <span class="result-label">Лидов</span>
                            </div>
                            <div class="result">
                                <span class="result-number">-40%</span>
                                <span class="result-label">Стоимость лида</span>
                            </div>
                        </div>
                        <p>Оптимизировали сайт под коммерческие запросы и улучшили конверсию в лиды. Снизили стоимость привлечения клиентов на 40%.</p>
                        <div class="case-tags">
                            <span class="tag">B2B</span>
                            <span class="tag">Конверсия</span>
                        </div>
                    </div>
                </div>
                
                <!-- Кейс 3 -->
                <div class="case-card">
                    <div class="case-image">
                        <img src="assets/images/case-startup.jpg" alt="Кейс стартапа" loading="lazy">
                    </div>
                    <div class="case-content">
                        <h3>IT стартап</h3>
                        <div class="case-results">
                            <div class="result">
                                <span class="result-number">+300%</span>
                                <span class="result-label">Видимость</span>
                            </div>
                            <div class="result">
                                <span class="result-number">+85%</span>
                                <span class="result-label">Конверсия</span>
                            </div>
                        </div>
                        <p>Помогли молодому стартапу занять лидирующие позиции в поиске. Увеличили видимость сайта в 4 раза за 6 месяцев.</p>
                        <div class="case-tags">
                            <span class="tag">IT</span>
                            <span class="tag">Стартап</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq">
        <div class="container">
            <h2>Часто задаваемые вопросы</h2>
            <p class="section-subtitle">Ответы на популярные вопросы о SEO аудитах</p>
            
            <div class="faq-list">
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Сколько стоит SEO аудит?</span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>У нас есть 3 пакета: Express (от 15 000 ₽), Pro (от 35 000 ₽) и Full (от 60 000 ₽). Стоимость зависит от размера сайта и глубины анализа. Для крупных проектов возможны индивидуальные условия.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Как долго длится аудит?</span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>Express аудит готов за 2-3 дня, Pro за 5-7 дней, Full за 10-14 дней. Сроки могут варьироваться в зависимости от сложности проекта и объёма работ.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Что входит в каждый пакет?</span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>Express включает приоритетные проблемы и чек-лист исправлений. Pro добавляет контент и конкурентный анализ. Full включает анализ юзабилити, конверсии и стратегические рекомендации.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Какие гарантии вы даёте?</span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>Мы гарантируем качественный анализ и практические рекомендации. Если результат не устроит, вернём 50% стоимости. Также предоставляем бесплатные консультации в течение месяца после аудита.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Помогаете ли с внедрением?</span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>Да, мы можем помочь с внедрением рекомендаций. Стоимость рассчитывается отдельно в зависимости от объёма работ. Обычно это 30-50% от стоимости аудита.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Как происходит оплата?</span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>Для Express аудита возможна предоплата 100%. Для Pro и Full аудитов - 50% предоплата, остальное после получения отчёта. Принимаем банковские карты, переводы и другие способы оплаты.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <h2>Заказать SEO аудит</h2>
            <p class="section-subtitle">Оставьте заявку и получите персональное предложение</p>
            
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Свяжитесь с нами</h3>
                    <div class="contact-item">
                        <strong>Телефон:</strong>
                        <a href="tel:<?php echo str_replace([' ', '(', ')', '-'], '', SITE_PHONE); ?>"><?php echo SITE_PHONE; ?></a>
                    </div>
                    <div class="contact-item">
                        <strong>Email:</strong>
                        <a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a>
                    </div>
                    <div class="contact-item">
                        <strong>Telegram:</strong>
                        <a href="https://t.me/yourusername" target="_blank">@yourusername</a>
                    </div>
                    <div class="contact-item">
                        <strong>Время работы:</strong>
                        Пн-Пт: 9:00 - 18:00 (МСК)
                    </div>
                </div>
                
                <form id="contact-form" method="POST" action="submit.php" class="contact-form">
                    <!-- CSRF защита -->
                    <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
                    
                    <!-- Honeypot защита -->
                    <input type="text" name="<?php echo HONEYPOT_FIELD; ?>" style="display: none;" tabindex="-1" autocomplete="off">
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Имя *</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="website">Сайт *</label>
                        <input type="url" id="website" name="website" placeholder="https://example.com" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="package">Пакет аудита</label>
                        <select id="package" name="package">
                            <option value="">Выберите пакет</option>
                            <option value="express">Express (от 15 000 ₽)</option>
                            <option value="pro">Pro (от 35 000 ₽)</option>
                            <option value="full">Full (от 60 000 ₽)</option>
                            <option value="custom">Индивидуальный</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Дополнительная информация</label>
                        <textarea id="message" name="message" rows="4" placeholder="Опишите цели, особенности сайта или вопросы..."></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="agreement" required>
                            <span class="checkmark"></span>
                            Согласен на обработку персональных данных *
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-large">
                        <span class="btn-text">Отправить заявку</span>
                        <span class="btn-loading" style="display: none;">Отправляем...</span>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-info">
                    <h3><?php echo SITE_NAME; ?></h3>
                    <p>Профессиональные SEO аудиты сайтов с 2012 года</p>
                    <div class="footer-contact">
                        <p>📧 <a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a></p>
                        <p>📞 <a href="tel:<?php echo str_replace([' ', '(', ')', '-'], '', SITE_PHONE); ?>"><?php echo SITE_PHONE; ?></a></p>
                    </div>
                </div>
                
                <div class="footer-links">
                    <h4>Услуги</h4>
                    <ul>
                        <li><a href="#pricing">SEO Аудиты</a></li>
                        <li><a href="#cases">Кейсы</a></li>
                        <li><a href="#faq">FAQ</a></li>
                    </ul>
                </div>
                
                <div class="footer-social">
                    <h4>Связаться</h4>
                    <div class="social-links">
                        <a href="https://t.me/yourusername" target="_blank" rel="noopener">Telegram</a>
                        <a href="https://linkedin.com/in/yourprofile" target="_blank" rel="noopener">LinkedIn</a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 <?php echo SITE_NAME; ?>. Все права защищены.</p>
                <p><a href="/privacy.php">Политика конфиденциальности</a> | <a href="/terms.php">Условия использования</a></p>
            </div>
        </div>
    </footer>

    <script src="assets/js/app.js"></script>
</body>
</html>

