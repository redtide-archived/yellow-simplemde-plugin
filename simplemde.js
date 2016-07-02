// Copyright (c) 2016 Andrea Zanellato
// This file may be used and distributed under the terms of the public license.

// SimpleMDE plugin 0.6.4
var initSimpleMdeFromDOM = function() {

	var yellow_editor = document.getElementById("yellow-pane-edit-page");

	var simplemde = new SimpleMDE({
		element:      yellow_editor,
		initialValue: yellow.page.rawDataEdit, // set the page text into the editor
		forceSync:    true, // save text into the original textarea
		autofocus:    true, // update and show text into the editor?
		spellChecker: false // get rid about annoying spellchecker for now
	});

	// Add some (not yet working) features as reference (see CodeMirror Docs)
	simplemde.codemirror.setOption("lineNumbers", true);
	simplemde.codemirror.setOption("autoRefresh", true);
	simplemde.codemirror.setOption("autofocus", true);
	simplemde.codemirror.setOption("styleActiveLine", true);
}

if(window.addEventListener) {
	window.addEventListener('load', initSimpleMdeFromDOM, false);
} else {
	window.attachEvent('onload', initSimpleMdeFromDOM);
}
