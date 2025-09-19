// ===== ИНИЦИАЛИЗАЦИЯ =====
document.addEventListener('DOMContentLoaded', function() {
    initializeFAQ();
    initializeFormValidation();
    initializeSmoothScrolling();
    initializeScrollAnimations();
    initializeMobileMenu();
    initializePackageSelection();
    initializeFormSubmission();
    initializeHeaderScroll();
    initializeActiveMenu();
});

// ===== FAQ АККОРДЕОН =====
function initializeFAQ() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        
        if (question && answer) {
            question.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                
                // Закрыть все остальные
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                        const otherAnswer = otherItem.querySelector('.faq-answer');
                        if (otherAnswer) {
                            otherAnswer.classList.remove('active');
                        }
                    }
                });
                
                // Переключить текущий
                if (!isActive) {
                    item.classList.add('active');
                    answer.classList.add('active');
                } else {
                    item.classList.remove('active');
                    answer.classList.remove('active');
                }
            });
        }
    });
}

// ===== ВАЛИДАЦИЯ ФОРМЫ =====
function initializeFormValidation() {
    // Яндекс.Формы обрабатывают валидацию самостоятельно
    // const contactForm = document.getElementById('contact-form');
    // if (!contactForm) return;
    return;
    
    // Валидация в реальном времени
    const inputs = contactForm.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('blur', () => validateField(input));
        input.addEventListener('input', () => clearFieldError(input));
    });
    
    // Обработка отправки формы
    contactForm.addEventListener('submit', function(e) {
        if (!validateForm(contactForm)) {
            e.preventDefault();
            return false;
        }
        
        // Показываем состояние загрузки
        showFormLoading(true);
    });
}

function validateField(field) {
    const value = field.value.trim();
    let isValid = true;
    let errorMessage = '';
    
    // Проверка обязательных полей
    if (field.hasAttribute('required') && !value) {
        isValid = false;
        errorMessage = 'Это поле обязательно для заполнения';
    }
    
    // Специфические проверки
    if (value && field.type === 'email') {
        if (!isValidEmail(value)) {
            isValid = false;
            errorMessage = 'Введите корректный email адрес';
        }
    }
    
    if (value && field.type === 'url') {
        if (!isValidURL(value)) {
            isValid = false;
            errorMessage = 'Введите корректный URL сайта';
        }
    }
    
    if (value && field.name === 'name') {
        if (value.length < 2) {
            isValid = false;
            errorMessage = 'Имя должно содержать минимум 2 символа';
        }
    }
    
    // Показываем ошибку
    if (!isValid) {
        showFieldError(field, errorMessage);
    } else {
        clearFieldError(field);
    }
    
    return isValid;
}

function validateForm(form) {
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!validateField(field)) {
            isValid = false;
        }
    });
    
    // Дополнительная проверка согласия
    const agreement = form.querySelector('input[name="agreement"]');
    if (agreement && !agreement.checked) {
        isValid = false;
        showFieldError(agreement, 'Необходимо согласие на обработку данных');
    }
    
    return isValid;
}

function showFieldError(field, message) {
    clearFieldError(field);
    
    const errorElement = document.createElement('div');
    errorElement.className = 'field-error';
    errorElement.textContent = message;
    errorElement.style.color = '#dc3545';
    errorElement.style.fontSize = '0.875rem';
    errorElement.style.marginTop = '0.25rem';
    
    field.style.borderColor = '#dc3545';
    field.parentNode.appendChild(errorElement);
}

function clearFieldError(field) {
    const errorElement = field.parentNode.querySelector('.field-error');
    if (errorElement) {
        errorElement.remove();
    }
    field.style.borderColor = '#e9ecef';
}

function showFormLoading(loading) {
    const submitBtn = document.querySelector('.btn-large');
    if (!submitBtn) return;
    
    if (loading) {
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
    } else {
        submitBtn.classList.remove('loading');
        submitBtn.disabled = false;
    }
}

// ===== ПЛАВНАЯ ПРОКРУТКА =====
function initializeSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerHeight = document.querySelector('.header').offsetHeight;
                const targetPosition = target.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// ===== АНИМАЦИИ ПРИ ПРОКРУТКЕ =====
function initializeScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-on-scroll');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Наблюдение за элементами
    const animatedElements = document.querySelectorAll('.pricing-card, .case-card, .faq-item, .contact-info, .contact-form');
    animatedElements.forEach(el => {
        observer.observe(el);
    });
}

// ===== МОБИЛЬНОЕ МЕНЮ =====
function initializeMobileMenu() {
    const mobileToggle = document.querySelector('.nav-mobile-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (mobileToggle && navMenu) {
        mobileToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            mobileToggle.classList.toggle('active');
        });
        
        // Закрытие меню при клике на ссылку
        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('active');
                mobileToggle.classList.remove('active');
            });
        });
        
        // Закрытие меню при клике вне его
        document.addEventListener('click', (e) => {
            if (!mobileToggle.contains(e.target) && !navMenu.contains(e.target)) {
                navMenu.classList.remove('active');
                mobileToggle.classList.remove('active');
            }
        });
    }
}

// ===== ВЫБОР ПАКЕТА =====
function initializePackageSelection() {
    const packageButtons = document.querySelectorAll('[data-package]');
    const packageSelect = document.getElementById('package');
    
    packageButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const packageType = button.getAttribute('data-package');
            
            if (packageSelect) {
                packageSelect.value = packageType;
                packageSelect.dispatchEvent(new Event('change'));
            }
            
            // Прокрутка к форме
            const contactSection = document.getElementById('contact');
            if (contactSection) {
                const headerHeight = document.querySelector('.header').offsetHeight;
                const targetPosition = contactSection.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Подсветка поля выбора пакета
                setTimeout(() => {
                    packageSelect.style.borderColor = '#007cba';
                    packageSelect.style.boxShadow = '0 0 0 3px rgba(0, 124, 186, 0.1)';
                    
                    setTimeout(() => {
                        packageSelect.style.borderColor = '#e9ecef';
                        packageSelect.style.boxShadow = 'none';
                    }, 2000);
                }, 500);
            }
        });
    });
}

// ===== ОТПРАВКА ФОРМЫ =====
function initializeFormSubmission() {
    // Яндекс.Формы обрабатывают отправку самостоятельно
    // const form = document.getElementById('contact-form');
    // if (!form) return;
    return;
    
    // Обработка ошибок из URL параметров
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    
    if (error) {
        showNotification(decodeURIComponent(error), 'error');
    }
    
    // Показ уведомлений
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <div class="notification-content">
                <span class="notification-message">${message}</span>
                <button class="notification-close">&times;</button>
            </div>
        `;
        
        notification.style.cssText = `
            position: fixed;
            top: 100px;
            right: 20px;
            background: ${type === 'error' ? '#dc3545' : '#28a745'};
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 10000;
            max-width: 400px;
            transform: translateX(100%);
            transition: transform 0.3s ease;
        `;
        
        document.body.appendChild(notification);
        
        // Анимация появления
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        // Автоматическое скрытие
        setTimeout(() => {
            hideNotification(notification);
        }, 5000);
        
        // Закрытие по клику
        const closeBtn = notification.querySelector('.notification-close');
        closeBtn.addEventListener('click', () => hideNotification(notification));
    }
    
    function hideNotification(notification) {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }
}

// ===== ВСПОМОГАТЕЛЬНЫЕ ФУНКЦИИ =====
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function isValidURL(url) {
    try {
        new URL(url);
        return true;
    } catch {
        return false;
    }
}

// ===== ДОПОЛНИТЕЛЬНЫЕ СТИЛИ ДЛЯ УВЕДОМЛЕНИЙ =====
const notificationStyles = `
    .notification-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
    }
    
    .notification-close {
        background: none;
        border: none;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
        padding: 0;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: background-color 0.2s ease;
    }
    
    .notification-close:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }
