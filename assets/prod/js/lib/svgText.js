"use strict";!function(t,e,s,a){function n(e,s){this.el=e,this.options=t.extend({},o,s),this._defaults=o,this._name=l,this.init()}var l="svgText",o={loaderHolderClass:"stext_loader",compiledClass:"st-comp",wordClass:"st-word",spaceClass:"st-space",orphanWrapClass:"st-orphan",originalTextClass:"st-original",processingClass:"st-processing",convertedClass:"st-converted",failClass:"st-failed",compiledElement:"span",wordElement:"span",spaceElement:"span",orphanWrapElement:"span",originalTextElement:"span",heightBasis:"1.15em",letterCountMap:[8,9,11,14,16]},r=[];n.prototype={init:function e(){var s=this,a=t(this.el),n=a.data("st-src"),l;(a.addClass(s.options.processingClass),r.indexOf(n)<0)&&(t('<div class="'+this.options.loaderHolderClass+'">').css({height:0,overflow:"hidden"}).attr("data-src",n).appendTo("body").load(n,(function(t,e){"error"==t&&a.removeClass(s.options.processingClass).addClass(s.options.failClass)})),r.push(n));s.generateSText(s.el)},generateSText:function e(s,a){var n=this,l=t(s),o=l.data("st-src"),r=l.attr("class"),i=n.createEl(n.options.compiledElement),p,d,c,h=(new DOMParser).parseFromString("<!doctype html><body>"+l.text(),"text/html").body.textContent.trim().split(/[\s\t\n\r]+/),g=h.length,m=0;l.attr("data-wc",g);var u=t("."+n.options.loaderHolderClass+'[data-src="'+o+'"] svg'),C=u.data("prefix"),f=u.data("zflow")||"+";if(u.length&&C){var w,v,x,E;if(i.className=n.options.compiledClass,console.log("Words",h),h.forEach((function(t,e){var s=t.split(""),a=s.length,l=n.createEl(n.options.wordElement),o=g-e;"+"==f&&(o=g+e),m+=a,l.className=n.options.wordClass,l.style.zIndex=o,console.log("Letters",s),s.forEach((function(t,e){var s=t=t.toUpperCase();t.match(/[A-Z0-9]/)||(s="_x"+t.charCodeAt(0).toString(16).toUpperCase()+"_"),console.log("Using letter",s);var o="0 0 100 100",i="#"+C+"_"+s,p=u.find(i);if(p.length){var d=(o=p.attr("viewBox")).split(" ");if(d.length<3)throw"Invalid viewbox on symbol '"+t+"'";var c=d[2]/d[3],h="http://www.w3.org/2000/svg",g=n.createElNS(h,"svg");g.setAttribute("data-l",t),g.setAttribute("data-w",d[3]),g.setAttributeNS("http://www.w3.org/2000/xmlns/","xmlns:xlink","http://www.w3.org/1999/xlink");var m=n.createElNS(h,"use");m.setAttributeNS("http://www.w3.org/1999/xlink","xlink:href","#"+C+"_"+s),m.setAttribute("class",r);var w=a-e;"+"==f&&(w=a+e),g.style.zIndex=w,g.style.width="calc( "+n.options.heightBasis+" * "+c+" )",g.appendChild(m),l.appendChild(g),0===e&&l.setAttribute("data-fl",t),e===a-1&&l.setAttribute("data-ll",t)}}));var p=n.createEl(n.options.originalTextElement);if(p.className=n.options.originalTextClass,p.innerText=t,l.appendChild(p),i.appendChild(l),e+1<g){var d=n.createEl(n.options.spaceElement);d.setAttribute("class",n.options.spaceClass);var c=n.createEl(n.options.originalTextElement);c.className=n.options.originalTextClass,c.innerHTML="&nbsp;",d.appendChild(c),i.appendChild(d)}})),h.length>2)if(h[h.length-1].split("").length<5)i=n.wrapWords(i);else h[h.length-2].split("").length<5&&(i=n.wrapWords(i));var b=0;n.options.letterCountMap.forEach((function(t,e){m>=t&&(b=e)})),l.attr("data-lcl",b).attr("data-tlc",m).html(i).removeClass(n.options.processingClass).addClass(n.options.convertedClass)}else setTimeout((function(){n.generateSText(s,n.options)}),50)},wrapWords:function e(s){var a=this,n=t(s),l=n.children().slice(-3),o=a.createEl(a.options.orphanWrapElement);return o.className=a.options.orphanWrapClass,o.setAttribute("data-fl",l.first().data("fl")),l.wrapAll(o),n},createEl:function t(s){return e.document.createElement(s)},createElNS:function t(s,a){return e.document.createElementNS(s,a)}},t.fn[l]=function(e){return this.each((function(){t.data(this,"plugin_"+l)||t.data(this,"plugin_"+l,new n(this,e))}))}}(jQuery,window,document);
//# sourceMappingURL=svgText.js.map