<?php
	/**
	* slider class file.
	*
	* @author Ovidiu Pop <matricks@webspider.ro>
	* @link http://www.webspider.ro/
	* @copyright Copyright &copy; 2012 Ovidiu Pop
	* Dual licensed under the MIT and GPL licenses:
	* http://www.opensource.org/licenses/mit-license.php
	* http://www.gnu.org/licenses/gpl.html
	*
	* slider - yii extension
	* - create a photo slideshow
	* version: 1.2

	* To use slider:
	* Extract archive in your extensions folder
	* In the site root create a folder named "images" and copy content of image folder from archive

	* To include a slider in a page:
	* <?php $this->widget('application.extensions.slider.slider');?> or <?php $this->widget('ext.slider.slider');?>
		
	* If you wish to customize your slider, you can set options:
		<?php
		$this->widget('ext.slider.slider', array(

			'sliderBase'=>'/slider/',
			'imagesPath'=>'banners',
			
			'container'=>'slideshow',
			'width'=>960, 
			'height'=>240, 
			'timeout'=>6000,
			'infos'=>true,
			'constrainImage'=>true,
			'images'=>array('01.jpg','02.jpg','03.jpg','04.jpg'),
			'alts'=>array('First description','Second description','Third description','Four description'),
			'defaultUrl'=>Yii::app()->request->hostInfo
			)
		);
		?>
		
		sliderBase = string - set the folder base for slider, related to webapp root
		imagesPath = string - set the folder for images used in active page
		container = string - container class for slider
		width = integer - the width of container
		height = integer - the height of container
		timeout = integer - speed to change images
		infos = string - display the information over every picture
		constrainImage = boolean - force the image to fill the container
		images = array - set the name and the order of the pictures which will be displayied
		alts = array - set alt attribute for every picture used in slider and definder in images attribute
		urls = array - set url for every picture used in slider and definder in images parameter
		defaultUrl = url - set the url where will be redirected at click on picture	
		defaultAlt = url - set default alt atribute to be used for all pictures used in slider
		sameToAll = boolean - if is set to true, the set of images will be taken from "all"" folder from sliderBase folder and can be displayied in all pages (as a banner for example), if is set to false, you must create a folder named by page id, and slider will use that folder
	*/

class slider extends CWidget
{
	/** 
	* @var string $container - container class for slider
	*/
	public $container="slideshow";

	/** 
	* @var int $width - the width for container
	*/
	public $width=960;

	/** 
	* @var int $height - the height for container
	*/
	public $height=240;

	/** 
	* @var int $timeout - milisecond - time for a picture to remain visible until next picture is shown
	*/
	public $timeout=6000;

	/** 
	* @var bool $infos - true=>display info about picture, false=>don't display info about picture,
	* alt attribute of image will be shown over picture
	*/
	public $infos=true;

	/** 
	* @var array $images - array with filename of images. Don't need to be set full path. Only filename.
	* alt attribute of image will be shown over picture
	*/
	public $images;

	/** 
	* @var array $alts - array with alt attribute for images. These attributes will be used to display infos.
	*/
	public $alts = array('First description','Second description','Third description','Four description');

	/** 
	* @var array $urls - array with anchors for images. You can set a destination for each picture.
	*/
	public $urls = array();

	/** 
	* @var string $defaultAlt - This string will be shown when an image hasn't a corespondent alt attribute, set in in $alts.
	*/
	public $defaultAlt='';

	/** 
	* @var string $defaultUrl - This url will be used when an image hasn't a corespondent url attribute, set in in $urls.
	*/
	public $defaultUrl='#';

	/** 
	* @var bool $sameToAll - If is set to true, the set of images will be taken from all folder and can be displayied in all pages (as a banner for example)
	* if is set to false, you must create a folder named by page id, and slider will use that folder
	*/
	public $sameToAll = true;//use same slider on all pages

	/** 
	* @var bool $constrainImage - If is set to true, all images will be resized to fill container of slider
	* if is set to false, you can't use info about every image
	*/
	public $constrainImage = true;//constrain image to fill space

	/** 
	* @var bool $sliderBase - Set base folder for slider, related to webapp root;
	*/
	public $sliderBase = '/college_data/gallery/';
	
	/** 
	* @var string $imagesPath - Custom path to folder from where the images for slider are loaded;
	*/
	public  $imagesPath;
	
	/** 
	* @var string $imgsFolder - Actual folder from where the images for slider are loaded; Internally used;
	*/
	private $imgsFolder;
	
	public function init()
	{
		$this->loadDefaults();

		//same pictures on all pages
		if($this->sameToAll)
			$this->imgsFolder = Yii::app()->request->hostInfo.Yii::app()->baseUrl.$this->sliderBase.$this->imgsFolder.'/';
		else
		//use id of page to display specific images
		//for dinamic pages
			$this->imgsFolder = Yii::app()->request->hostInfo.Yii::app()->baseUrl.$this->sliderBase.$_GET['id'].'/';

		$this->defaultAlt = $this->defaultAlt ? $this->defaultAlt : '';
		$this->defaultUrl = $this->defaultUrl ? $this->defaultUrl : Yii::app()->request->hostInfo;
		
		//if use different size for images, infos will be automatically disabled
		if($this->constrainImage === false) 
			$this->infos = false;

		self::setContent();
		self::publishAssets();
		parent::init();
	}

	private function loadDefaults()
	{
		//default folder
		$this->imgsFolder = 'album1';
		//is set a folder for images, use this one
		if(isset($this->imagesPath) && $this->imagesPath != '')
			$this->imgsFolder = $this->imagesPath;

		//use all images from folder without setting theirs name and order;
		if(!$this->images)
			$this->images = $this->filesFromDir(dirname(__FILE__).'/../../../../'.Yii::app()->baseUrl.$this->sliderBase.$this->imgsFolder.'/', '*');
	}
	
	public function publishAssets()
	{
		$assets = dirname(__FILE__).'/assets';
		$baseUrl = Yii::app()->assetManager->publish($assets);

		if(is_dir($assets)){
			Yii::app()->clientScript->registerCssFile($baseUrl . '/slider.css');
			Yii::app()->clientScript->registerScriptFile($baseUrl . '/slider.js', CClientScript::POS_END);
			Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.cycle.all.js', CClientScript::POS_END);

			Yii::app()->clientScript->registerScript( 'startSlider' , "startCycle(
				'$this->container', 
				'$this->width', 
				'$this->height',
				'$this->infos',
				'$this->timeout'
			)", CClientScript::POS_READY );

		}else 
			throw new Exception(404, 'slider - '.Yii::t('app', 'Error: Folder doesn\'t exists.'));
	}

	private function setContent()
	{
		$items = '';
		foreach($this->images as $k => $img){
			$url = isset($this->urls[$k]) ? $this->urls[$k] : $this->defaultUrl;
			$alt = isset($this->alts[$k]) ? $this->alts[$k] : $this->defaultAlt;
			$src = $this->imgsFolder.$img;
		
			$items .=  $this->render('_item', array('url'=>$url, 'src'=>$src, 'alt'=>$alt), true);
		}
		echo $this->render('container', array('items'=>$items), true);
	}
	
	// return an array with all filenames from a folder
	public function filesFromDir($dir, $ext="*", $fullpath=false)
	{
		$files = glob($dir . '*.'.$ext) ? glob($dir . '*.'.$ext) : array();
		if($fullpath)
			return $files;
		$arr = array();
		foreach($files as $file)
			$arr[] = str_replace("$dir", "", $file);
		return $arr;
	}
	

}
