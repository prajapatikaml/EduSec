#!/usr/bin/php
<?php

if ($argc === 4 && strstr($argv[0], basename(__FILE__))) {
	// File is being called by the CLI and has not been included by another script

	if(!file_exists($argv[1].DIRECTORY_SEPARATOR.'needsThumbs.txt'))
	{
		// Either no thumbnails need to be created or a wrong directory has been supplied
		exit;
	}
	
	include(realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.'EGalleryThumbGenerator.php');

	$generator = new EGalleryThumbGenerator;
	$generator->directory = $argv[1];
	$generator->thumbnailWidth = is_int($argv[2]) ? $argv[2] : 128;
	$generator->thumbnailHeight = is_int($argv[3]) ? $argv[3] : 128;

	while (($i = $generator->processImages()) > 0)
	{
		/*
		 * Can we get some sort of feedback to the user here?
		 * Possibly so that we can display a progress bar in the management section.
		 * Probably have to write $i to a file to be read by the main script.
		 */
	}

	exit;
}
?>