<?php

/**
 * ERunActionsHttpClient.php
 *
 * Helper class for running actions
 * Usage see readme.txt
 *
 * PHP version 5.2+
 *
 * @author Joe Blocher <yii@myticket.at>
 * @copyright 2011 myticket it-solutions gmbh
 * @license New BSD License
 * @package runactions
 * @version 1.1
 */
class ERunActions extends CWidget
{
	//Use this constants in the config files
	const TYPE_ACTION = 'runAction';
	const TYPE_SCRIPT = 'runScript';
	const TYPE_TOUCH = 'touchUrl';
	const TYPE_TOUCHEXT = 'touchUrlExt';

	/**
	 * Set the allowed interval in seconds.
	 * Within this interval a action can only be executed once.
	 *
	 * @var integer $interval
	 */
    public $interval = 0;

	/**
	 * Set the allowed ip for executing config scripts
	 * This parameter can be set for each action configured in the config script
	 * See comments in runactions/config/cron.php
	 *
	 * @var boolean $allowSelectConfig
	 */
	public $allowedIps = array();


	/**
	 * The default config script to execute when running cron
	 * @see RunActionsController.php
	 *
	 * By default this is runactions/config/cron.php
	 *
	 * @var boolean $allowSelectConfig
	 */
	public $defaultConfig = 'cron';

	/**
	 * Allow to select a config file by url parameter
	 * @see RunActionsController.php
	 *
	 * If false always the defined $defaultConfig script above will be executed
	 *
	 * @var boolean $allowSelectConfig
	 */
	public $allowSelectConfig = true;

	/**
	 * Log the output of the running controller action
	 * @var boolean $logOutput
	 */
	public $logOutput=false;

	/**
	 * Suppress the output of the running controller action
	 * @var boolean $silent
	 */
	public $silent=true;

	/**
	 * Whether to ignore the controller filters on 'runAction'
	 * @var boolean $ignoreFilters
	 */
	public $ignoreFilters = true;

	/**
	 * Whether to ignore the controllers beforeAction and afterAction methods
	 * @var boolean $ignoreBeforeAfterAction
	 */
	public $ignoreBeforeAfterAction = true;

	/**
	 * The alias path to the config scripts
	 * @var string $configPathAlias
	 */
	public $configPathAlias = 'ext.runactions.config';

	/**
	 * The name of the config script to execute
	 * or a configuration array like a script returns
	 * @var mixed $config string or array
	 */
	public $config;

	/**
	 * Used internally to count successful actions when running preconfigured scripts
	 * @var integer $_successCount
	 */
	private $_successCount;
	/**
	 * Used internally to count failed actions when running preconfigured scripts
	 * @var integer $_failedCount
	 */
	private $_failedCount;

	/**
	 * Check if runaction GET param is set
	 * The parameter is set, when a controller action is called by the runAction method
	 *
	 * Use this in the controller action for your needs
	 *
	 * @return boolean
	 */
	public static function isRunActionRequest()
	{
		return isset($_GET['_runaction']);
	}

	/**
	 * Check if _runaction_batchmode GET param is set
	 * The parameter is set, when the preconfigured config script are executed
	 *
	 * Use this in the controller action for your needs
	 *
	 * @return boolean
	 */
	public static function isBatchMode()
	{
		return isset($_GET['_runaction_batchmode']);
	}

	/**
	 * Check if touch GET param is set
	 * The parameter is set,  when the methods touchUrl or touchUrlExt are called
	 *
	 * @return boolean
	 */
	public static function isTouchActionRequest()
	{
	  return isset($_GET['_runaction_touch']);
	}

	/**
	 * Request by the small footprint ERunActionsHttpClient
	 * Uses a simple fsockopen
	 * No support for redirect, certificates, ...
	 *
	 * @param mixed $url the url to touch
	 * @param mixed $postData Data to post to the touched url
	 * @param string $contentType of the postData
	 */
	public static function touchUrl($url,$postData=null,$contentType=null,$urlParams=array())
	{
		Yii::import('ext.runactions.components.ERunActionsHttpClient');
		$client = new ERunActionsHttpClient(true);
		self::_parseUrl($url,$host,$port,$uri,$urlParams);

		$verb = empty($postData)? 'GET' : 'POST';
		$urlParams = array_merge($urlParams,array('_runaction_touch'=>1));

		$client->request($host,$port,$uri,$verb,$urlParams,$postData,$contentType);
	}

