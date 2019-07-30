/* global wp */
(function($, wp, window, undefined) {

	var customStyles = [
		{
			name: "full-content-width",
			label: "Full Content Width"
		},
		{
			name: "full-browser-width",
			label: "Full Browser Width"
		},
	];

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
			customStyles.forEach(function(style) {
				wp.blocks.registerBlockStyle(block.name, style);
			});
		});
	
	});

}(jQuery, wp, window.self));