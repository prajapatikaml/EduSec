<?php

/**
 * ERunActionsIntervalFilter.php
 *
 * Filter for check time interval
 * A request to the controller action(s) is only allowed once within the specified interval
 *
 * PHP version 5.2+
 *
 * @author Joe Blocher <yii@myticket.at>
 * @copyright 2011 myticket it-solutions gmbh
 * @license New BSD License
 * @package runactions
 * @version 1.1
 */

Yii::import('ext.runactions.components.ERunActions');

class ERunActionsIntervalFilter extends CFilter
{
	/**
	 * Should the interval be recorded for every client request
	 *
	 * @var boolean $perClient
	 */
	public $perClient = false;

	/**
	 * Set the allowed interval in seconds.
	 * Within this interval a action can only be executed once.
	 *
	 * @var integer $interval
	 */
	public $interval = 60; // 1 minute

	/**
	 * The http error number
	 *
	 * @var integer $httpErrorNo
	 */
	public $httpErrorNo = 403;

	/**
	 * The http error message
	 *
	 * @var string $httpErrorMessage
	 */
	public $httpErrorMessage = 'Forbidden';

	/**
	 * Get the unique id of the requested action
	 *
	 * @param CFilterChain $filterChain
	 * @return string
	 */
	protected function getIntervalId($filterChain)
	{
		$clientId = $this->perClient ? Yii::app()->request->userHostAddres : '';
		return $filterChain->controller->id .'_'.$filterChain->action->id.'_'.$clientId;
	}

	/**
	 * Check the request interval
	 *
	 * @param CFilterChain $filterChain
	 * @return boolean
	 */
	protected function preFilter($filterChain)
	{
		$id = $this->getIntervalId($filterChain);
		$result = ERunActions::checkInterval($this->interval,$id);
		if (!$result)
			throw new CHttpException($this->httpErrorNo,$this->httpErrorMessage);

		return $result;
	}

	/**
	 * Register the request interval
	 *
	 * @param CFilterChain $filterChain
	 * @return boolean
	 */
	protected function postFilter($filterChain)
	{
		$id = $this->getIntervalId($filterChain);
		ERunActions::registerInterval($this->interval,$id);
	}

}