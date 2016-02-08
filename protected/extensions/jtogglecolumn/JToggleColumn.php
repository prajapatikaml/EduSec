<?php

/**
 * CToggleColumn class file.
 *
 * @author Nikola Trifunovic <johonunu@gmail.com>
 * @link http://www.trifunovic.me/
 * @copyright Copyright &copy; 2012 Nikola Trifunovic
 * @license http://www.yiiframework.com/license/
 */
Yii::import('zii.widgets.grid.CGridColumn');

class JToggleColumn extends CGridColumn {

    /**
     * @var string the attribute name of the data model. Used for column sorting, filtering and to render the corresponding
     * attribute value in each data cell. If {@link value} is specified it will be used to rendered the data cell instead of the attribute value.
     * @see value
     * @see sortable
     */
    public $name;
    /**
     * @var array with range of available values for qtoggle and it`s label (support text,image-url or html) @see labeltype
     * for-ex: array('client'=>'image1.png','manager'=>'image2.png','boss'=>'image3.png','operator'=>'image4.png')
     * OR array('0'=>'Draft','1'=>'Premoderation','2'=>'Public')
     */
    public $queue=array();
    /**
     * @var array with range of available values for qtoggle and it`s titles (for link title attribute)
     * for-ex: array('client'=>'Client.Switch to manager','manager'=>'Manager.Switch to boss','boss'=>'Boss.Switch to operator','operator'=>'Operator.Switch to client')
     * OR array('0'=>'Draft','1'=>'Premoderation','2'=>'Public')
     */
    public $queueTitles=array();

    public $queueType='toggle';//May by toggle or select


    /**
     * @var array the HTML options for the data cell tags.
     */
    public $htmlOptions = array('class' => 'toggle-column');

    /**
     * @var array the HTML options for the header cell tag.
     */
    public $headerHtmlOptions = array('class' => 'toggle-column');

    /**
     * @var array the HTML options for the footer cell tag.
     */
    public $footerHtmlOptions = array('class' => 'toggle-column');

    /**
     * @var string the text-label or imageUrl or or html-code for the toggle button. Defaults to "toggle".
     */
    public $checkedButtonLabel;

    /**
     * @var string the text-label or imageUrl or html-code for the toggle button. Defaults to "toggle".
     */
    public $uncheckedButtonLabel;
    /**
     * @var string the title attribute for the toggle button link
     */
    public $checkedButtonTitle;

    /**
     * @var string the title attribute for the toggle button link
     */
    public $uncheckedButtonTitle;

    /**
     * @var string the type of label - may be one of "text","image","html".
     */

    public $labeltype='text';


    /**
     * @var array the configuration for toggle button.
     */
    public $toggle_button = array();

    /**
     * @var boolean whether the column is sortable. If so, the header cell will contain a link that may trigger the sorting.
     * Defaults to true. Note that if {@link name} is not set, or if {@link name} is not allowed by {@link CSort},
     * this property will be treated as false.
     * @see name
     */
    public $sortable = true;

    /**
     * @var mixed the HTML code representing a filter input (eg a text field, a dropdown list)
     * that is used for this data column. This property is effective only when
     * {@link CGridView::filter} is set.
     * If this property is not set, a text field will be generated as the filter input;
     * If this property is an array, a dropdown list will be generated that uses this property value as
     * the list options.
     * If you don't want a filter for this data column, set this value to false.
     * @since 1.1.1
     */
    public $filter;

    /**
     * @var string Name of the action ('toggle','switch' or 'qtoggle')
     */
    public $action;

    /**
     * @var string Assets url
     */
    private $_assetsUrl;
    /**
     * @var string  unique id for caching range of values
     */
    private $queueid;

    /**
     * Returns assets url, where check and uncheck images are located
     * @return string
     */
    public function getAssetsUrl()
    {
        if ($this->_assetsUrl === null)
            $this->_assetsUrl = Yii::app()->getAssetManager()->publish(dirname(__FILE__).'/images');
        return $this->_assetsUrl;
    }

