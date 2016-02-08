<?php

/**
 * EBBCNewsTicker.php
 *
 * A wrapper for the jquery plugin 'BBCnewsTicker'
 *
 * Customizing the layout:
 * - Set the wrapperTag and assign your own css-classes to the wrapperHtmlOptions
 * - Edit the assets/bbcnewticker.css
 *
 * @link http://plugins.jquery.com/project/BBCnewsTicker
 * @link http://www.makemineatriple.com/jquery?newsTicker
 *
 * @author Joe Blocher <yii@myticket.at>
 * @copyright 2011 myticket it-solutions gmbh
 * @license New BSD License
 * @category User Interface
 * @version 1.0
 */
class EBBCNewsTicker extends CWidget
{
	/**
	 * The items to display
	   'items'=>array(
			            'textOnly1',
			            'linkText1'=>'url1',
			            'textOnly3',
			            'linkText2'=>'url2'
			          )
	 * The key is the text, the value is the link url (if is set).
	 *
	 * @var array $items
	 */
	public $items=array();

	/**
	 * Available options
	 *
	 * @link http://www.makemineatriple.com/news-ticker-documentation
	 *
	 * @var array $options
	 *
	 * If you enable the controls, the following will be added just after your list of items:

		 <ul class="ticker-controls">
		 <li class="play"><a href="#play">Play</a></li>
		 <li class="resume"><a href="#resume">Resume</a></li>
		 <li class="stop"><a href="#stop">Stop</a></li>
		 <li class="previous"><a href="#previous">Previous</a></li>
		 <li class="next"><a href="#next">Next</a></li>
		 </ul>

		 Alternatively, if you wish to use controls but use your own markup for them, set the ‘ownControls’ parameter to true (which sets ‘controls’ as true) and apply the appropriate classes to your control elements as per the above controls)

		 Only a subset of these controls will be visible at any one time, depending on the play state of the ticker.
	 */
	public $options = array(
		'tickerRate' => 100, // time gap between display of each letter (ms)
		'startDelay' => 100, // delay before first run of the ticker (ms)
		'loopDelay' => 2000, //time for which full text of each item is shown at end of print-out (ms)
		'placeHolder1' => ' |', // character placeholder shown on even loops
		'placeHolder2' => '_', // character placeholder shown on odd loops
		'controls' => false,  // show resume / stop controls (see below for the markup added)
		'ownControls' => false,  // use own markup for controls (sets controls = true)
		'stopOnHover' => true,  // trigger the stop action on hovering over the links
		'resumeOffHover' => false  // trigger the resume action on mouseout from the links. NB the links must be block display for this to work reliably with stopOnHover
	);

	/**
	 * If you want to render a wrapper (div,span,...=  around the newsticker
	 *
	 * @var string $wrapperTag
	 */
	public $wrapperTag; //'div'

	/**
	 * The htmlOptions for the wrapper tag
	 *
	 * @var string $wrapperTag
	 */
	public $wrapperHtmlOptions=array();

	/**
	 * Initialize the widget
	 *
	 * @return
	 */
	public function init()
	{
		if (!empty($this->items))
		{
			$id = $this->getId(false);
			if (empty($id))
				$this->setId('bbcnewsticker');

			$assets = Yii::app()->assetManager->publish(dirname(__FILE__).DIRECTORY_SEPARATOR.'assets');

			$clientScript = Yii::app()->clientScript;
			$clientScript->registerCoreScript('jquery');
			$clientScript->registerScriptFile($assets.'/jquery.newsTicker-2.3.6.js');
			$clientScript->registerCssFile($assets.'/bbcnewticker.css');

			$options = CJavaScript::encode(array_merge($this->options,array('newsList'=>'#'.$this->id)));
			$clientScript->registerScript(__CLASS__.'#'.$this->id,"jQuery().newsTicker($options);");
		}

		parent::init();
	}

	/**
	 * Render the list items
	 */
	public function run()
	{

		if (!empty($this->items))
		{
			if (!empty($this->wrapperTag))
				echo CHtml::openTag($this->wrapperTag,$this->wrapperHtmlOptions);

			echo CHtml::openTag('ul',array('id'=>$this->id,'class'=>'ticker-items'));
			foreach ($this->items as $key=>$value)
			{
				if (is_numeric($key) && !empty($value))
					echo CHtml::tag('li',array(),$value);
				elseif (!empty($value))
				    echo CHtml::tag('li',array(),CHtml::link($key,$value));
			}
			echo CHtml::closeTag('ul');

			if (!empty($this->wrapperTag))
				echo CHtml::closeTag($this->wrapperTag);
		}
	}
}
