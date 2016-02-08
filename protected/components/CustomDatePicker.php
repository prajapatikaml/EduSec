<?php

Yii::import('zii.widgets.jui.CJuiDatePicker');

class CustomDatePicker extends CJuiDatePicker
{

	public function init()
	{
	      return $this->options['maxDate'] = date('d')."-".date('m')."-".date('Y');
	}
}
?>