	/**
	 * Touch a url by using the EHttpClient extension
	 * Sends a request without waiting for response
	 * Use this function if you have to care about https, proxies ...
	 *
	 * @param string $url the url to touch
	 * @param mixed $postData Data to post to the touched url
	 * @param string $contentType of the postData
	 * @param array $httpClientConfig the configuration for the EHttpClient
	 */
	public static function touchUrlExt($url,$postData=null,$contentType=null,$httpClientConfig=array())
	{
		Yii::import('ext.runactions.components.EHttpTouchClient');

		$client = new EHttpTouchClient($url,$httpClientConfig);

		$client->setParameterGet('_runaction_touch', 1);

		$method = 'GET';
		if (!empty($postData))
		{
			$method = 'POST';

			if (is_array($postData))
				$client->setParameterPost($postData);
			else
			{
				$rawPostData = is_string($postData) ? $postData : serialize($postData);
				$client->setRawData($rawPostData);

				if (isset($contentType))
					$client->setEncType($contentType);
			}
		}

		$client->request($method);
	}

	/**
	 * Convert querystring from parse_url result to array
	 *
	 * @param string $query
	 * @return array
	 */
	protected static function _parseQuery($query)
	{
		$result  = array();
		if (empty($query))
			return $result;

		$parts  = explode('&', $query);

		foreach($parts as $part)
		{
			$subParts = explode('=', $part);
			$result[$subParts[0]] = $subParts[1];
		}

		return $result;
	}

	/**
	 * Parse the url for use with ERunActionsHttpClient
	 *
	 * @param string $url
	 * @param string $host output
	 * @param integer $port output
	 * @param string $uri output
	 * @param array $urlParams output
	 */
	protected static function _parseUrl($url,&$host,&$port,&$uri,&$urlParams)
	{
		$parts=parse_url($url);
		$host = $parts['host'];
		$port = isset($parts['port']) ? $parts['port'] : 80;
		$uri = isset($parts['path']) ? $parts['path'] : '/';

		if (isset($parts['scheme']) && $parts['scheme'] == 'https')
			$port = 443;

		if (isset($parts['query']))
			$urlParams = array_merge($urlParams,self::_parseQuery($parts['query']));
	}

	/**
	 * Uses the simple built in http client for a GET request
	 * Supports https, but not handling redirect, certificates ...
	 *
	 * @param string $url
	 * @param array $urlParams additional url query params
	 * @return string
	 */
	public static function httpGET($url,$urlParams=array())
	{
		Yii::import('ext.runactions.components.ERunActionsHttpClient');
		$client = new ERunActionsHttpClient();
        self::_parseUrl($url,$host,$port,$uri,$urlParams);
		return $client->request($host,$port,$uri,'GET',$urlParams);
	}

	/**
	 * Uses the simple built in http client for a POST request
	 * Supports https, but not handling redirect, certificates ...
	 *
	 * @param string $url
	 * @param mixed $postData array (form vars) or string (raw content)
	 * @param string $contentType of the postData
	 */
	public static function httpPOST($url,$postData=null,$contentType=null,$urlParams=array())
	{
		Yii::import('ext.runactions.components.ERunActionsHttpClient');
		$client = new ERunActionsHttpClient();
		self::_parseUrl($url,$host,$port,$uri,$urlParams);
		return $client->request($host,$port,$uri,'POST',$urlParams,$postData,$contentType);
	}

	/**
	 * Run a script
	 * Includes the php file $scriptName and extract the variables set in $params
	 *
	 * @param string $scriptName
	 * @param array $params
	 * @param string $scriptPath
	 * @return boolean
	 */
	public static function runScript($scriptName,$params=array(),$scriptPath=null)
	{
		if (!isset($scriptPath))
			$scriptPath = 'ext.runactions.config.scripts';

		$scriptFile = Yii::getPathOfAlias($scriptPath . '.' . $scriptName) . '.php';

		if (!is_file($scriptFile))
		{
			self::logError('Scriptfile not found: '. $scriptPath . '.' . $scriptName);
			return false;
		}

		if (!empty($params))
			extract($params);

		include($scriptFile);

		return true;
	}

