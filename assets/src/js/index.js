if ( ! $ || ! jQuery) {
	alert('jQuery must be included in theme.');
}

// Transform svgText elements
$('.stext').svgText();

$('iframe').on('load', function(){
	this.className += ' loaded';
});