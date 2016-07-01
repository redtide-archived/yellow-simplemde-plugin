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
		if(!$this->yellow->config->isExisting("fontAwesomeCdn")) {
			$this->yellow->config->setDefault("fontAwesomeCdn",
				"https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/");
		}
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
			$smdeCdn  = $this->yellow->config->get("simpleMdeCdn");
			$smdePath = $this->yellow->config->get("serverBase").
						$this->yellow->config->get("pluginLocation");

			// Font Awesome
			$output .= "<link rel=\"stylesheet\" href=\"{$faCdn}font-awesome.min.css\">\n";

			// SimpleMDE
			$output .= "<link rel=\"stylesheet\" href=\"{$smdeCdn}simplemde.min.css\">\n";
			$output .= "<script type=\"text/javascript\" src=\"{$smdeCdn}simplemde.min.js\"></script>\n";

			// Plugin
			$output .= "<script type=\"text/javascript\" src=\"{$smdePath}simplemde.js\"></script>\n";
		}
		return $output;
	}
}

$yellow->plugins->register("simplemde", "YellowSimpleMDE", YellowSimpleMDE::Version);
?>
