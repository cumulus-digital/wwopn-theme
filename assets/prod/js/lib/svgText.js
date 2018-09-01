"use strict";!function($,t,e,s){function a(t,e){this.el=t,this.options=$.extend({},i,e),this._defaults=i,this._name=n,this.init()}var n="svgText",i={loaderHolderClass:"stext_loader",compiledClass:"st-comp",wordClass:"st-word",spaceClass:"st-space",orphanWrapClass:"st-orphan",originalTextClass:"st-original",processingClass:"st-processing",convertedClass:"st-converted",failClass:"st-failed",compiledElement:"span",wordElement:"span",spaceElement:"span",letterElement:"span",orphanWrapElement:"span",originalTextElement:"span",heightBasis:"1.15em"},l=[];a.prototype={init:function t(){var e=this,s=$(this.el),a=s.data("st-src");if(s.addClass(e.options.processingClass),l.indexOf(a)<0){$('<div class="'+this.options.loaderHolderClass+'">').css({height:0,overflow:"hidden"}).attr("data-src",a).appendTo("body").load(a,function(t,a){"error"==t&&s.removeClass(e.options.processingClass).addClass(e.options.failClass)}),l.push(a)}e.generateSText(e.el)},generateSText:function t(e,s){var a=this,n=$(e),i=n.data("st-src"),l=n.attr("class"),o=a.createEl(a.options.compiledElement),r=new DOMParser,p=r.parseFromString("<!doctype html><body>"+n.text(),"text/html"),d=p.body.textContent,c=d.trim().split(/[\s\t\n\r]+/),h=c.length,m=$("."+a.options.loaderHolderClass+'[data-src="'+i+'"] svg'),g=m.data("prefix"),u=m.data("zflow")||"+";if(!m.length||!g)return void setTimeout(function(){a.generateSText(e,a.options)},50);(o.className=a.options.compiledClass,c.forEach(function(t,e){var s=t.split(""),n=s.length,i=a.createEl(a.options.wordElement),r=h-e;"+"==u&&(r=h+e),i.className=a.options.wordClass,i.style.zIndex=r,s.forEach(function(t,e){t=t.toUpperCase();var s=t;t.match(/[A-Z0-9]/)||(s="_x"+t.charCodeAt(0).toString(16).toUpperCase()+"_");var o="0 0 100 100",r="#"+g+"_"+s,p=m.find(r);if(p.length){o=p.attr("viewBox");var d=o.split(" ");if(d.length<3)throw"Invalid viewbox on symbol '"+t+"'";var c=d[2]/d[3],h="http://www.w3.org/2000/svg",C=a.createElNS(h,"svg");C.setAttribute("data-letter",t),C.setAttribute("data-width",d[3]),C.setAttributeNS("http://www.w3.org/2000/xmlns/","xmlns:xlink","http://www.w3.org/1999/xlink");var w=a.createElNS(h,"use");w.setAttributeNS("http://www.w3.org/1999/xlink","xlink:href","#"+g+"_"+s),w.setAttribute("class",l);var f=n-e;"+"==u&&(f=n+e),C.style.zIndex=f,C.style.width="calc( "+a.options.heightBasis+" * "+c+" )",C.appendChild(w),i.appendChild(C),0===e&&i.setAttribute("data-first_letter",t),e===n-1&&i.setAttribute("data-last_letter",t)}});var p=a.createEl(a.options.originalTextElement);if(p.className=a.options.originalTextClass,p.innerText=t,i.appendChild(p),o.appendChild(i),e+1<h){var d=a.createEl(a.options.spaceElement);d.setAttribute("class",a.options.spaceClass);var c=a.createEl(a.options.originalTextElement);c.className=a.options.originalTextClass,c.innerHTML="&nbsp;",d.appendChild(c),o.appendChild(d)}}),c[c.length-1].split("").length<5)?o=a.wrapWords(o):c[c.length-2].split("").length<5&&(o=a.wrapWords(o));n.html(o).removeClass(a.options.processingClass).addClass(a.options.convertedClass)},wrapWords:function t(e){var s=this,a=$(e),n=a.slice(-1).remove(),i=s.createEl(s.options.orphanWrapElement);return i.className=s.options.orphanWrapClass,a.children().slice(-3).wrapAll(i),a},createEl:function e(s){return t.document.createElement(s)},createElNS:function e(s,a){return t.document.createElementNS(s,a)}},$.fn[n]=function(t){return this.each(function(){$.data(this,"plugin_"+n)||$.data(this,"plugin_"+n,new a(this,t))})}}(jQuery,window,document);
//# sourceMappingURL=./svgText.js.map