!function(e){function t(r){if(n[r])return n[r].exports;var o=n[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,t),o.l=!0,o.exports}var n={};t.m=e,t.c=n,t.d=function(e,n,r){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:r})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=10)}({10:function(e,t,n){e.exports=n(11)},11:function(e,t){var n=document.querySelectorAll(".min-item"),r=document.querySelectorAll(".unit"),o=document.querySelectorAll("#chart-carousel-index span"),i=document.querySelectorAll("#daily-pics-carousel-index span"),c=function(e,t,n){var r=this;this.counter=0,this.index=e,this.items=t,this.startX=0,this.displayValue=n,this.addEventListenersForItems=function(){this.items.forEach(function(e){e.addEventListener("touchstart",o),e.addEventListener("touchend",o)})};var o=function(e){if(window.innerWidth<=800)if("touchstart"===e.type)r.startX=e.touches[0].clientX;else if("touchend"===e.type){var t=e.changedTouches[0].clientX;r.index[r.counter].style.backgroundColor="rgba(242, 242, 242, 0.39)",r.items[r.counter].style.display="none",r.startX>t?r.counter>=r.index.length-1?r.counter=0:r.counter++:r.startX<t&&(r.counter<=0?r.counter=r.index.length-1:r.counter--),r.items[r.counter].style.display=r.displayValue,r.index[r.counter].style.backgroundColor="#0D7070"}}};new c(o,n,"block").addEventListenersForItems();new c(i,r,"flex").addEventListenersForItems()}});