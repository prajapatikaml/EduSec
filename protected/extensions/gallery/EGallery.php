<?php

/**
 * EGallery class file.
 *
 * EGallery provides a simple gallery for use with {@link http://www.yiiframework.com Yii Framework}
 * If a {@link http://www.yiiframework.com/doc/guide/caching.overview cache} is configured, it will be used.
 *
 * How do I install this?
 * Extract the release file under `protected/extensions`
 *
 * How do I use this?
 * Choose a location to store the photos: eg. /images/gallery
 *
 * Create some "albums" in the gallery and put your photos in there eg.
 *     +-images/
 *       +-gallery/
 *         +-sample/
 *         | +-image1.jpg
 *         | +-image2.jpg
 *         +-sample2/
 *         | +-image4.jpg
 *         | +-image5.jpg
 *         +-sample3/
 *           +-image6.jpg
 *           +-image7.jpg
 *
 *
 * If you name your folder by date (eg. 20091120) you can sort your gallery by
 * date, and either show the date formatted how you like, or display whatever
 * album title you want via a description.txt file.
 *
 * ###Format of description.txt
 * Line 1: Album title
 * Lines 2-n: Album description
 *
 * Album title
 * An optional description of the album that will be parsed by Markdown.
 * It can have multiple lines.
 *
 *
 * Add the following code to your view:
 * ~~~
 * [php]
 * $this->widget('application.extensions.gallery.EGallery',
 * 		array('path' => '/images/gallery'),
 * );
 * [/php]
 * ~~~
 *
 * How do I add albums?
 * Albums are nothing more than directories with images in them. Simply create
 * directories inside the gallery directory. Sub albums are currently not supported.
 *
 * How do I comment albums?
 * Create a text file named "description.txt" in the album directory where
 * the first line is the album title and the rest of the file is markdown code.
 *
 * How do I have custom album titles?
 * See "How do I comment albums".
 *
 * @version 1.3
 *
 * @todo Add image upload support
 * @author scythah <scythah@gmail.com>
 * @link http://www.yiiframework.com/extension/egallery/
 */

Yii::import('application.extensions.gallery.*');

class EGallery extends EGalleryBase {
	/**
	 * @var boolean whether to display the number of images in an album
	 */
	public $displayNumImages = true;

	/**
	 * Initialisation method called by Yii when the component is loaded.
	 *
	 * Cleanup the {@see $this->path gallery path} and check that it's valid.
	 * Publish images and CSS.
	 */
	public function init(){
		parent::setup();
	}

	/**
	 * Executes the widget.
	 */
	public function run()
	{
		$this->_dir = isset($_GET['dir'])?$_GET['dir']:null;

		if(!$this->_dir)
		{
			$this->_albums = parent::getAlbums();
			$pages=new CPagination(count($this->_albums));
			$pages->pageSize=$this->albumsPerPage;
			$this->_albums = parent::splitImages($this->_albums,$pages->pageSize);
		}
		else
		{
			$this->_images = parent::getImages($this->_dir);

			$pages=new CPagination(count($this->_images));
			$pages->pageSize=$this->imagesPerPage;
			$this->_images = parent::splitImages($this->_images,$pages->pageSize);
		}

		$this->render('gallery',array(
			'id'=>$this->id,
			'name'=>$this->name,
			'showNav'=>$this->showNav,
			'pages'=>$pages,
			'displayNumImages'=>$this->displayNumImages,
			'imagesPerRow'=>$this->imagesPerRow,
			'albumsPerRow'=>$this->albumsPerRow,
			'details'=>parent::getDetails($this->_dir),
			'albums'=>$this->_albums,
			'images'=>$this->_images,
			)
		) ;
	}
}
?>