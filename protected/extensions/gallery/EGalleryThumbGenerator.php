<?php

/**
 * EGalleryThumbGenerator class file.
 *
 * Provides thumbnail generation for EGallery extension
 *
 * @version 1.0
 *
 * @author scythah <scythah@gmail.com>
 * @link http://www.yiiframework.com/extension/egallery/
 */

class EGalleryThumbGenerator {
	/**
	 * @var string the directory of the gallery
	 */
	public $directory;

	/**
	 * @var integer the width of the generated thumbnails
	 */
	public $thumbnailWidth = 128;

	/**
	 * @var integer the height of the generated thumbnails
	 */
	public $thumbnailHeight = 128;

	/**
	 * @var array the images currently being processed
	 */
	private $_images = array();

	/**
	 *
	 * @return <type>
	 */
	public function processImages()
	{
		$this->_images = $this->processQueue();

		if(empty($this->_images) || !$this->_images)
		{
			// Nothing to process or malformed data
			return 0;
		}

		// Do image processing...
		$this->generateThumbnails($this->_images);

		return count($this->_images);
	}

	/**
	 * Merges the queue of images to be processed with the new images.
	 * Writes the images that won't be processed this round to the
	 * /path/to/gallery/queue.txt file
	 *
	 * @return array the images to process this round
	 */
	private function processQueue()
	{
		$_oldQueue= (file_exists($this->directory.DIRECTORY_SEPARATOR.'queue.txt') ?
					@unserialize(file_get_contents($this->directory.DIRECTORY_SEPARATOR.'queue.txt')) : false) ?
						unserialize(file_get_contents($this->directory.DIRECTORY_SEPARATOR.'queue.txt')) : array();
		$_newQueue = (file_exists($this->directory.DIRECTORY_SEPARATOR.'needsThumbs.txt') ?
					@unserialize(file_get_contents($this->directory.DIRECTORY_SEPARATOR.'needsThumbs.txt')) : false) ?
						unserialize(file_get_contents($this->directory.DIRECTORY_SEPARATOR.'needsThumbs.txt')) : array();

		// Now that we have the array, clean up the file for next time.
		$this->deleteFile($this->directory.DIRECTORY_SEPARATOR.'needsThumbs.txt');

		$this->_images = array_merge($this->array_multi_diff($_oldQueue, $_newQueue), $_newQueue);

		if(count($this->_images) > 10)
		{
			// Save the queue for processing next time
			file_put_contents($this->directory.DIRECTORY_SEPARATOR.'queue.txt',serialize(array_slice($this->_images, 10)));
		}
		else
		{
			// Nothing left in the queue
			$this->deleteFile($this->directory.DIRECTORY_SEPARATOR.'queue.txt');
		}

		return array_slice($this->_images, 0, 10);
	}

	/**
	 * Create thumbnails for the specified images
	 */
	private function generateThumbnails($images)
	{
		if(empty($images))
		{
			return;
		}

		foreach($images as $image)
		{
			if(!file_exists($image['folder']))
			{
				if (!@mkdir($image['folder'], 0755, true))
				{
					// Unable to create empty directory
					continue;
				}
			}

			if(file_exists($image['folder'].DIRECTORY_SEPARATOR.$image['image']))
			{
				// Thumbnail already exists
				continue;
			}

			$pathToOriginal = realpath($image['folder'].DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.$image['image']);

			$dimensions = getimagesize($pathToOriginal);

			$orig_w = $dimensions[0];
			$orig_h = $dimensions[1];

			$w_ratio = ($this->thumbnailWidth / $orig_w);
			$h_ratio = ($this->thumbnailHeight / $orig_h);

			if ($orig_w > $orig_h )
			{
				$crop_w = round($orig_w * $h_ratio);
				$crop_h = $this->thumbnailHeight;
			}
			elseif ($orig_w < $orig_h )
			{
				$crop_h = round($orig_h * $w_ratio);
				$crop_w = $this->thumbnailWidth;
			}
			else
			{
				$crop_w = $this->thumbnailWidth;
				$crop_h = $this->thumbnailHeight;
			}
			$dest_img = imagecreatetruecolor($this->thumbnailWidth,$this->thumbnailHeight);

			// Determine format from MIME-Type
			$format = strtolower(preg_replace('/^.*?\//', '', $dimensions['mime']));

			switch($format) {
				case 'jpg':
				case 'jpeg':
					$source_img = imagecreatefromjpeg($pathToOriginal);
				break;
				case 'png':
					$source_img = imagecreatefrompng($pathToOriginal);
				break;
				case 'gif':
					$source_img = imagecreatefromgif($pathToOriginal);
				break;
				default:
					// Unsupported format
					continue 2;
			}

			// Resample the image to the new size
			$result = imagecopyresampled($dest_img, $source_img, 0 , 0 , 0, 0, $crop_w, $crop_h, $orig_w, $orig_h);

			// Save the new image to the specified folder
			imagejpeg($dest_img, $image['folder'].DIRECTORY_SEPARATOR.$image['image']);

			// Cleanup
			imagedestroy($dest_img);
			imagedestroy($source_img);
		}
	}

	/**
	 * Deletes a file from the filesystem
	 *
	 * @param string $file the absolute path to the file
	 */
	private function deleteFile($file)
	{
		if(is_writable($file) && is_file($file))
		{
			@unlink($file);
		}
	}

	/**
	 * Get the items in the old queue that aren't in the new queue.
	 * This is in case two or more requests for the same lot of thumbnails
	 * occur for example when two people request the same album at the same time.
	 *
	 * @param array $_oldQueue the old queue
	 * @param array $_newQueue the new queue
	 * @return array the old queue without the items from the new queue
	 */
	private function array_multi_diff($_oldQueue, $_newQueue)
	{
		$diff = array();
		foreach ($_oldQueue as $key => $value)
		{
			if (array_search($value, $_newQueue) === false)
			{
				$diff[$key] = $value;
			}
		}
		return $diff;
	}
}
?>