	/**
	 * Run a controller action
	 *
	 *
	 * The route is the path to the controller including the action to run
	 * @link http://www.yiiframework.com/doc/api/1.1/CWebApplication#createController
	 *
	 * @param string $route
	 * @param array $params The GET params to add to the route
	 * @param boolean $ignoreFilters
	 * @param boolean $ignoreBeforeAfterAction
	 * @param boolean $logOutput
	 * @param mixed $silent
	 * @return boolean
	 */
	public static function runAction($route,$params=array(),$ignoreFilters=true,$ignoreBeforeAfterAction=true,$logOutput=false,$silent=false)
	{
		$controller = self::createControllerFromRoute($route,$actionId);

		if (empty($controller))
			return false;

		$config = array(
		                 'route'=>$route,
						 'ignoreFilters'=>$ignoreFilters,
		                 'ignoreBeforeAfterAction'=>$ignoreBeforeAfterAction,
		                 'logOutput'=>$logOutput,
		                 'silent'=>$silent,
	                   );

		self::execControllerAction($controller,$actionId,$params,$config);

		return true;
	}

	/**
	 * Allows executing controller actions as background tasks.
	 * A controller action request will always be 'touched' a second time to run in background
	 *
	 * Usage see:  controllers/RunActionsController.php
	 *
	 * Use $internalHostInfo when the webserver is running behind a firewall
	 * where only internal routing is configured.
	 * In that case the the detected $request->getHostInfo() can fail.
	 *
	 *
	 * @param boolean $useHttpClient whether to use the EHttpClient extension
	 * @param array $httpClientConfig the config for the EHttpClient extension
	 * @param string $internalHostInfo with scheme: http://127.0.0.1; http://192.168.0.1
	 * @return
	 */
	public static function runBackground($useHttpClient=false,$httpClientConfig=array(),$internalHostInfo=null)
	{
		if (!self::isTouchActionRequest())
		{
			$request = Yii::app()->request;

			$uri = $request->requestUri;
			$port = $request->getPort();
			$host = isset($internalHostInfo) ? $internalHostInfo : $request->getHostInfo();
			$url =  "$host:$port$uri";

			if ($useHttpClient)
				ERunActions::touchUrlExt($url,$_POST,null,$httpClientConfig);
			else
			    ERunActions::touchUrl($url,$_POST);

			return false;
		}
		else
			return true;
	}

	/**
	 * Create a controller from a route
	 * @link http://www.yiiframework.com/doc/api/1.1/CWebApplication#createController-detail
	 *
	 * @param string $controllerRoute
	 * @param string $actionId
	 * @return CController
	 */
	public static function createControllerFromRoute($controllerRoute,&$actionId=null)
	{
		$cResult = Yii::app()->createController($controllerRoute);

		if (empty($cResult))
		{
			self::logError('Invalid route: ' . $controllerRoute);
			return null;
		}

		$actionId = !empty($cResult[1]) ? $cResult[1] : null;

		if (empty($actionId))
		{
			self::logError('ActionId missing - Invalid route: ' . $controllerRoute);
			return null;
		}

		return $cResult[0];
	}


	/**
	 * Log a message
	 *
	 * @param string $message
	 * @param string $level
	 * @param string $controllerId
	 * @param string $actionId
	 */
	public static function logMessage($message,$level='info',$controllerId='',$actionId='')
	{
		$category = 'runactions';
		if (!empty($controllerId))
			$category .= '.'.$controllerId;

		if (!empty($actionId))
			$category .= '.'.$actionId;

		Yii::log($message,$level,$category);
	}

	/**
	 * Log an error message
	 *
	 * @param string $message
	 * @param string $category
	 */
	public static function logError($message,$controllerId='',$actionId='')
	{
		self::logMessage($message,'error',$controllerId,$actionId);
	}

	/**
	 * Log details: Used for logging each running action
	 *
	 * @param string $message
	 * @param string $category
	 */
	public static function logTrace($message,$controllerId='',$actionId='')
	{
		$category = 'runactions';
		if (!empty($controllerId))
			$category .= '.'.$controllerId;

		if (!empty($actionId))
			$category .= '.'.$actionId;

		Yii::trace($message,$category);
	}

	/**
	 * Log PHP errors
	 *
	 * @param mixed $event
	 */
	public static function logYiiError($event)
	{
		$message = "Error {$event->code}: '{$event->message}' in file '{$event->file}' on line {$event->line}";
		self::logError($message);
		Yii::app()->end();
	}

