<?php
/*
* jQuery news ticker 
* author : pegel.linuxs@gmail.com
*/
class ETicker extends CWidget
{
	/*
	* @var array data for li params
	*/
	public $data=array();
	
	/*
	* @var options for jquery ticker options
	*/
	
	public $options=array();
		
	public function init()
	{
		$options=$this->options?CJavaScript::encode($this->options):'';
		$asset=Yii::app()->assetManager->publish(dirname(__FILE__).'/assets');
    	$cs=Yii::app()->clientScript;
    	$cs->registerCssFile($asset.'/ticker-style.css');
    	$cs->registerScriptFile($asset.'/jquery.ticker.js');
    	$cs->registerScript('_ticker','
    		$("#js-news").ticker('.$options.');
    	');
	}
	
	public function run()
	{
		echo '<ul id="js-news" class="js-hidden">';
		if (count($this->data)<1 || !is_array($this->data)):
			echo '
			<li class="news-item">This is sample news ticker!</li>
			<li class="news-item">Please give parameters for ticker!</li>
			<li class="news-item">Model is not supported yet!</li>
			<li class="news-item">Data should in array</li>';
		else:
			foreach($this->data as $value)
				echo '<li class="news-item">'.$value.'</li>';
		endif;	
		echo '</ul>';
	}
}
