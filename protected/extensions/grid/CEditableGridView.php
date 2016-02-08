<?php

/**
 * CEditableGridView represents a grid view which contains editable rows
 * and an optional 'Quickbar' which fires an action that quickly adds
 * entries to the table.
 *
 * To make a Column editable you have to assign it to the class 'CEditableColumn'
 *
 * Use it like the CGridView:
 *
 * $this->widget('zii.widgets.grid.CEditableGridView', array(
 *     'dataProvider'=>$dataProvider,
 *     'showQuickBar'=>'true',
 *     'quickCreateAction'=>'QuickCreate', // will be actionQuickCreate()
 *     'columns'=>array(
 *           'title',          // display the 'title' attribute
 *            array('header' => 'editMe', 'name' => 'editable_row', 'class' => 'CEditableColumn')
 *     ));
 *
 * With this Config, the column "editable_row" gets rendered with
 * inputfields. The Table-header will be called "editMe".
 *
 * You have to define a action that receives $_POST data like this:
 *   public function actionQuickCreate() {
 *	   $model=new Model;
 *      if(isset($_POST['Model']))
 *       {
 * 	      $model->attributes=$_POST['Model'];
 * 	      if($model->save())
 * 	      $this->redirect(array('admin')); //<-- assuming the Grid was used unter view admin/
 *       }
 *     }
 *
 * @author Herbert Maschke <thyseus@gmail.com>
 * @package zii.widgets.grid
 * @since 1.1
 */

Yii::import('zii.widgets.grid.CGridView');
Yii::import('application.extensions.CEditableColumn');
Yii::import('application.extensions.Relation');

class CEditableGridView extends CGridView {
	public $showQuickBar=1;
	public $quickCreateAction='QuickCreate';
	public $quickUpdateAction='QuickUpdate';
	public $addButtonValue='+';

	public function renderQuickBar() {
		printf ('<form method="post" action="index.php?r=%s/%s">',$this->dataProvider->modelClass,$this->quickCreateAction);
				echo "<tr>";
		foreach($this->columns as $column) 
		{
			if(!$column instanceof CButtonColumn) 
			{
					if($column instanceof CCheckBoxColumn) 
						printf('<td><input name="%s[%s]" type="checkbox" /></td>', $this->dataProvider->modelClass, $column->name);
					else if($column instanceof CDataColumn 
						|| $column instanceof CEditableColumn) 
					{
						if(strstr($column->name, '.') != FALSE) // Column contains an relation
						{
							$data = explode('.', $column->name);
							$this->widget('Relation', array('model' => $this->dataProvider->modelClass, 'relation' => $data[0] , 'fields' => $data[1])); 
						} else {
						printf('<td><input name="%s[%s]" type=text style="width:100%%;" /></td>', $this->dataProvider->modelClass, $column->name);
					  }	
					}
					else if($column instanceof CLinkColumn) 
						printf('<td></td>');
					else
						printf('<td></td>');
				}
			}
			printf('<td><input type=submit value="%s"></td>', $this->addButtonValue);
		echo "</tr>";
		echo "</form>";

	}

	public function renderTableBody() {
		parent::renderTableBody();
		$this->renderQuickBar();
	}

}
