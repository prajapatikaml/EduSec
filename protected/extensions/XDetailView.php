<?php
/**
 * XDetailView class file.
 *
 * @author rootbear
 * @link http://www.yiiframework.com/
 * @license http://www.yiiframework.com/license/
 * 
 * version: 1.0 - this is original copy of CDetailView class just rename to XDetail to work on;
 *                credit goes to original author qiang.xue 
 * 
 * version: 1.1 - supports multiple column pairs; new parameter {ItemColumns} added to specify column count
 * 
 * version: 2.0 - 2012-04-19
 *		supports nested {attributes} as group!
 * 
 */

Yii::import("zii.widgets.CDetailView");
class XDetailView extends CDetailView
{
	/**
     * Newly Added Parameters to support multiple columns
	 */
    //private $_aryColumns;
	public $_aryColumns;
 
    public $tagNameTR='tr';
    public $itemTemplate='<th>{label}</th><td>{value}</td>';
	public $itemTemplateMerge='<td colspan="2">{value}</td>';
	public $ItemColumns = 1;
 
    //different default value
    public $nullDisplay = '';
 
	/**
     * END::Newly Added Parameters to support multiple columns
	 */

	/**
	 * Initializes the detail view.
	 * This method will initialize required property values.
	 */
	public function init()
	{
		//$this->_aryColumns = array_fill(1, $this->ItemColumns, $this->itemTemplate);
		$this->_init();
        return parent::init();
	}

	private function _init()
	{
		$this->_aryColumns = array_fill(1, $this->ItemColumns, $this->itemTemplate);
	}
	
	/**
	 * Renders the detail view.
	 * This is the main entry of the whole detail view rendering.
     * ----
     * This is override function support multiple columns
	 */
	public function run()
	{
		echo $this->_getDetailView();
	}
	
	private function _getDetailView()
	{
		$result = '';
	
		$formatter=$this->getFormatter();
		$result .= CHtml::openTag($this->tagName,$this->htmlOptions);

		$i=0;
		$n=is_array($this->itemCssClass) ? count($this->itemCssClass) : 0;
						
        $j = 1; //new::current column seq. number
		foreach($this->attributes as $attribute)
		{
			if(is_string($attribute))
			{
				if(!preg_match('/^([\w\.]+)(:(\w*))?(:(.*))?$/',$attribute,$matches))
					throw new CException(Yii::t('zii','The attribute must be specified in the format of "Name:Type:Label", where "Type" and "Label" are optional.'));
				$attribute=array(
					'name'=>$matches[1],
					'type'=>isset($matches[3]) ? $matches[3] : 'text',
				);
				if(isset($matches[5]))
					$attribute['label']=$matches[5];
			}
			
			if(isset($attribute['visible']) && !$attribute['visible'])
				continue;

			$tr=array('{label}'=>'', '{class}'=>$n ? $this->itemCssClass[$i%$n] : '');
			if(isset($attribute['cssClass']))
				$tr['{class}']=$attribute['cssClass'].' '.($n ? $tr['{class}'] : '');

			if(isset($attribute['label']))
				$tr['{label}']=$attribute['label'];
			else if(isset($attribute['name']))
			{
				if($this->data instanceof CModel)
					$tr['{label}']=$this->data->getAttributeLabel($attribute['name']);
				else
					$tr['{label}']=ucwords(trim(strtolower(str_replace(array('-','_','.'),' ',preg_replace('/(?<![A-Z])[A-Z]/', ' \0', $attribute['name'])))));
			}

			if(!isset($attribute['type']))
				$attribute['type']='text';
			if(isset($attribute['value']))
				$value=$attribute['value'];
			else if(isset($attribute['name']))
				$value=CHtml::value($this->data,$attribute['name']);
			else
				$value=null;

			/*
			 * nested {attributes} supported added here by recursive call
			 *
			 */
			if(isset($attribute['attributes']) && is_array($attribute['attributes'])){
				$oChildXDView = new XDetailView();
				
				/*
				 * property which ALWAYS needs to inherit parent's property
				 *
				 */
				$oChildXDView->data = $this->data;				

				/*
				 * iterate through all public properties from parent
				 *
				 */
				foreach($this as $key => $value) {
					if (isset($attribute[$key])) 
						$oChildXDView->{$key} = $attribute[$key];
				}

				/*
				 * get the child's XDetailView content as 'value' property
				 *
				 */				
				$oChildXDView->_init();
				
				$value = $oChildXDView->_getDetailView();
				
				/*
				 * reset sub-object's display block type
				 *
				 */
				$attribute['type']='raw';
				
				/*
				 * magic starts here
				 *
				 */
				$tr['{value}']=$value===null ? $this->nullDisplay : $formatter->format($value,$attribute['type']);

				//merge label & value, since there is no label for child's block
				$this->_aryColumns[$j] = strtr(isset($attribute['template']) ? $attribute['template'] : $this->itemTemplateMerge,$tr);
			
			} else {
				$tr['{value}']=$value===null ? $this->nullDisplay : $formatter->format($value,$attribute['type']);

				$this->_aryColumns[$j] = strtr(isset($attribute['template']) ? $attribute['template'] : $this->itemTemplate,$tr);
			}
 
            if ($j == $this->ItemColumns){
				$result .= CHtml::openTag($this->tagNameTR,array('class'=>$n ? $this->itemCssClass[intval($i/$this->ItemColumns)%$n] : ''));
                for ( $k = 1; $k <= $this->ItemColumns; $k += 1) {
					$result .= $this->_aryColumns[$k];
                    //reset in case the total [fields count] % [itemcolumns] <> 0
                    $this->_aryColumns[$k] = '<th></th><td></td>';
                }
				$result .= CHtml::closeTag($this->tagNameTR);
                $j = 1;
            } else {
                $j = $j + 1;
            }
			$i++;
        }
			//any left over fields?
			if ($i % $this->ItemColumns != 0){
			$result .= CHtml::openTag($this->tagNameTR,array('class'=>$n ? $this->itemCssClass[intval($i/$this->ItemColumns)%$n] : ''));
				for ( $k = 1; $k <= $this->ItemColumns; $k += 1) {
				$result .= $this->_aryColumns[$k];
			}
			$result .= CHtml::closeTag($this->tagNameTR);
		}

		$result .= CHtml::closeTag($this->tagName);

		return $result;
	}
}