    /**
     * Initializes the column.
     * This method registers necessary client script for the button column.
     */
    public function init() {
        if ($this->name === null)
            $this->sortable = false;
        if ($this->name === null)
            throw new CException(Yii::t('toggle_column', 'Model attribute ("name") must be specified for CToggleColumn.'));
        if($this->action == 'qtoggle')
        {
            if  (empty($this->queueid))
               $this->queueid=base64_encode(Yii::app()->controller->action->id.$this->name.$this->grid->id);
            if  (empty($this->queue))
            throw new CException(Yii::t('toggle_column', 'Please set correct queue array!!!'));

            if  (empty($this->queueTitles))
                throw new CException(Yii::t('toggle_column', 'Please set correct queueTitles array!!!'));
             $archeq=array_diff_key($this->queue,$this->queueTitles);
            if  (!empty($archeq))
                throw new CException(Yii::t('toggle_column', 'Keys of array $queue and keys of array $queueTitles must be identical '));


        }
        if($this->action == 'qtoggle'){
            $this->initQtButtons();
            $this->toggle_button['click'] = 'js:' . $this->toggle_button['click'];
            if($this->queueType=='select')
                $this->registerClientScriptQt();
            else
                $this->registerClientScript();
        }
        else{
            $this->initDefaultButtons();

            $this->toggle_button['click'] = 'js:' . $this->toggle_button['click'];

            $this->registerClientScript();
        }


    }
    /**
     * Initializes the default buttons (qtoggle ).
     */
    protected function initQtButtons() {

            $range=array_keys($this->queue);
            $range=implode(',',$range);
            Yii::app()->cache->set($this->queueid,$range);

        if (Yii::app()->request->enableCsrfValidation) {
            $csrfTokenName = Yii::app()->request->csrfTokenName;
            $csrfToken = Yii::app()->request->csrfToken;
            $csrf = "\n\t\tdata:{ '$csrfTokenName':'$csrfToken' },";
        }
        else
            $csrf = '';

        $this->toggle_button= array(
            'url' => 'Yii::app()->controller->createUrl("' . $this->action . '",array("id"=>$data->primaryKey,"attribute"=>"' . $this->name . '","que"=>"'.$this->queueid.'"))',
            'options' => array('class' => $this->name . '_toggle'),
        );
if($this->queueType=='select'){
    $this->toggle_button['click'] = <<<EOD
function() {
	var th=this;
	$.fn.yiiGridView.update('{$this->grid->id}', {
		type:'POST',
		url:$(this).attr('data-href'),$csrf
		success:function(data) {
			$.fn.yiiGridView.update('{$this->grid->id}');
		}
	});
	return false;
}
EOD;
}else{
    $this->toggle_button['click'] = <<<EOD
function() {
	var th=this;
	$.fn.yiiGridView.update('{$this->grid->id}', {
		type:'POST',
		url:$(this).attr('href'),$csrf
		success:function(data) {
			$.fn.yiiGridView.update('{$this->grid->id}');
		}
	});
	return false;
}
EOD;
}



    }
    /**
     * Initializes the default buttons (toggle).
     */
    protected function initDefaultButtons() {
        switch($this->labeltype){
            case 'image':{
            if ($this->checkedButtonLabel === null)
                $this->checkedButtonLabel = $this->getAssetsUrl(). '/checked.png';
            if ($this->uncheckedButtonLabel === null)
                $this->uncheckedButtonLabel = $this->getAssetsUrl() . '/unchecked.png';
            break;
            }
            case 'html':{
            if ($this->checkedButtonLabel === null)
                $this->checkedButtonLabel = '<i class="icon-check"></i>';//for twitter-bootstrap most used
            if ($this->uncheckedButtonLabel === null)
                $this->uncheckedButtonLabel = '<i class="icon-check-empty"></i>';//for twitter-bootstrap most used
            break;
            }
            default:{
            if ($this->checkedButtonLabel === null)
                $this->checkedButtonLabel = Yii::t('toggle_column', 'Uncheck');
            if ($this->uncheckedButtonLabel === null)
                $this->uncheckedButtonLabel = Yii::t('toggle_column', 'Check');
            }

        }
        if ($this->checkedButtonTitle === null)
            $this->checkedButtonTitle = Yii::t('toggle_column', 'Uncheck');
        if ($this->uncheckedButtonTitle === null)
            $this->uncheckedButtonTitle = Yii::t('toggle_column', 'Check');


        if ($this->action === null)
            $this->action = 'toggle';



            $this->toggle_button = array(
                'url' => 'Yii::app()->controller->createUrl("' . $this->action . '",array("id"=>$data->primaryKey,"attribute"=>"' . $this->name . '"))',
                'options' => array('class' => $this->name . '_toggle'),
            );




        if (Yii::app()->request->enableCsrfValidation) {
            $csrfTokenName = Yii::app()->request->csrfTokenName;
            $csrfToken = Yii::app()->request->csrfToken;
            $csrf = "\n\t\tdata:{ '$csrfTokenName':'$csrfToken' },";
        }
        else
            $csrf = '';

        $this->toggle_button['click'] = <<<EOD
function() {
	var th=this;
	$.fn.yiiGridView.update('{$this->grid->id}', {
		type:'POST',
		url:$(this).attr('href'),$csrf
		success:function(data) {
			$.fn.yiiGridView.update('{$this->grid->id}');
		}
	});
	return false;
}
EOD;
    }

