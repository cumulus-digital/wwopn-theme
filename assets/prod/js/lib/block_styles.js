"use strict";!function(e,t,r,l){var s={name:"full-browser-width",label:"Full Browser Width"},o={name:"full-content-width",label:"Full Content Width"};e(function(){var e,r=[];t.blocks.getBlockTypes().forEach(function(e){e.supports&&e.supports.hasOwnProperty("inserter")&&!1===e.supports.inserter||(t.blocks.registerBlockStyle(e.name,s),t.blocks.registerBlockStyle(e.name,o))})})}(jQuery,wp,window.self);
//# sourceMappingURL=block_styles.js.map