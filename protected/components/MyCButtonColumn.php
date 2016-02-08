<?php

class MyCButtonColumn extends CButtonColumn
{
	public function init()
	{
		parent::init();
	}

	protected function initDefaultButtons()
	{
		if($this->viewButtonLabel===null)
			$this->viewButtonLabel=Yii::t('zii','View');
		if($this->updateButtonLabel===null)
			$this->updateButtonLabel=Yii::t('zii','Edit');
		if($this->deleteButtonLabel===null)
			$this->deleteButtonLabel=Yii::t('zii','Delete');
		if($this->viewButtonImageUrl===null)
			$this->viewButtonImageUrl=$this->grid->baseScriptUrl.'/view.png';
		if($this->updateButtonImageUrl===null)
			$this->updateButtonImageUrl=$this->grid->baseScriptUrl.'/update.png';
		if($this->deleteButtonImageUrl===null)
			$this->deleteButtonImageUrl=$this->grid->baseScriptUrl.'/delete.png';
		if($this->deleteConfirmation===null)
			$this->deleteConfirmation=Yii::t('zii','Are you sure you want to delete this item?');

		foreach(array('view','update','delete') as $id)
		{
			$button=array(
				'label'=>$this->{$id.'ButtonLabel'},
				'url'=>$this->{$id.'ButtonUrl'},
				'imageUrl'=>$this->{$id.'ButtonImageUrl'},
				'options'=>$this->{$id.'ButtonOptions'},
			);
			if(isset($this->buttons[$id]))
				$this->buttons[$id]=array_merge($button,$this->buttons[$id]);
			else
				$this->buttons[$id]=$button;
		}

		if(!isset($this->buttons['delete']['click']))
		{
			if(is_string($this->deleteConfirmation))
				$confirmation="if(!confirm(".CJavaScript::encode($this->deleteConfirmation).")) return false;";
			else
				$confirmation='';

			if(Yii::app()->request->enableCsrfValidation)
			{
				$csrfTokenName = Yii::app()->request->csrfTokenName;
				$csrfToken = Yii::app()->request->csrfToken;
				$csrf = "\n\t\tdata:{ '$csrfTokenName':'$csrfToken' },";
			}
			else
				$csrf = '';

			if($this->afterDelete===null)
				$this->afterDelete='function(){}';

			$this->buttons['delete']['click']=<<<EOD
function() {
	$confirmation
	var th=this;
	var afterDelete=$this->afterDelete;
	$.fn.yiiGridView.update('{$this->grid->id}', {
		type:'POST',
		url:$(this).attr('href'),$csrf
		success:function(data) {
			$.fn.yiiGridView.update('{$this->grid->id}');
			afterDelete(th,true,data);
		},
		error:function(XHR) {
			return afterDelete(th,false,XHR);
		}
	});
	return false;
}
EOD;
		}
	}

	/**
	 * Initializes the default buttons (view, update and delete).
	 */
}