    /**
     * Registers the client scripts for the button column.
     */
    protected function registerClientScript() {
        $js = array();

        $function = CJavaScript::encode($this->toggle_button['click']);
        $class = preg_replace('/\s+/', '.', $this->toggle_button['options']['class']);
        $js[] = "jQuery('#{$this->grid->id} a.{$class}').live('click',$function);";

        if ($js !== array())
            Yii::app()->getClientScript()->registerScript(__CLASS__ . '#' . $this->id, implode("\n", $js));
    }
    /**
     * Registers the client scripts for the button column.Qtoggle type select
     */
    protected function registerClientScriptQt() {
        $js = array();

        $function = CJavaScript::encode($this->toggle_button['click']);
        $class = preg_replace('/\s+/', '.', $this->toggle_button['options']['class']);
        //$js[] = "jQuery('#{$this->grid->id} select.{$class}').live('change',$function);";
        //$js[] = "jQuery('#{$this->grid->id} select.{$class}').on('change',$function);";
        $js[] = "jQuery(document).on('change','#{$this->grid->id} select.{$class}',$function);";

        if ($js !== array())
            Yii::app()->getClientScript()->registerScript(__CLASS__ . '#' . $this->id, implode("\n", $js));
    }
    /**
     * Renders the data cell content.
     * This method renders the view, update and toggle buttons in the data cell.
     * @param integer $row the row number (zero-based)
     * @param mixed $data the data associated with the row
     */
    protected function renderDataCellContent($row, $data) {
        ob_start();
        if($this->action=='qtoggle' AND $this->queueType=='select')
            $this->renderSeltoggle($this->toggle_button, $row, $data);
         else
            $this->renderButton($this->toggle_button, $row, $data);

        $toggle_button = ob_get_contents();
        ob_clean();
        ob_end_clean();
        echo $toggle_button;
    }

    /**
     * Renders the header cell content.
     * This method will render a link that can trigger the sorting if the column is sortable.
     */
    protected function renderHeaderCellContent() {
        if ($this->grid->enableSorting && $this->sortable && $this->name !== null)
            echo $this->grid->dataProvider->getSort()->link($this->name, $this->header,array('class'=>'sort-link'));
        else if ($this->name !== null && $this->header === null) {
            if ($this->grid->dataProvider instanceof CActiveDataProvider)
                echo CHtml::encode($this->grid->dataProvider->model->getAttributeLabel($this->name));
            else
                echo CHtml::encode($this->name);
        }
        else
            parent::renderHeaderCellContent();
    }

