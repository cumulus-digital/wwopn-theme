/* global wp */
(function($, wp, window, undefined) {

	var fullBrowserWidth = {
		name: "full-browser-width",
		label: "Full Browser Width"
	};

	var fullContentWidth = {
		name: "full-content-width",
		label: "Full Content Width"
	};

	$(function(){
	
		var registeredBlocks = wp.blocks.getBlockTypes(),
			actionBlocks = [];
		registeredBlocks.forEach(function(block) {
			if (
				block.supports &&
				block.supports.hasOwnProperty("inserter") &&
				block.supports.inserter === false
			) {
				return;
			}
			wp.blocks.registerBlockStyle(block.name, fullBrowserWidth);
			wp.blocks.registerBlockStyle(block.name, fullContentWidth);
		});
	
	});

}(jQuery, wp, window.self));