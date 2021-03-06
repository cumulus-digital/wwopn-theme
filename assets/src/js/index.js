if ( ! $ || ! jQuery) {
	alert('jQuery must be included in theme.');
}

// Transform svgText elements
$('.stext').svgText();

// Note iframes that have finished loading
$('iframe').on('load', function(){
	this.className += ' loaded';
});

// Load lazyload.js
(function(w, d){
    var b = d.getElementsByTagName('body')[0];
    var s = d.createElement("script"); 
    s.async = true; // This includes the script as async. See the "recipes" section for more information about async loading of LazyLoad.
    s.src = "https://cdn.jsdelivr.net/npm/vanilla-lazyload@15.1.1/dist/lazyload.min.js";
    w.lazyLoadOptions = {
    	elements_selector: 'img[data-src]'
    };
    b.appendChild(s);
}(window, document));

// Allow .tgmp-onair class links to open TGMP onair tray
$(function() {
    if (window.self.tgmp) {
        $('a.tgmp_onair, .tgmp_onair a').click(function(e) {
            e.preventDefault();
            window.self.tgmp.onair();
        });
    }
});