`;

// Добавляем стили для уведомлений
const styleSheet = document.createElement('style');
styleSheet.textContent = notificationStyles;
document.head.appendChild(styleSheet);

// ===== ДОПОЛНИТЕЛЬНЫЕ СТИЛИ ДЛЯ МОБИЛЬНОГО МЕНЮ =====
const mobileMenuStyles = `
    @media (max-width: 768px) {
        .nav-menu {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            flex-direction: column;
            padding: 1rem;
            transform: translateY(-100%);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .nav-menu.active {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }
        
        .nav-menu a {
            padding: 0.75rem 0;
            border-bottom: 1px solid #f0f0f0;
            width: 100%;
            text-align: center;
        }
        
        .nav-menu a:last-child {
            border-bottom: none;
        }
        
        .nav-mobile-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }
        
        .nav-mobile-toggle.active span:nth-child(2) {
            opacity: 0;
        }
        
        .nav-mobile-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -6px);
        }
    }
`;

// Добавляем стили для мобильного меню
const mobileStyleSheet = document.createElement('style');
mobileStyleSheet.textContent = mobileMenuStyles;
document.head.appendChild(mobileStyleSheet);

// ===== ОБРАБОТКА ОШИБОК =====
window.addEventListener('error', function(e) {
    console.error('JavaScript Error:', e.error);
});

// ===== LAZY LOADING ДЛЯ ИЗОБРАЖЕНИЙ =====
function initializeLazyLoading() {
    const images = document.querySelectorAll('img[loading="lazy"]');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src || img.src;
                    img.classList.remove('lazy');
                    observer.unobserve(img);
                }
            });
        });
        
        images.forEach(img => {
            imageObserver.observe(img);
        });
    }
}

// Инициализация lazy loading
initializeLazyLoading();

// ===== ПРОИЗВОДИТЕЛЬНОСТЬ =====
// Дебаунс для обработки скролла
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Оптимизированный обработчик скролла
const handleScroll = debounce(() => {
    const header = document.querySelector('.header');
    if (header) {
        if (window.scrollY > 100) {
            header.style.background = 'rgba(255, 255, 255, 0.98)';
        } else {
            header.style.background = 'rgba(255, 255, 255, 0.95)';
        }
    }
}, 10);

window.addEventListener('scroll', handleScroll);

// ===== АНАЛИТИКА СОБЫТИЙ =====
function trackEvent(eventName, eventData = {}) {
    // Google Analytics 4
    if (typeof gtag !== 'undefined') {
        gtag('event', eventName, eventData);
    }
    
    // Яндекс.Метрика
    if (typeof ym !== 'undefined') {
        ym('reachGoal', eventName, eventData);
    }
    
    console.log('Event tracked:', eventName, eventData);
}

// Отслеживание кликов по кнопкам пакетов
document.addEventListener('click', (e) => {
    if (e.target.matches('[data-package]')) {
        const packageType = e.target.getAttribute('data-package');
        trackEvent('package_click', {
            package_type: packageType
        });
    }
    
    if (e.target.matches('.btn-primary')) {
        trackEvent('cta_click', {
            button_text: e.target.textContent.trim()
        });
    }
});

// Отслеживание отправки формы (отключено для Яндекс.Форм)
// document.addEventListener('submit', (e) => {
//     if (e.target.id === 'contact-form') {
//         trackEvent('form_submit', {
//             form_type: 'contact'
//         });
//     }
// });

// ===== ОБРАБОТКА СКРОЛЛА ШАПКИ =====
function initializeHeaderScroll() {
    const header = document.querySelector('.header');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
}

// ===== АКТИВНОЕ МЕНЮ =====
function initializeActiveMenu() {
    const navLinks = document.querySelectorAll('.nav-menu a');
    const sections = document.querySelectorAll('section[id]');
    
    window.addEventListener('scroll', () => {
        let current = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            
            if (window.scrollY >= (sectionTop - 200)) {
                current = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    });
}

// ===== ПРОВЕРКА ПРОИЗВОДИТЕЛЬНОСТИ =====
if ('performance' in window) {
    window.addEventListener('load', () => {
        const perfData = performance.getEntriesByType('navigation')[0];
        const loadTime = perfData.loadEventEnd - perfData.loadEventStart;
        
        if (loadTime > 3000) {
            console.warn('Page load time is slow:', loadTime + 'ms');
        }
    });
}
