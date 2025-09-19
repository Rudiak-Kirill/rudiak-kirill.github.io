var width, height, largeHeader, canvas, ctx, points, target, animateHeader = true;

window.onload = () => {
    initHeader();
    initAnimation();
    addListeners();
};

function initHeader() {
    width = window.innerWidth;
    height = window.innerHeight;
    target = {x: width / 2, y: height / 2};

    largeHeader = document.getElementById('large-header');
    if (largeHeader) {
        largeHeader.style.height = height + 'px';
    }

    canvas = document.getElementById('demo-canvas');
    if (!canvas) return;
    canvas.width = width;
    canvas.height = height;
    ctx = canvas.getContext('2d');

    // create points
    points = [];
    for (var x = 0; x < width; x = x + width / 10) {
        for (var y = 0; y < height; y = y + height / 10) {
            var px = x + Math.random() * width / 20;
            var py = y + Math.random() * height / 20;
            var p = {x: px, originX: px, y: py, originY: py};
            points.push(p);
        }
    }

    // for each point find the 5 closest points
    for (var i = 0; i < points.length; i++) {
        var closest = [];
        var p1 = points[i];
        for (var j = 0; j < points.length; j++) {
            var p2 = points[j];
            if (!(p1 === p2)) {
                var placed = false;
                for (var k = 0; k < 5; k++) {
                    if (!placed) {
                        if (closest[k] === undefined) {
                            closest[k] = p2;
                            placed = true;
                        }
                    }
                }

                for (var k = 0; k < 5; k++) {
                    if (!placed) {
                        if (getDistance(p1, p2) < getDistance(p1, closest[k])) {
                            closest[k] = p2;
                            placed = true;
                        }
                    }
                }
            }
        }
        p1.closest = closest;
    }

    // assign a circle to each point
    for (var i in points) {
        points[i].circle = new Circle(points[i], 2 + Math.random() * 2, 'rgba(255,255,255,0.3)');
    }
}

function addListeners() {
    if (!('ontouchstart' in window)) {
        window.addEventListener('mousemove', mouseMove);
    }
    window.addEventListener('resize', resize);
}

function mouseMove(e) {
    var posx = 0;
    var posy = 0;
    if (e.pageX || e.pageY) {
        posx = e.pageX;
        posy = e.pageY;
    } else if (e.clientX || e.clientY) {
        posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
        posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
    }
    target.x = posx;
    target.y = posy;
}

function resize() {
    width = window.innerWidth;
    height = window.innerHeight;
    if (largeHeader) {
        largeHeader.style.height = height + 'px';
    }
    canvas.width = width;
    canvas.height = height;
}

function initAnimation() {
    animate();
    for (var i in points) {
        shiftPoint(points[i]);
    }
}

function animate() {
    if (animateHeader) {
        ctx.clearRect(0, 0, width, height);
        for (var i in points) {
            const dist = getDistance(target, points[i]);

            if (dist < 100000) { // увеличенное поле отображения
                for (var j in points[i].closest) {
                    const d2 = getDistance(target, points[i].closest[j]);
                    if (d2 < 100000) {
                        ctx.beginPath();
                        ctx.moveTo(points[i].x, points[i].y);
                        ctx.lineTo(points[i].closest[j].x, points[i].closest[j].y);
                        ctx.strokeStyle = 'rgba(156,217,249,0.2)';
                        ctx.stroke();
                    }
                }

                points[i].circle.draw();
            }
        }
    }
    requestAnimationFrame(animate);
}

function shiftPoint(p) {
    TweenLite.to(p, 4 + 2 * Math.random(), { // замедлена анимация
        x: p.originX - 50 + Math.random() * 100,
        y: p.originY - 50 + Math.random() * 100,
        ease: Circ.easeInOut,
        onComplete: function () {
            shiftPoint(p);
        }
    });
}

function Circle(pos, rad, color) {
    var _this = this;

    (function () {
        _this.pos = pos || null;
        _this.radius = rad || null;
        _this.color = color || null;
    })();

    this.draw = function () {
        if (!_this.pos) return;
        ctx.beginPath();
        ctx.arc(_this.pos.x, _this.pos.y, _this.radius, 0, 2 * Math.PI, false);
        ctx.fillStyle = _this.color;
        ctx.fill();
    };
}

function getDistance(p1, p2) {
    return Math.pow(p1.x - p2.x, 2) + Math.pow(p1.y - p2.y, 2);
}
