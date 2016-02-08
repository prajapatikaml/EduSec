<?php
class ReCopyWidget extends CWidget {

    public $targetClass='clone'; //Target CSS class target for duplicate
    public $limit=0; //The number of allowed copies. Default: 0 is unlimited
    public $addButtonId; // Add button id. Set id differently if this widget is called multiple times per page.
    public $addButtonLabel='Add more'; //Add button text.
    public $addButtonCssClass=''; //Add button CSS class.
    public $removeButtonLabel='Remove'; //Remove button text
    public $removeButtonCssClass='recopy-remove'; //Remove button CSS class.
    
    public $excludeSelector; //A jQuery selector used to exclude an element and its children
    public $copyClass; //A class to attach to each copy
    public $clearInputs; //Boolean Option to clear each copies text input fields or textarea
    
    private $_assetsUrl;

    /**
     * Initializes the widgets
     */
    public function init() {
        parent::init();
        if ($this->_assetsUrl === null) {
            $assetsDir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
            $this->_assetsUrl = Yii::app()->assetManager->publish($assetsDir);
        }
        
        $this->addButtonId=trim($this->addButtonId);
        if(empty($this->addButtonId))
            $this->addButtonId='recopy-add';
        
        if($this->limit)
            $this->limit= (is_numeric($this->limit) && $this->limit > 0)? (int)ceil($this->limit):0;
        
    }

    /**
     * Execute the widgets
     */
    public function run() {
        if($this->limit==1) return ;
        
        Yii::app()->clientScript
            ->registerScriptFile($this->_assetsUrl . '/reCopy.min.js', CClientScript::POS_HEAD)
            ->registerScript(__CLASS__.$this->addButtonId, '
                $(function(){
                    var removeLink = \' <a class="'.$this->removeButtonCssClass.'" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false">'.$this->removeButtonLabel.'</a>\';
                    $("a#'.$this->addButtonId.'").relCopy({'.implode(', ', array_filter(array(
                        empty($this->excludeSelector)?'':'excludeSelector: "'.$this->excludeSelector.'"',
                        empty($this->limit)? '': 'limit: '.$this->limit,
                        empty($this->copyClass)? '': 'copyClass: "'.$this->copyClass.'"',
                        $this->clearInputs===true? 'clearInputs: true':'',
                        $this->clearInputs===false? 'clearInputs: false':'',
                        'append: removeLink',
                    ))).'});	
                });
            ', CClientScript::POS_END);
        
            echo CHtml::link($this->addButtonLabel, '#', array(
                'id'=>$this->addButtonId,
                'rel'=>'.'.$this->targetClass, 
                'class'=>$this->addButtonCssClass)
            );
    }
}//end class