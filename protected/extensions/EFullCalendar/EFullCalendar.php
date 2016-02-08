<?php

class EFullCalendar extends CWidget
{
    /**
     * @var string Google's calendar URL.
     */
    public $googleCalendarUrl;

    /**
     * @var string Theme's CSS file.
     */
    public $themeCssFile;

    /**
     * @var array FullCalendar's options.
     */
    public $options=array();

    /**
     * @var array HTML options.
     */
    public $htmlOptions=array();

    /**
     * @var bool
     */
    public $loadPrintCss=false;

    /**
     * @var string Language code as ./locale/<code>.php file
     */
    public $lang;

    public function run()
    {
        if ($this->lang) {
            $this->registerLocale();
        }

        $this->registerFiles();
        $this->showOutput();
    }

    protected function registerLocale()
    {
        $langFile=dirname(__FILE__).'/locale/'.$this->lang.'.php';
        if (file_exists($langFile))
            $this->options=CMap::mergeArray($this->options, include($langFile));
    }

    protected function registerFiles()
    {
        $assetsDir=(defined(__DIR__) ? __DIR__ : dirname(__FILE__)).'/assets';
        $assets=Yii::app()->assetManager->publish($assetsDir);

        $ext=defined('YII_DEBUG') ? 'js' : 'min.js';
        $cs=Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        $cs->registerScriptFile($assets.'/fullcalendar/fullcalendar.'.$ext);
        $cs->registerScriptFile($assets.'/fullcalendar/jquery-ui-1.8.23.custom.min.js');
        $cs->registerCssFile($assets.'/fullcalendar/fullcalendar.css');

        if ($this->loadPrintCss) {
            $cs->registerCssFile($assets.'/fullcalendar/fullcalendar.print.css');
        }
        if ($this->googleCalendarUrl) {
            $cs->registerScriptFile($assets.'/fullcalendar/gcal.js');
            $this->options['events']=$this->googleCalendarUrl;
        }
        if ($this->themeCssFile) {
            $this->options['theme']=true;
            $cs->registerCssFile($assets.'/themes/'.$this->themeCssFile);
        }

        $js='$("#'.$this->id.'").fullCalendar('.CJavaScript::encode($this->options).');';
        $cs->registerScript(__CLASS__.'#'.$this->id, $js, CClientScript::POS_READY);
    }

    protected function showOutput()
    {
        if (! isset($this->htmlOptions['id']))
            $this->htmlOptions['id']=$this->id;

        echo CHtml::tag('div', $this->htmlOptions,'');
    }
}