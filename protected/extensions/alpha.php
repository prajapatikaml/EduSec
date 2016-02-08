<?php
/**
 * alpha class file.
 *
 * @author Nicola Puddu
 */

/**
 * alpha validates that the attribute value is a alpha/alphanumeric string.
 *
 * @author Nicola Puddu
 */
class alpha extends CValidator
{
	
	/**
	 * @var string the basic pattern used to create the regular expression.
	 */
	private $_basicPattern = '/^[a-zA-Z{additionalParams}]{{minChars},{maxChars}}$/';
	/**
	 * @var string the additional parameter for numeric data.
	 */
	private $_numericData = '0-9';
	/**
	 * @var string the additional parameter for spaces
	 */
	private $_spaces = ' ';
	/**
	 * @var string list of all latin accented letters
	 */
	private $_allAccentedLetters = 'ÀÁÂÃÄÅĀĄĂÆÇĆČĈĊĎĐÈÉÊËĒĘĚĔĖĜĞĠĢĤĦÌÍÎÏĪĨĬĮİĲĴĶŁĽĹĻĿÑŃŇŅŊÒÓÔÕÖØŌŐŎŒŔŘŖŚŠŞŜȘŤŢŦȚÙÚÛÜŪŮŰŬŨŲŴÝŶŸŹŽŻàáâãäåāąăæçćčĉċďđèéêëēęěĕėƒĝğġģĥħìíîïīĩĭįıĳĵķĸłľĺļŀñńňņŉŋòóôõöøōőŏœŕřŗśšşŝșťţŧțùúûüūůűŭũųŵýÿŷžżźÞþßſÐð';
	/**
	 * @var string list of most common latin accented letters
	 */
	private $_basicAccentedLetters = 'ÀÁÂÃÄĀĂÈÉÊËĚĔĒÌÍÎÏĪĨĬÒÓÔÕÖŌÙÚÛÜŪŬŨàáâãäāăèéêëēěĕìíîïīĩĭòóôõöōŏùúûüūŭũ';
	
	/**
	 * @var int minimum number of characters to validate the string
	 */
	public $minChars = 1;
	/**
	 * @var int maximum number of characters to validate the string
	 */
	public $maxChars = NULL;
	/**
	 * @var boolean
	 */
	public $allowNumbers = false;
	/**
	 * @var boolean
	 */
	public $allowSpaces = false;
	/**
	 * @var boolean
	 */
	public $allAccentedLetters = false;
	/**
	 * @var boolean
	 */
	public $accentedLetters = false;
	/**
	 * @var array list of additional characters allowed
	 */
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
		$message = $this->message ? $this->message : Yii::t('alpha', '{attribute} Invalid');
		
		
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
		$message = $this->message ? str_replace('{attribute}', $attribute, $this->message) : Yii::t('alpha', '{attribute} contains not allowed characters', array('{attribute}' => $attribute));

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
		// add numbers
		if ($this->allowNumbers)
			$additionalParams .= $this->_numericData;
		// add spaces
		if ($this->allowSpaces)
			$additionalParams .= $this->_spaces;
		
		// add accented letters
		if ($this->allAccentedLetters)
			$additionalParams .= $this->_allAccentedLetters;
		elseif ($this->accentedLetters)
			$additionalParams .= $this->_basicAccentedLetters;
			
		// add extra characters
		if (count($this->extra))
			$additionalParams .= implode('\\', $this->extra);
			
		return str_replace(array('{additionalParams}', '{minChars}', '{maxChars}'), array($additionalParams, $this->minChars, $this->maxChars), $this->_basicPattern);
	}
}
