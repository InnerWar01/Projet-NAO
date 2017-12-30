//Inject the block editor into the page
window.blockly_loaded = function(blockly) {
	return window.Blockly = blockly;
}