<?php
 /**
 * DetailView4Col class file.
 *
 * Basically the same as the CDetailView class file with slight additions/variations.
 *
 * To CDetailView:
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2011 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * 
 * Additions / Variations:
 * @author c@cba <c@cba-solutions.org>
 *
 * DetailView4Col displays the details of a model in a 4-column table.
 * By default two model attribues are displayed per row. 
 * Model attributes that are explicitly specified as 'one-row' attributes
 * will be displayed in one single row where the label spans one, and the value spans 3 columns.
 * It is also possible to specify one or more 'header' rows, which span 4 columns 
 * and may contain a header/description for the immediate rows underneath.
 *
 * DetailView4Col uses the {@link attributes} property to determines which model attributes
 * should be displayed and how they should be formatted.
 *
 * Usage is basically the same as CDetailView. 
 * A typical usage of DetailView4Col is as follows:
 * <pre>
 * $this->widget('ext.widgets.DetailView4Col', array(
 *	'data'=>$model,
 *	'attributes'=>array(
 *		array(
 *			'header'=>'Personal Data',
 *		),
 *		'id', 'gender',
 *		'first_name', 'insurance_number',
 *		'last_name', 'birth_date',
 *		'phone_number', 'birth_place',
 *		array(
 *			'name'=>'Adresse',
 *			'oneRow'=>true,
 *			'type'=>'raw',
 *			'value'=>$model->address.', '.$model->postal_code.' '.$model->city,
 *		),
 *		array(
 *			'header'=>t("EmergencyInformation"),
 *		),
 *		'emergency_contact', 'medication',
 *		'emergency_phone', 'allergies',
 *		array(
 *			'name'=>'emergancy_note',
 *			'oneRow'=>true,
 *		),
 *		array(
 *			'header'=>'Parents Data',
 *		),
 *		'parent.name', 'parent.phone_num',
 *		'parent.relation', 'parent.email',
 *	)
 * )); 
 * </pre>
 *
 */
class DetailView4Col extends CWidget
{
	private $_formatter;

	/**
	 * @var mixed the data model whose details are to be displayed. This can be either a {@link CModel} instance
	 * (e.g. a {@link CActiveRecord} object or a {@link CFormModel} object) or an associative array.
	 */
	public $data;
	/**
	 * @var array a list of attributes to be displayed in the detail view. Each array element
	 * represents the specification for displaying one particular attribute.
	 *
	 * An attribute can be specified as a string in the format of "Name:Type:Label".
	 * Both "Type" and "Label" are optional.
	 *
	 * "Name" refers to the attribute name. It can be either a property (e.g. "title") or a sub-property (e.g. "owner.username").
	 *
	 * "Label" represents the label for the attribute display. If it is not given, "Name" will be used to generate the appropriate label.
	 *
	 * "Type" represents the type of the attribute. It determines how the attribute value should be formatted and displayed.
	 * It is defaulted to be 'text'.
	 * "Type" should be recognizable by the {@link formatter}. In particular, if "Type" is "xyz", then the "formatXyz" method
	 * of {@link formatter} will be invoked to format the attribute value for display. By default when {@link CFormatter} is used,
	 * these "Type" values are valid: raw, text, ntext, html, date, time, datetime, boolean, number, email, image, url.
	 * For more details about these types, please refer to {@link CFormatter}.
	 *
	 * An attribute can also be specified in terms of an array with the following elements:
	 * <ul>
	 * <li>label: the label associated with the attribute. If this is not specified, the following "name" element
	 * will be used to generate an appropriate label.</li>
	 * <li>name: the name of the attribute. This can be either a property or a sub-property of the model.
	 * If the below "value" element is specified, this will be ignored.</li>
	 * <li>value: the value to be displayed. If this is not specified, the above "name" element will be used
	 * to retrieve the corresponding attribute value for display. Note that this value will be formatted according
	 * to the "type" option as described below.</li>
	 * <li>type: the type of the attribute that determines how the attribute value would be formatted.
	 * Please see above for possible values.
	 * <li>cssClass: the CSS class to be used for this item. This option is available since version 1.1.3.</li>
	 * <li>template: the template used to render the attribute. If this is not specified, {@link itemTemplate}
	 * will be used instead. For more details on how to set this option, please refer to {@link itemTemplate}.
	 * This option is available since version 1.1.1.</li>
	 * <li>visible: whether the attribute is visible. If set to <code>false</code>, the table row for the attribute will not be rendered.
	 * This option is available since version 1.1.5.</li>
	 * </ul>
	 */
	public $attributes;
	/**
	 * @var string the text to be displayed when an attribute value is null. Defaults to "Not set".
	 */
	public $nullDisplay;
	/**
	 * @var string the name of the tag for rendering the detail view. Defaults to 'table'.
	 * @see itemTemplate
	 */
	public $tagName='table';
	/**
	 * @var string the templates used to render a single attribute.
	 * These tokens are recognized: "{class}", "{label}" and "{value}". They will be replaced
	 * with the CSS class name for the item, the label and the attribute value, respectively.
	 * @see itemCssClass
	 */
	public $itemTemplateLeft="<tr class=\"{class}\"><td class='col2'><span class='detail-label'>{label}  :</span><span class='detail-value'>{value}</span></td>\n";
	public $itemTemplateRight="<td class='col2'><span class='detail-label'>{label}  :</span><span class='detail-value'>{value}</span></td></tr>\n";
	public $itemTemplateOneRow="<tr class=\"{class}\"><th>{label}</th><td colspan=3>{value}</td></tr>\n";
	public $itemTemplateHeader="<tr class=\"{class}\"><th colspan=4>{label}</th></tr>\n";
	/**
	 * @var array the CSS class names for the items displaying attribute values. If multiple CSS class names are given,
	 * they will be assigned to the items sequentially and repeatedly.
	 * Defaults to <code>array('odd', 'even')</code>.
	 */
	public $itemCssClass=array('odd','even');
	/**
	 * @var array the HTML options used for {@link tagName}
	 */
	public $htmlOptions=array('class'=>'detail-view');
	/**
	 * @var string the base script URL for all detail view resources (e.g. javascript, CSS file, images).
	 * Defaults to null, meaning using the integrated detail view resources (which are published as assets).
	 */
	public $baseScriptUrl;
	/**
	 * @var string the URL of the CSS file used by this detail view. Defaults to null, meaning using the integrated
	 * CSS file. If this is set false, you are responsible to explicitly include the necessary CSS file in your page.
	 */
	public $cssFile;

