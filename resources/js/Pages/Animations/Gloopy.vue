<!--credit to codepen https://codepen.io/tmrDevelops/pen/WoVaQz
Responds to mousemoves / touchswipes.
Click / Tap && hold to repel, release for bounce back.

*If on a small/mobile screen, reduce 'this.num' val in JS to ~200 for best experience (less clutter).
!-->
<template>
<canvas id="canv"></canvas>
<h1>GloppyGoop</h1>
<svg xmlns="http://www.w3.org/2000/svg" version="1.1">
  <defs>
    <filter id="goop">
      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 60 -9"/>
    </filter>
  </defs>
</svg>
</template>
<style>
@import url('https://fonts.googleapis.com/css?family=Chicle');
*{
  margin: 0;
  padding: 0
}

body{
  background: hsla(209, 95%, 8%, 1);
  width:100%;
  margin:0;
  cursor:pointer;
}
h1{
  left: 50%;
  position: absolute;
  top: 50%;
  font-size:5rem;
  color:hsla(209, 95%, 20%, .5);
  transform: translate( -50%, -50%);
  text-shadow: 1px 4px 6px hsla(209, 95%, 8%, 1), 0 0 0 hsla(0,0%,0%,1), 1px 4px 6px hsla(209, 95%, 8%, 1);
  font-family: 'Chicle', cursive;
  z-index:1;
}
canvas{
  position: absolute;
  -webkit-filter: url("#goop");
  filter: url("#goop");
  z-index:-1;
}

</style>
<script setup>
var c = document.getElementById('canv'),
    $ = c.getContext('2d'),
    att_ = true,
    fric = 0.009,
    dots_;

var w = c.width = window.innerWidth;
var h = c.height = window.innerHeight;
$.globalCompositeOperation = 'lighter';

var Sys = function(w, h) {
  this.num = 400;
  this.dots_ = [];
  this.rep_ = false;
  this.w = w;
  this.h = h;
  this.ms = {
    x: 0,
    y: 0
  };
};

Sys.prototype.go = function() {
  for (var i = 0; i < this.num; i++) {
    this.dots_.push(new Dot());
  }
  this.spawn();
};

Sys.prototype.spawn = function() {
  var p;
  for (var i = 0; i < this.num; i++) {
    p = this.dots_[i];
    p.x = p.ax = Math.random() * this.w;
    p.y = p.ay = Math.random() * this.h;
  }
};

Sys.prototype.step = function() {
  var p,dx,dy,_sqd,_frc,_ang,
      msX = this.ms.x,
      msY = this.ms.y;

  for (var i = 0; i < this.num; i++) {
    p = this.dots_[i];
    dx = msX - p.ax;
    dy = msY - p.ay;
    _sqd = dx * dx + dy * dy;
    if (_sqd < p.minSqd) {
      dx = msX - p.x;
      dy = msY - p.y;
      _sqd = dx * dx + dy * dy;
      _frc = _sqd / p.minSqd;
      _frc = _frc < 0 ? 0 : _frc > 1 ? 1 : _frc;
      _ang = Math.atan2(dy, dx);
      if (this.rep_) {
        _frc = -_frc;
      }
      p.fx += Math.cos(_ang) * _frc;
      p.fy += Math.sin(_ang) * _frc;
    }
    p.fx += (p.ax - p.x) * fric * p.mass;
    p.fy += (p.ay - p.y) * fric * p.mass;
    p.vx += p.fx / p.mass;
    p.vy += p.fy / p.mass;
    p.x += p.vx;
    p.y += p.vy;
    p.vx *= .99;
    p.vy *= .99;
    p.fx = p.fy = 0;
  }
};

Sys.prototype.draw = function($) {
var p;
  for (var i = 0; i < this.num; i++) {
    p = this.dots_[i];
    $.beginPath();
    $.arc(p.x, p.y, p.mass * 8, 0, Math.PI * 2, false);
    $.closePath();
    $.fillStyle = 'hsla(' + i * 5 + ',70%, 50%,1)';
    $.fill();
  }
};

var Dot = function(x, y) {
  this.x = this.ax = x || 0;
  this.y = this.ay = y || 0;
  this.fx = 0;
  this.fy = 0;
  this.vx = 0;
  this.vy = 0;
  this.mass = 0.25 + Math.random() * 1.25;
  this.minDist = 100 + Math.random() * 100;
  this.minSqd = this.minDist * this.minDist;
};
var upd = function() {
  if (att_ = !att_) {
    dots_.step();
  } else {
    c.width = c.width;
    dots_.draw($);
  }
};

var run = function() {
  window.requestAnimationFrame(run);
  upd();
}
dots_ = new Sys(c.width, c.height);
dots_.go();
run();

/*_________Events_________*/
window.addEventListener('resize', function() {
  c.width = dots_.w = window.innerWidth;
  c.height = dots_.h = window.innerHeight;
  dots_.spawn();
});

window.addEventListener('mousedown', function() {
  dots_.rep_ = !dots_.rep_;
});

window.addEventListener('mouseup', function() {
  dots_.rep_ = !dots_.rep_;
});

window.addEventListener('mousemove', function(e) {
  dots_.ms.x = e.clientX;
  dots_.ms.y = e.clientY;
});
window.addEventListener('touchmove', function(e) {
  e.preventDefault();
  dots_.ms.x = e.touches[0].clientX;
  dots_.ms.y = e.touches[0].clientY;
});
window.addEventListener('touchstart', function(e) {
  e.preventDefault();
  dots_.ms.x = e.touches[0].clientX;
  dots_.ms.y = e.touches[0].clientY;
  dots_.rep_ = !dots_.rep_;
});
window.addEventListener('touchend', function(e) {
  e.preventDefault();
  dots_.rep_ = !dots_.rep_;
});


console.log('With ❤ Always, @tmrDevelops');
</script>
