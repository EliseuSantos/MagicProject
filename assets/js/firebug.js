/******************************************\
| * Autor: Eliseu dos Santos               |
| * Git:   https://github.com/EliseuSantos |
| * Email:   s.eliseu.santos@gmail.com     |
\******************************************/
'use strict';
function fireBug(conf) {
  this.conf = conf;
  this.form_data;
  this.loading;
  this.progresso;
  this.xhr;
  this.dados;
  this.arquivos;
  this.arquivo;
  this.init();
}

fireBug.prototype.init = function () {
  document.querySelector('.dropdown-menu-form').addEventListener('click', function(e) {
    e.stopPropagation();
  });
  this.bind();
};

fireBug.prototype.url = function (nodeList) {
  if (!nodeList.length) {
    return [];
  }
  var attrName = 'href';
  if (nodeList[0].__proto__ === HTMLImageElement.prototype
  || nodeList[0].__proto__ === HTMLScriptElement.prototype) {
    attrName = 'src';
  }
  nodeList = [].map.call(nodeList, function (el, i) {
    var attr = el.getAttribute(attrName);
    if (!attr) {
      return;
    }
    var absURL = /^(https?|data):/i.test(attr);
    if (absURL) {
      return el;
    } else {
      return el;
    }
  });
  return nodeList;
};

fireBug.prototype.scrollTop = function (data) {
  window.addEventListener('DOMContentLoaded', function (e) {
      var scrollX = document.documentElement.dataset.scrollX || 0;
      var scrollY = document.documentElement.dataset.scrollY || 0;
      window.scrollTo(scrollX, scrollY);
  });
}

fireBug.prototype.bind = function () {
  var _this = this;
  document.querySelector(this.conf.seletor).addEventListener('click', function() {
    _this.arquivo = window.URL.createObjectURL(_this.printScreen());
    window.open(_this.arquivo);
  });

}

fireBug.prototype.printScreen = function (data) {
  this.url(document.images);
  this.url(document.querySelectorAll("link[rel='stylesheet']"));
  var screenshot = document.documentElement.cloneNode(true);
  var b = document.createElement('base');
  b.href = document.location.protocol + '//' + location.host;
  var head = screenshot.querySelector('head');
  head.insertBefore(b, head.firstChild);
  screenshot.style.pointerEvents = 'none';
  screenshot.style.overflow = 'hidden';
  screenshot.style.webkitUserSelect = 'none';
  screenshot.style.mozUserSelect = 'none';
  screenshot.style.msUserSelect = 'none';
  screenshot.style.oUserSelect = 'none';
  screenshot.style.userSelect = 'none';
  screenshot.dataset.scrollX = window.scrollX;
  screenshot.dataset.scrollY = window.scrollY;
  var script = document.createElement('script');
  script.textContent = '(' + this.scrollTop.toString() + ')();';
  screenshot.querySelector('body').appendChild(script);
  var blob = new Blob([screenshot.outerHTML], {
      type: 'text/html'
  });
  return blob;
}

fireBug.prototype.ajaxRequest = function () {
  var _this = this;
  this.form_data = new FormData();
  this.form_data.append("file", _this.arquivo);
  this.xhr = new XMLHttpRequest();
  this.xhr.open('POST', this.conf.url, true);

  this.xhr.onload = function() {
    if (this.status == 200) {
      var data = JSON.parse(this.response);
      if(data) {
        _this.perfil.src = data;
      }
    };
  };
  this.xhr.send(_this.form_data);
};