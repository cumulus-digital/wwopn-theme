/*!
 * jQuery lightweight plugin boilerplate
 * Original author: @ajpiano
 * Further changes, comments: @addyosmani
 * Licensed under the MIT license
 */

(function ( $, window, document, undefined ) {

	var pluginName = "svgText",
		defaults = {
			loaderHolderClass: "stext_loader",
			compiledClass: 'st-comp',
			wordClass: 'st-word',
			spaceClass: 'st-space',
			orphanWrapClass: 'st-orphan',
			originalTextClass: 'st-original',
			processingClass: 'st-processing',
			convertedClass: 'st-converted',
			failClass: 'st-failed',
			compiledElement: 'span',
			wordElement: 'span',
			spaceElement: 'span',
			orphanWrapElement: 'span',
			originalTextElement: 'span',
			heightBasis: '1.15em',
			letterCountMap: [
				8, 9, 11, 14, 16
			]
		},
		loader_cache = [];

	// The actual plugin constructor
	function Plugin( element, options ) {
		this.el = element;

		// jQuery has an extend method that merges the
		// contents of two or more objects, storing the
		// result in the first object. The first object
		// is generally empty because we don't want to alter
		// the default options for future instances of the plugin
		this.options = $.extend( {}, defaults, options) ;

		this._defaults = defaults;
		this._name = pluginName;

		this.init();
	}

	Plugin.prototype = {

		init: function() {
			// Place initialization logic here
			// You already have access to the DOM element and
			// the options via the instance, e.g. this.element
			// and this.options
			// you can add more functions like the one below and
			// call them like so: this.yourOtherFunction(this.element, this.options).
			
			var me = this,
				$el = $(this.el),
				src = $el.data('st-src');

			$el.addClass(me.options.processingClass);

			if (loader_cache.indexOf(src) < 0) {
				var loader = $('<div class="' + this.options.loaderHolderClass +'">');
				loader.css({
						height: 0,
						overflow: 'hidden'
					})
					.attr('data-src', src)
					.appendTo('body')
					.load(
						src,
						function(resp, status) {
							if (resp == 'error') {
								$el.removeClass(me.options.processingClass)
									.addClass(me.options.failClass);
							}
						}
					);
				loader_cache.push(src);
			}
			me.generateSText(me.el);

		},

		generateSText: function(el, options) {
			var me = this,
				$el = $(el),
				src = $el.data('st-src'),
				classes = $el.attr('class'),
				compiled = me.createEl(me.options.compiledElement);

			// decode text
			var parser = new DOMParser,
				dom = parser.parseFromString(
			    '<!doctype html><body>' + $el.text(),
			    'text/html');
			    
			var text = dom.body.textContent,
				words = text.trim().split(/[\s\t\n\r]+/),
				word_count = words.length,
				total_letter_count = 0;

			$el.attr('data-wc', word_count);

			var loader = $('.' + me.options.loaderHolderClass + '[data-src="' + src + '"] svg'),
				prefix = loader.data('prefix'),
				zflow = loader.data('zflow') || '+';

			if (
				! loader.length ||
				! prefix
			) {
				// SVG hasn't finished loading, wait it out
				setTimeout(function() {
					me.generateSText(el, me.options);
				}, 50);
				return;
			}

			compiled.className = me.options.compiledClass;

			console.log("Words", words);

			words.forEach(function(word, i) {
				var letters = word.split(''),
					letter_count = letters.length,
					wordEl = me.createEl(me.options.wordElement),
					zIndex = word_count - i;

				if (zflow == '+') {
					zIndex = word_count + i;
				}

				total_letter_count += letter_count;

				wordEl.className = me.options.wordClass;
				wordEl.style.zIndex = zIndex;

				//console.log("Letters", letters);

				letters.forEach(function(letter, i) {
					letter = letter.toUpperCase();

					var useLetter = letter;

					// if letter is not alphanumeric, use hex code
					if ( ! letter.match(/[A-Z0-9]/)) {
						useLetter = '_x' + letter.charCodeAt(0).toString(16).toUpperCase() + '_';
					}

					//console.log("Using letter", useLetter);

					var viewBox = "0 0 100 100",
						def = '#' + prefix + '_' + useLetter,
						symbol = loader.find(def);
					if (symbol.length) {
						viewBox = symbol.attr('viewBox');
					} else {
						//console.log('Could not find symbol', def, symbol);
						return;
					}
					
					var dimensions = viewBox.split(' ');
					if (dimensions.length < 3) {
						//console.log('Invalid viewbox on symbol', letter);
						throw "Invalid viewbox on symbol '" + letter + "'"; 
					}

					var ratio = (dimensions[2]/dimensions[3]);

					var xmlns = "http://www.w3.org/2000/svg",
						svg = me.createElNS(xmlns, 'svg');
					svg.setAttribute('data-l', letter);
					svg.setAttribute('data-w', dimensions[3]);
					svg.setAttributeNS(
						"http://www.w3.org/2000/xmlns/",
						"xmlns:xlink",
						"http://www.w3.org/1999/xlink"
					);

					var use = me.createElNS(xmlns, 'use');
					use.setAttributeNS(
						'http://www.w3.org/1999/xlink',
						'xlink:href',
						'#' + prefix + '_' + useLetter
					);
					use.setAttribute('class', classes);

					var zIndex = letter_count - i;
					if (zflow == '+') {
						zIndex = letter_count + i;
					}

					svg.style.zIndex = zIndex;
					svg.style.width = 'calc( ' + 
						me.options.heightBasis + 
						' * ' + ratio + ' )';

					svg.appendChild(use);

					wordEl.appendChild(svg);

					if (i === 0) {
						wordEl.setAttribute('data-fl', letter);
					}
					if (i === letter_count - 1) {
						wordEl.setAttribute('data-ll', letter);
					}

				});

				var original = me.createEl(me.options.originalTextElement);
					original.className = me.options.originalTextClass;
					original.innerText = word;
				wordEl.appendChild(original);

				compiled.appendChild(wordEl);

				if (i + 1 < word_count) {
					var spacer = me.createEl(me.options.spaceElement);
					spacer.setAttribute('class', me.options.spaceClass);

					var space = me.createEl(me.options.originalTextElement);
						space.className = me.options.originalTextClass;
						space.innerHTML = '&nbsp;';

					spacer.appendChild(space);

					compiled.appendChild(spacer);
				}
			});

			// If last word is short, wrap the last two to
			// prevent ugly orphans
			if (words.length > 2) {
				var last_word = words[words.length-1],
					last_letters = last_word.split('');

				if (last_letters.length < 5) {
					
					compiled = me.wrapWords(compiled);

				} else {

					// Last word wasn't short, but is the one before it?
					var next_last_word = words[words.length-2],
						next_last_letters = next_last_word.split('');

					if (next_last_letters.length < 5) {
						compiled = me.wrapWords(compiled);
					}
				}
			}

			var letter_class = 0;
			me.options.letterCountMap.forEach(function(n, i) {
				if (total_letter_count >= n) {
					letter_class = i;
				}
			});

			$el
				.attr('data-lcl', letter_class)
				.attr('data-tlc', total_letter_count)
				.html(compiled)
				.removeClass(me.options.processingClass)
				.addClass(me.options.convertedClass);

		},

		wrapWords: function(compiled) {
			var me = this,
				$compiled = $(compiled),
				$orphans = $compiled.children().slice(-3),
				wrap = me.createEl(me.options.orphanWrapElement);

			wrap.className = me.options.orphanWrapClass;
			wrap.setAttribute('data-fl', $orphans.first().data('fl'));

			$orphans.wrapAll(wrap);
			return $compiled;			
		},

		createEl: function(type) {
			return window.document.createElement(type);
		},

		createElNS: function(ns, type) {
			return window.document.createElementNS(ns, type);
		}
	};

	// A really lightweight plugin wrapper around the constructor,
	// preventing against multiple instantiations
	$.fn[pluginName] = function ( options ) {
		return this.each(function () {
			if (!$.data(this, "plugin_" + pluginName)) {
				$.data(this, "plugin_" + pluginName,
				new Plugin( this, options ));
			}
		});
	};

})( jQuery, window, document );