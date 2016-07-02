<?php
// Copyright (c) 2016 Andrea Zanellato
// This file may be used and distributed under the terms of the public license.

class YellowSimpleMDE
{
	const Version = "0.0.1";
	var $yellow;

	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;

		// Font Awesome
		if(!$this->yellow->config->isExisting("fontAwesomeCdn")) {
			$this->yellow->config->setDefault("fontAwesomeCdn",
				"https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/");
		}
		// Codemirror
		$this->yellow->config->setDefault("codeMirrorCdn",
			"https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.16.0/");

		// SimpleMDE
		$this->yellow->config->setDefault("simpleMdeCdn",
			"https://cdn.jsdelivr.net/simplemde/latest/");
	}

	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = NULL;
		if($name == "header")
		{
			$faCdn    = $this->yellow->config->get("fontAwesomeCdn");
			$cmCdn    = $this->yellow->config->get("codeMirrorCdn");
			$smdeCdn  = $this->yellow->config->get("simpleMdeCdn");
			$smdePath = $this->yellow->config->get("serverBase").
			            $this->yellow->config->get("pluginLocation");
			// Font Awesome
			$output .= "<link rel=\"stylesheet\" href=\"{$faCdn}font-awesome.min.css\">\n";

			// Codemirror
			$output .= "<script type=\"text/javascript\" src=\"{$cmCdn}codemirror.min.js\"></script>\n";
			$output .= "<script type=\"text/javascript\" src=\"{$cmCdn}addon/display/autorefresh.min.js\"></script>\n";
			$output .= "<script type=\"text/javascript\" src=\"{$cmCdn}addon/selection/active-line.min.js\"></script>\n";

			// SimpleMDE
			$output .= "<link rel=\"stylesheet\" href=\"{$smdeCdn}simplemde.min.css\">\n";
			$output .= "<script type=\"text/javascript\" src=\"{$smdeCdn}simplemde.min.js\"></script>\n";

			// Plugin
            $output .= "<script type=\"text/javascript\" src=\"https://codemirror.net/addon/display/autorefresh.js\"></script>\n";
			$output .= "<script type=\"text/javascript\" src=\"{$smdePath}simplemde.js\"></script>\n";
		}
		return $output;
	}
}

$yellow->plugins->register("simplemde", "YellowSimpleMDE", YellowSimpleMDE::Version);
?>