	/**
	 * Load the configuration array
	 *
	 * @return array
	 */
	protected function getConfiguration()
	{
		$configData = null;
		$configPathAlias = $this->configPathAlias;

		if ($this->allowSelectConfig && isset($_GET['config']))
		{
			$configData = Yii::getPathOfAlias($configPathAlias . '.' . $_GET['config']) .'.php';
		}

		if (empty($configData))
		{
			$configData = empty($this->config) ? $configPathAlias . '.' .$this->defaultConfig : $this->config;
			if (is_string($configData))
				$configData = Yii::getPathOfAlias($configData) .'.php';
		}

		if (empty($configData) || !is_file($configData))
		{
			$this->logError('No valid configuration found.');
			return false;
		}

		$config = new CConfiguration($configData);

		if (empty($config))
		{
			$this->logError('Invalid configuration.');
			return false;
		}

		return $config->toArray();
	}

	/**
	 * Load the preconfigured actions from a config file
	 *
	 * @return array
	 */
	protected function getActionsConfig()
	{
		$result = array();

		if (($config = $this->getConfiguration()) !== false)
			foreach ($config as $type => $configParams)
			{

				$configParams['type'] = $type;

				switch($type){
					case self::TYPE_ACTION:
						if (!isset($configParams['route']))
						{
							$msg = sprintf('Type "%s": Param "route" missing.',$type);
							self::logError($msg);
							return null;
						};

						if(!isset($configParams['ignoreFilters']))
							$configParams['ignoreFilters'] = $this->ignoreFilters;

						if(!isset($configParams['ignoreBeforeAfterAction']))
							$configParams['ignoreBeforeAfterAction'] = $this->ignoreBeforeAfterAction;

						if(!isset($configParams['logOutput']))
							$configParams['logOutput'] = $this->logOutput;

						break;

					case self::TYPE_SCRIPT:
						if (!isset($configParams['script']))
						{
							$msg = sprintf('Type "%s": Param "script" missing.',$type);
							self::logError($msg);
							return null;
						};

						if(!isset($configParams['scriptPath']))
							$configParams['scriptPath'] = $this->configPathAlias.'.'.'scripts';

						break;

					case self::TYPE_TOUCH:
					case self::TYPE_TOUCHEXT:
						if (!isset($configParams['url']))
						{
							$msg = sprintf('Type "%s": Param "url" missing.',$type);
							self::logError($msg);
							return null;
						};

						if(!isset($configParams['postData']))
							$configParams['postData'] = null;

						if(!isset($configParams['contentType']))
							$configParams['contentType'] = null;

						if(!isset($configParams['httpClientConfig']))
							$configParams['httpClientConfig'] = array();

						break;

					default:
						$msg = sprintf('Type "%s" not supported.',$type);
						self::logError($msg);
						return null;
				}

				if(!isset($configParams['params']))
					$configParams['params'] = array();

				 //Override widget properties if defined in config file
				if(!isset($configParams['allowedIps']))
					$configParams['allowedIps'] = $this->allowedIps;

				if(!isset($configParams['interval']))
					$configParams['interval'] = $this->interval;

				if(!isset($configParams['silent']))
					$configParams['silent'] = $this->silent;


				$result[] = $configParams;
			}

		return $result;

	}

	/**
	 * Run the preconfigured actions from a config file
	 */
	public function runActions()
	{
		//catch all errors: Yii::app()->onError seems not to be enough
		ini_set('display_errors','Off');
		Yii::app()->onError = array($this,'logYiiError');
		register_shutdown_function('logCriticalError');

		$this->_successCount = 0;
		$this->_failedCount = 0;

		$startTime = time();

		$actionsConfig = $this->getActionsConfig();

		if (empty($actionsConfig))
		{
			$msg = 'Empty or invalid configuration.';
			$this->logError($msg);

			if (!$this->silent)
				echo $msg;

			Yii::app()->end();
		}

		foreach ($actionsConfig as $config)
		{
			$configId = md5(serialize($config));

			$lastExec = null;
			if (!$this->checkInterval($config['interval'],$configId,$lastExec))
			{
				$this->_failedCount++;
				$msg = sprintf('Invalid time interval - Last call: %s Allowed interval: %s',
					            $lastExec,$config['interval']);
				self::logError($msg);
				continue;
			}

			if (!$this->checkIPAddress($config['allowedIps'],$ip))
			{
				$this->_failedCount++;
				$this->registerInterval($config['interval'],$configId);

				self::logError('Invalid ip address: ' . $ip);
				continue;
			}

			//run a script
			if ($config['type'] == self::TYPE_SCRIPT)
			{
			   self::runScript($config['script'],$config['params'],$config['scriptPath']);
			}
			//touch a url with internal httpclient
			elseif ($config['type'] == self::TYPE_TOUCH)
			{
                self::touchUrl($config['url'],$config['postData'],$config['contentType']);
			}
			//touch a url with extension EHttpClient
			elseif ($config['type'] == self::TYPE_TOUCHEXT)
			{
				self::touchUrlExt($config['url'],$config['postData'],$config['contentType'],$config['httpClientConfig']);
			}
			//run controller action
			else
			{
				$controller = $this->createControllerFromRoute($config['route'],$actionId);

				if (empty($controller))
				{
					$this->_failedCount++;
					continue;
				}

				if (empty($actionId))
				{
					$this->_failedCount++;
					continue;
				}

				$params = isset($config['actionParams']) ?  $config['actionParams'] : array();

				if ($this->execControllerAction($controller,$actionId,$params,$config,true))
					$this->_successCount++;
				else
					$this->_failedCount++;
			}

			$this->registerInterval($config['interval'],$configId);
		}

		$duration = time() - $startTime;
		$totalCount = $this->_successCount + $this->_failedCount;

		$msg = sprintf('%d action(s) executed - Duration: %d  Success: %d  Failed: %d',$totalCount,$duration,$this->_successCount,$this->_failedCount);
		$this->logTrace($msg);
	}