    protected function renderSeltoggle($button, $row, $data) {
        if ($this->name !== null)
            $checked = CHtml::value($data, $this->name);
        $options = isset($button['options']) ? $button['options'] : array();

        $url = isset($button['url']) ? $this->evaluateExpression($button['url'], array('data' => $data, 'row' => $row)) : '#';
        $options=array_merge($options,array('data-href'=>$url));
         echo CHtml::dropDownList('val',$checked,$this->queue,$options);


    }
    /**
     * Renders a toggle button.
     * @param string $id the ID of the button
     * @param array $button the button configuration which may contain 'label', 'url', 'imageUrl' and 'options' elements.
     * See {@link buttons} for more details.
     * @param integer $row the row number (zero-based)
     * @param mixed $data the data object associated with the row
     */
    protected function renderButton($button, $row, $data) {
        if ($this->name !== null)
            $checked = CHtml::value($data, $this->name);

        if($this->action=='qtoggle'){
            if(!isset($this->queueTitles[$checked])||!isset($this->queue[$checked])){
                throw new CException(Yii::t('toggle_column', 'Unexpected Value - check jtogglecolumn settings for queue and queueTitles '));
            }
            $button['title'] = $this->queueTitles[$checked];
            $alt =CHtml::encode($button['title']);
            $url = isset($button['url']) ? $this->evaluateExpression($button['url'], array('data' => $data, 'row' => $row)) : '#';
            $options = isset($button['options']) ? $button['options'] : array();
            $options=(!isset($options['title']))?array_merge($options,array('title'=>$alt)):$options;
            switch($this->labeltype){
                case 'image':{
                echo CHtml::link(CHtml::image($this->queue[$checked], $alt), $url, $options);
                break;
                }
                case 'html':{
                echo CHtml::link($this->queue[$checked], $url, $options);
                break;
                }
                default:{
                echo CHtml::link(CHtml::encode($this->queue[$checked]), $url, $options);
                }
            }

        }else{
            $button['title'] = $checked ? $this->checkedButtonTitle : $this->uncheckedButtonTitle;
            $alt =CHtml::encode($button['title']);
            $url = isset($button['url']) ? $this->evaluateExpression($button['url'], array('data' => $data, 'row' => $row)) : '#';
            $options = isset($button['options']) ? $button['options'] : array();
            $options=(!isset($options['title']))?array_merge($options,array('title'=>$alt)):$options;
            switch($this->labeltype){
                case 'image':{
                $button['imageUrl'] = $checked ? $this->checkedButtonLabel : $this->uncheckedButtonLabel;
                echo CHtml::link(CHtml::image($button['imageUrl'], $alt), $url, $options);
                break;
                }
                case 'html':{
                $button['label'] = $checked ? $this->checkedButtonLabel : $this->uncheckedButtonLabel;
                echo CHtml::link($button['label'], $url, $options);
                break;
                }
                default:{
                $button['label'] = $checked ? $this->checkedButtonLabel : $this->uncheckedButtonLabel;
                echo CHtml::link(CHtml::encode($button['label']), $url, $options);
                }
            }
        }




    }

    /**
     * Renders the filter cell content.
     * This method will render the {@link filter} as is if it is a string.
     * If {@link filter} is an array, it is assumed to be a list of options, and a dropdown selector will be rendered.
     * Otherwise if {@link filter} is not false, a text field is rendered.
     * @since 1.1.1
     */
    protected function renderFilterCellContent() {

        if ($this->filter !== null) {
            if (is_string($this->filter))
                echo $this->filter;
            else if ($this->filter !== false && $this->grid->filter !== null && $this->name !== null && strpos($this->name, '.') === false) {
                if (is_array($this->filter))
                    echo CHtml::activeDropDownList($this->grid->filter, $this->name, $this->filter, array('id' => false, 'prompt' => ''));
                else if ($this->filter === null)
                    echo CHtml::activeTextField($this->grid->filter, $this->name, array('id' => false));
            }
            else
                parent::renderFilterCellContent();
        }
    }

}
