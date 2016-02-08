<?php
class Email extends CValidator
{
	
	/**
	 * Email pattern
	 */
        private $_basicPattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]+)$/';
	

	public $extra = array();
	

	/**
	 * Validates the attribute of the object.
	 * If there is any error, the error message is added to the object.
	 * @param CModel $object the object being validated
	 * @param string $attribute the attribute being validated
	 */
	protected function validateAttribute($object,$attribute)
	{
		// get the pattern
		$pattern = $this->elaboratePattern();
		// get the error message
		$message = $this->message ? $this->message : Yii::t('Email', '{attribute} Invalid');
		
		
		// validate the string
		$value=$object->$attribute;
		if(!preg_match($pattern, $value))
		{
			$this->addError($object,$attribute,$message);
		}
	}

	/**
	 * Returns the JavaScript needed for performing client-side validation.
	 * @param CModel $object the data object being validated
	 * @param string $attribute the name of the attribute to be validated.
	 * @return string the client-side validation script.
	 * @see CActiveForm::enableClientValidation
	 */
	public function clientValidateAttribute($object,$attribute)
	{

		// get the pattern
		$pattern = $this->elaboratePattern();
		// get the error message
		$message = $this->message ? str_replace('{attribute}', $attribute, $this->message) : Yii::t('Email', '{attribute} contains not allowed characters', array('{attribute}' => $attribute));

		$condition="!value.match({$pattern})";

		return "
if(".$condition.") {
	messages.push(".CJSON::encode($message).");
}
";
	}
	
	/**
	 * @return string the regular expression used for validation
	 */
	public function elaboratePattern()
	{
		$additionalParams = NULL;
			
		// add extra characters
		if (count($this->extra))
			$additionalParams .= implode('\\', $this->extra);
			
		return str_replace(array('{additionalParams}'), array($additionalParams), $this->_basicPattern);
	}
}