	/**
	 * Execute the configured controller actions
	 */
	public function run()
	{
		$this->runActions();
	}

	/**
	 * Execute a controller action
	 *
	 * @param mixed $controller
	 * @param mixed $actionId
	 * @param mixed $params
	 * @return
	 */
	protected static function execControllerAction($controller,$actionId,$params,$config,$isBatchMode=false)
	{
		$result = true;
		try
		{
			$action = $controller->createAction($actionId);
			if (empty($action))
			{
				self::logError('Invalid controller action',$controller->id,$actionId);
				return false;
			}

			//simulate executing by Yii
			$controller->setAction($action);
			Yii::app()->setController($controller);
			$_GET = array_merge($_GET,$params); //simulate $_GET params for controller actions

			//set getparam '_runaction' for checking in controller actions
			$_GET['_runaction'] = 1;

			if ($isBatchMode)
				$_GET['_runaction_batchmode'] = 1;

			self::logTrace('Start executing',$controller->id,$actionId);

			ob_start();

			if ($config['ignoreBeforeAfterAction'])
			{
				if ($config['ignoreFilters'] && $action->runWithParams($params)===false)
				{
					self::logError('Invalid action params',$controller->id,$actionId);
					$result = false;
				}
				else
				if (!$config['ignoreFilters'])
					$controller->runActionWithFilters($action,$controller->filters());
			}
			else //run with beforeAction, afterAction
			{
				if ($config['ignoreFilters'])
					$controller->runAction($action);
				else
					$controller->forward($config['route'],false);
			}

			$output = ob_get_clean();

			if ($config['logOutput'] && !empty($output))
				self::logTrace('Action output: ' . $output,$controller->id,$actionId);

			if (!$config['silent'])
				echo $output;

			return $result;
		}
		catch (Exception $e)
		{
			$msg = 'Error on execute: '.$e->getMessage();
			self::logError($msg,$controller->id,$actionId);
			return false;
		}

	}

	/**
	 * Check if executing cron within time interval
	 *
	 * @return boolean
	 */
	public static function checkInterval($interval,$id)
	{
		if (empty($interval))
			return true;

		$lastExec = Yii::app()->getGlobalState('runaction_timestamp_'.$id,0);
		return ($lastExec + $interval) < time();
	}
	/**
	 * Save the time of execution into global state
	 */
	public static function registerInterval($interval,$id)
	{
		if (!empty($interval))
		{
			$endTime = time();
			Yii::app()->setGlobalState('runaction_timestamp_'.$id,$endTime);
		}
	}

	/**
	 * Check the allowed ip addresses
	 *
	 * @return
	 */
	protected function checkIPAddress($allowedIps,&$ip)
	{
		if (empty($allowedIps))
			return true;

		$ip = Yii::app()->request->getUserHostAddress();

		foreach($allowedIps as $rule)
		{
			if($rule==='*' || $rule===$ip || (($pos=strpos($rule,'*'))!==false && !strncmp($ip,$rule,$pos)))
				return true;
		}

		return false;
	}



}


/**
 * Log all PHP errors
 */
function logCriticalError()
{
	if(is_null($e = error_get_last()) === false)
	{
		$message = sprintf('Error %s: %s in file "%s" on line %d',$e['type'],$e['message'],$e['file'],$e['line']);
		Yii::log($message,'error','runactions');
		Yii::app()->end();
	}
}
