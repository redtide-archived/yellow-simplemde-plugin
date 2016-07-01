// Copyright (c) 2016 Andrea Zanellato
// This file may be used and distributed under the terms of the public license.

// SimpleMDE plugin 0.6.4
var initSimpleMdeFromDOM = function() {

	var simplemde = new SimpleMDE({
		element: document.getElementById("yellow-pane-edit-page"),
		initialValue: yellow.page.rawDataEdit, // set the page text into the editor
		forceSync: true, // save text into the original textarea
		autofocus: true, // update and show text into the editor
		spellChecker: false, // not all people write english documents
	});
}

if(window.addEventListener) {
	window.addEventListener('load', initSimpleMdeFromDOM, false);
} else {
	window.attachEvent('onload', initSimpleMdeFromDOM);
}
