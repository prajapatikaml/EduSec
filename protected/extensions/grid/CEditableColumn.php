<?php
/**
 * CEditableColumn class file.
 *
 * @author Herbert Maschke <thyseus@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2010 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

Yii::import('zii.widgets.grid.CGridColumn');

/**
 * CEditableColumn represents a grid view column that is editable.
 *
 * @author Herbert Maschke <thyseus@gmail.com>
 * @package zii.widgets.grid
 * @since 1.1
 */
class CEditableColumn extends CGridColumn
{
	/**
	 * @var string the attribute name of the data model. The corresponding attribute value will be rendered
	 * in each data cell. If {@link value} is specified, this property will be ignored
	 * unless the column needs to be sortable.
	 * @see value
	 * @see sortable
	 */
	public $name;
	/**
	 * @var string a PHP expression that will be evaluated for every data cell and whose result will be rendered
	 * as the content of the data cells. In this expression, the variable
	 * <code>$row</code> the row number (zero-based); <code>$data</code> the data model for the row;
	 * and <code>$this</code> the column object.
	 */
	public $value;
	public $sortable;

	/**
	 * Initializes the column.
	 */
	public function init()
	{
		parent::init();
		if($this->name===null && $this->value===null)
			throw new CException(Yii::t('zii','Either "name" or "value" must be specified for CEditableColumn.'));
	}

	/**
	 * Renders the header cell content.
	 * This method will render a link that can trigger the sorting if the column is sortable.
	 */
	protected function renderHeaderCellContent()
	{
		if($this->grid->enableSorting && $this->sortable && $this->name!==null)
			echo $this->grid->dataProvider->getSort()->link($this->name,$this->header);
		else
			parent::renderHeaderCellContent();
	}

	/**
	 * Renders the data cell content.
	 * @param integer the row number (zero-based)
	 * @param mixed the data associated with the row
	 */
	protected function renderDataCellContent($row,$data)
	{
		$field = $this->name;
		printf('<input style="width:100%%" name="%s[%s]" type="text" value="%s" />', $data->tableSchema->name, $field, $data->$field);
	}
}
