// ===== АДАПТИРОВАННАЯ АНИМАЦИЯ ЧАСТИЦ ДЛЯ SEO-САЙТА =====
class ParticleBackground {
    constructor() {
        this.canvas = null;
        this.ctx = null;
        this.points = [];
        this.target = { x: 0, y: 0 };
        this.animateHeader = true;
        this.animationId = null;
        
        // Оптимизированные настройки для SEO-сайта
        this.config = {
            particleCount: 50, // Меньше частиц для лучшей производительности
            connectionDistance: 120,
            particleRadius: 2,
            lineOpacity: 0.15,
            particleOpacity: 0.4,
            animationSpeed: 0.02
        };
        
        this.init();
    }
    
    init() {
        // Ждем загрузки DOM
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.setup());
        } else {
            this.setup();
        }
    }
    
    setup() {
        this.createCanvas();
        this.createParticles();
        this.addEventListeners();
        this.startAnimation();
    }
    
    createCanvas() {
        // Создаем canvas элемент
        this.canvas = document.createElement('canvas');
        this.canvas.id = 'particle-canvas';
        this.canvas.style.cssText = `
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
            opacity: 0.6;
        `;
        
        // Вставляем canvas в hero секцию
        const hero = document.querySelector('.hero');
        if (hero) {
            hero.style.position = 'relative';
            hero.insertBefore(this.canvas, hero.firstChild);
            
            // Обновляем z-index контента
            const heroContent = hero.querySelector('.hero-content');
            if (heroContent) {
                heroContent.style.position = 'relative';
                heroContent.style.zIndex = '2';
            }
        }
        
        this.resizeCanvas();
    }
    
    createParticles() {
        this.points = [];
        const cols = Math.ceil(Math.sqrt(this.config.particleCount));
        const rows = Math.ceil(this.config.particleCount / cols);
        
        const stepX = this.canvas.width / (cols + 1);
        const stepY = this.canvas.height / (rows + 1);
        
        for (let i = 0; i < this.config.particleCount; i++) {
            const col = i % cols;
            const row = Math.floor(i / cols);
            
            const x = stepX * (col + 1) + (Math.random() - 0.5) * stepX * 0.8;
            const y = stepY * (row + 1) + (Math.random() - 0.5) * stepY * 0.8;
            
            this.points.push({
                x: x,
                y: y,
                originX: x,
                originY: y,
                vx: (Math.random() - 0.5) * 0.5,
                vy: (Math.random() - 0.5) * 0.5,
                radius: this.config.particleRadius + Math.random() * 2
            });
        }
    }
    
    addEventListeners() {
        // Отслеживание мыши
        document.addEventListener('mousemove', (e) => {
            this.target.x = e.clientX;
            this.target.y = e.clientY;
        });
        
        // Обработка изменения размера окна
        window.addEventListener('resize', () => {
            this.resizeCanvas();
            this.createParticles();
        });
        
        // Пауза анимации при потере фокуса (экономия ресурсов)
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                this.pauseAnimation();
            } else {
                this.resumeAnimation();
            }
        });
    }
    
    resizeCanvas() {
        if (!this.canvas) return;
        
        const rect = this.canvas.getBoundingClientRect();
        this.canvas.width = rect.width;
        this.canvas.height = rect.height;
        this.ctx = this.canvas.getContext('2d');
    }
    
    startAnimation() {
        if (this.animationId) return;
        
        const animate = () => {
            if (this.animateHeader && this.ctx) {
                this.updateParticles();
                this.drawParticles();
                this.drawConnections();
            }
            this.animationId = requestAnimationFrame(animate);
        };
        
        animate();
    }
    
    pauseAnimation() {
        this.animateHeader = false;
    }
    
    resumeAnimation() {
        this.animateHeader = true;
    }
    
    updateParticles() {
        this.points.forEach(point => {
            // Плавное движение к исходной позиции с небольшими колебаниями
            const dx = point.originX - point.x;
            const dy = point.originY - point.y;
            
            point.x += dx * this.config.animationSpeed + point.vx;
            point.y += dy * this.config.animationSpeed + point.vy;
            
            // Ограничиваем скорость
            point.vx *= 0.98;
            point.vy *= 0.98;
            
            // Иногда добавляем случайное движение
            if (Math.random() < 0.01) {
                point.vx += (Math.random() - 0.5) * 0.2;
                point.vy += (Math.random() - 0.5) * 0.2;
            }
            
            // Держим частицы в пределах экрана
            point.x = Math.max(0, Math.min(this.canvas.width, point.x));
            point.y = Math.max(0, Math.min(this.canvas.height, point.y));
        });
    }
    
    drawParticles() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        
        // Рисуем частицы
        this.points.forEach(point => {
            const distanceToMouse = this.getDistance(this.target, point);
            const opacity = Math.max(0, this.config.particleOpacity - distanceToMouse / 300);
            
            if (opacity > 0) {
                this.ctx.beginPath();
                this.ctx.arc(point.x, point.y, point.radius, 0, Math.PI * 2);
                this.ctx.fillStyle = `rgba(255, 255, 255, ${opacity})`;
                this.ctx.fill();
            }
        });
    }
    
    drawConnections() {
        // Рисуем связи между близкими частицами
        for (let i = 0; i < this.points.length; i++) {
            for (let j = i + 1; j < this.points.length; j++) {
                const distance = this.getDistance(this.points[i], this.points[j]);
                
                if (distance < this.config.connectionDistance) {
                    const opacity = this.config.lineOpacity * (1 - distance / this.config.connectionDistance);
                    
                    if (opacity > 0.01) {
                        this.ctx.beginPath();
                        this.ctx.moveTo(this.points[i].x, this.points[i].y);
                        this.ctx.lineTo(this.points[j].x, this.points[j].y);
                        this.ctx.strokeStyle = `rgba(255, 255, 255, ${opacity})`;
                        this.ctx.lineWidth = 1;
                        this.ctx.stroke();
                    }
                }
            }
        }
        
        // Рисуем связи с курсором мыши
        this.points.forEach(point => {
            const distance = this.getDistance(this.target, point);
            
            if (distance < this.config.connectionDistance * 1.5) {
                const opacity = this.config.lineOpacity * 0.5 * (1 - distance / (this.config.connectionDistance * 1.5));
                
                if (opacity > 0.01) {
                    this.ctx.beginPath();
                    this.ctx.moveTo(point.x, point.y);
                    this.ctx.lineTo(this.target.x, this.target.y);
                    this.ctx.strokeStyle = `rgba(255, 255, 255, ${opacity})`;
                    this.ctx.lineWidth = 0.5;
                    this.ctx.stroke();
                }
            }
        });
    }
    
    getDistance(p1, p2) {
        const dx = p1.x - p2.x;
        const dy = p1.y - p2.y;
        return Math.sqrt(dx * dx + dy * dy);
    }
    
    // Метод для остановки анимации (для экономии ресурсов)
    destroy() {
        if (this.animationId) {
            cancelAnimationFrame(this.animationId);
            this.animationId = null;
        }
        
        if (this.canvas && this.canvas.parentNode) {
            this.canvas.parentNode.removeChild(this.canvas);
        }
    }
}

// ===== ИНИЦИАЛИЗАЦИЯ =====
let particleBackground = null;

// Инициализируем только на десктопе и если пользователь не предпочитает уменьшенную анимацию
function initParticleBackground() {
    // Проверяем предпочтения пользователя
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }
    
    // Проверяем, что это не мобильное устройство
    if (window.innerWidth < 768) {
        return;
    }
    
    // Проверяем производительность устройства
    if (navigator.hardwareConcurrency && navigator.hardwareConcurrency < 4) {
        return;
    }
    
    particleBackground = new ParticleBackground();
}

// Инициализируем с задержкой, чтобы не блокировать загрузку основного контента
setTimeout(initParticleBackground, 1000);

// Экспортируем для возможного использования
window.ParticleBackground = ParticleBackground;
