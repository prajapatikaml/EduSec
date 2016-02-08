<?php

/**
* SelGridView class file.
* @author Vitaliy Potapov <noginsk@rambler.ru>
*/

Yii::import('zii.widgets.grid.CGridView');

/**
* SelGridView v2.3
* 
* SelGridView remembers selected rows of gridview when sorting or navigating by pages. 
* Also it can select particular rows by GET param when page is loading
*
*/

class SelGridView extends CGridView
{
    /**
    * GET param name to pass selected row(s)
    * 
    * @var mixed
    */
    public $selVar;

    public $selBaseScriptUrl;

    public function init()
    {
        if($this->selectableRows > 0) {
            //generate name of variable for selection from request
            if(empty($this->selVar)) {
                $id = $this->dataProvider->getId();
                if(empty($id)) $id = $this->id;
                $this->selVar = (empty($id)) ? 'sel' : $id.'_sel';
            }
            //publish required assets
            if($this->selBaseScriptUrl===null)
                $this->selBaseScriptUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.selgridview.assets'));

        }
        parent::init();
    }


    /**
    * Creates column objects and initializes them. 
    * Automatically add hidden checkbox column.
    */
    protected function initColumns()
    {
        parent::initColumns();

        if($this->selectableRows == 0) return;

        //define primaryKey expression
        if($this->dataProvider instanceOf CActiveDataProvider) {
            $primaryKey = '$data->primaryKey';
        } else {
            $primaryKey = '$data["'.$this->dataProvider->keyField.'"]';
        }

        $checkedExpression = 'isset($_GET["'.$this->selVar.'"]) ? in_array('.$primaryKey.', is_array($_GET["'.$this->selVar.'"]) ? $_GET["'.$this->selVar.'"] : array($_GET["'.$this->selVar.'"])) : false;';

        //if gridview already has user defined Checkbox column --> set "checked" and exit
        //thanks to Horacio Segura http://www.yiiframework.com/extension/selgridview/#c7346
        foreach($this->columns as $col) {
            if($col instanceof CCheckBoxColumn) {
                $col->checked = $checkedExpression;
                $col->init();
                return;
            }
        }

        //creating hidden checkbox column
        $checkboxColumn = new CCheckBoxColumn($this);   
        $checkboxColumn->checked = $checkedExpression;
        $checkboxColumn->htmlOptions = array('style'=>'display:none');
        $checkboxColumn->headerHtmlOptions = array('style'=>'display:none');
        $checkboxColumn->init(); 

        $this->columns[] = $checkboxColumn;
    }

    /**
    * Registers necessary client scripts. 
    * Automaticlly prepend user's beforeajaxUpdate with needed code that will modify GET params when navigating and sorting
    */
    public function registerClientScript()
    {
        parent::registerClientScript(); 

        if($this->selectableRows > 0) {
            $id = $this->getId();

            $options=array(
            'selVar'=>$this->selVar,
            );

            $options=CJavaScript::encode($options);

            $cs=Yii::app()->getClientScript();
            $cs->registerScriptFile($this->selBaseScriptUrl.'/jquery.selgridview.js',CClientScript::POS_END);
            $cs->registerScript(__CLASS__.'#'.$id.'-sel',"jQuery('#$id').selGridView($options);");
        }
    }
}
