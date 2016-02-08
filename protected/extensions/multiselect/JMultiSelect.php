<?php

/**
 * JMultiSelect class file.
 *
 * PHP Version 5.1
 * 
 * @package  Widget
 * @author   Segoddnja <segoddnja@i.ua>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @since    1.0
 */

Yii::import('zii.widgets.jui.CJuiInputWidget');

/**
 * JMultiSelect displays a multiselect.
 *
 * JMultiSelect encapsulates the {@link http://abeautifulsite.net/blog/2008/04/jquery-multiselect/ 
 * jQuery MultiSelect} plugin.
 *
 * To use this widget, you may insert the following code in a view:
 * <pre>
 * $this->widget('zii.widgets.jui.CJuiDatePicker', array(
 *     'name'=>'publishDate',
 *     // additional javascript options for the date picker plugin
 *     'options'=>array(
 *         'showAnim'=>'fold',
 *     ),
 *     'htmlOptions'=>array(
 *         'style'=>'height:20px;'
 *     ),
 * ));
 * $this->widget('ext.multiselect.JMultiSelect',array(
 *      'model'=>$model,
 *      'attribute'=>'attribute',
 *      'data'=>$data,
 *      // additional javascript options for the MultiSelect plugin
 *      'options'=>array()
 * ));
 * </pre>
 *
 * By configuring the {@link options} property, you may specify the options
 * that need to be passed to the MultiSelect plugin. Please refer to
 * the {@link http://abeautifulsite.net/blog/2008/04/jquery-multiselect/#configuring MultiSelect plugin} documentation
 * for possible options (name-value pairs).
 *
 * @author segoddnja <segoddnja@i.ua>
 */

class JMultiSelect extends CJuiInputWidget {
    
    /**
     * @var array data for generating the list options (value=>display)
     */
    public $data  = array();
    
    /**
     * @var array selected data for list
     */
    public $selected  = array();
    
    /**
     * @var array additional options for multiselect script
     */
    public $options = array();

    /**
     * Run this widget.
     * This method registers necessary javascript and renders the needed HTML code.
     */
    function run() {
        list($name, $id) = $this->resolveNameID();
        if (isset($this->htmlOptions['id']))
            $id = $this->htmlOptions['id'];
        else
            $this->htmlOptions['id'] = $id;
        if (isset($this->htmlOptions['name']))
            $name = $this->htmlOptions['name'];
        else
            $this->htmlOptions['name'] = $name;
        if ($this->hasModel())
            echo CHtml::activeDropDownList($this->model, 'citysFilter', $this->data, $this->htmlOptions);
        else
            echo CHtml::dropDownList($name, $this->selected, $this->data, $this->htmlOptions);
        $options = CJavaScript::encode($this->options);
        $js = "jQuery('#{$id}').multiselect($options);";
        Yii::app()->getClientScript()->registerScript(__CLASS__.'#'.$id, $js);
    }

    /**
     * Initializes the widget.
     */
    public function init() {
        parent::init();
        $this->registerScripts();
        $this->htmlOptions['multiple'] = 'multiple';
        $this->options = array_merge(array(
            'header' => false,
            'selectedList' => 4,
            'noneSelectedText' => 'Выберите город',
            'selectedText' => '# выбрано',
        ), $this->options);
    }

    /**
     * Registers the JS and CSS Files
     */
    protected function registerScripts() {
        parent::registerCoreScripts();
        $assets = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.multiselect') . '/assets');
        $cs = Yii::app()->getClientScript();
        $cs->registerCoreScript('jquery.ui');
        $cs->registerScriptFile($assets . '/jquery.multiselect.min.js');
        $cs->registerCssFile($assets . '/jquery.multiselect.css');
    }

}

?>