	/**
	 * Initializes the detail view.
	 * This method will initialize required property values.
	 */
	public function init()
	{
		if($this->data===null)
			throw new CException(Yii::t('zii','Please specify the "data" property.'));
		if($this->attributes===null)
		{
			if($this->data instanceof CModel)
				$this->attributes=$this->data->attributeNames();
			else if(is_array($this->data))
				$this->attributes=array_keys($this->data);
			else
				throw new CException(Yii::t('zii','Please specify the "attributes" property.'));
		}
		if($this->nullDisplay===null)
			$this->nullDisplay='<span class="null">'.Yii::t('zii','Not set').'</span>';
		$this->htmlOptions['id']=$this->getId();

		if($this->baseScriptUrl===null)
			$this->baseScriptUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('zii.widgets.assets')).'/detailview';

		if($this->cssFile!==false)
		{
			if($this->cssFile===null)
				$this->cssFile=$this->baseScriptUrl.'/styles.css';
			Yii::app()->getClientScript()->registerCssFile($this->cssFile);
		}
	}

	/**
	 * Renders the detail view.
	 * This is the main entry of the whole detail view rendering.
	 */
	public function run()
	{
		$formatter=$this->getFormatter();
		echo CHtml::openTag($this->tagName,$this->htmlOptions);

		$i=0; // c@cba : $i counts the rows. "itemCssClass"es are assigned accordingly. Below we need to make adjustments, so the counting remains correct.
		$open_row = false;
		$n=is_array($this->itemCssClass) ? count($this->itemCssClass) : 0;
		
		$tr_empty=array('{label}'=>'', '{class}'=>'', '{value}'=>'');
						
		foreach($this->attributes as $attribute)
		{
			// c@cba : Adjustment to $i : If currently (openRow == true) AND the current attribute is header or oneRow, we will
			// need to close the row and start a new row. Thus $i must be increased by one for that...
			if( $open_row == true && is_array($attribute) && (isset($attribute['header']) || isset($attribute['oneRow'])) )
				$i++;
			
			if(is_array($attribute) && isset($attribute['header'])) {
				$tr = $tr_empty;
				$tr['{label}'] = $attribute['header'];
				$tr['{class}'] = ($n ? $this->itemCssClass[$i%$n] : '') . ' header';
				if(isset($attribute['cssClass']))
					$tr['{class}'] = $attribute['cssClass'] . ' ' . $tr['{class}'];
				if($open_row == true) { // close previous row
					echo strtr($this->itemTemplateRight,$tr_empty); 
					$open_row = false;
				}
				echo strtr($this->itemTemplateHeader,$tr);
				$i++;
			}
			else {
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

				$tr['{value}']=$value===null ? $this->nullDisplay : $formatter->format($value,$attribute['type']);

				if(isset($attribute['oneRow']) && $attribute['oneRow'] === true) {
					if($open_row == true) { // close previous row
						echo strtr($this->itemTemplateRight,$tr_empty); 
						$open_row = false;
					}
					echo strtr($this->itemTemplateOneRow,$tr);
					$i++;
				}
				else {
					if($open_row == true) {
						echo strtr($this->itemTemplateRight,$tr);
						$open_row = false;
						$i++;
					}
					else {
						echo strtr($this->itemTemplateLeft,$tr);
						$open_row = true;
					}
				}
				//echo strtr(isset($attribute['template']) ? $attribute['template'] : $this->itemTemplate,$tr);
				
			}
															
		}

		echo CHtml::closeTag($this->tagName);
	}

	/**
	 * @return CFormatter the formatter instance. Defaults to the 'format' application component.
	 */
	public function getFormatter()
	{
		if($this->_formatter===null)
			$this->_formatter=Yii::app()->format;
		return $this->_formatter;
	}

	/**
	 * @param CFormatter $value the formatter instance
	 */
	public function setFormatter($value)
	{
		$this->_formatter=$value;
	}
}
