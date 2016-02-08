This extension is a helper for running actions.
It makes controller actions reusable withing different context.

Features

- Run controller actions as a background task
- Build cron job
- 'Touch' urls at remote/local servers.
- Run preconfigured batchjobs or php scripts


Requirements

- Developed with Yii 1.1.7

- When using 'touchUrlExt' (see below) you have to install the extension EHttpClient



Usage

- Extract the files under .../protected/extensions

- When using 'touchUrlExt' you have to install the extension EHttpClient


This is only a quick overview of the usage.
I don't list all configurable properties here.

Please take a look at the comments in the code of ERunActions.php



1) 'Touch' a url


Use this static methods to start processes at a remote or the own webserver.
A request to the url will be sent, but not waiting for a response.

ERunActions::touchUrl($url,$postData=null,$contentType=null);

uses a simple built in httpclient (fsockopen).

ERunActions::touchUrlExt($url,$postData=null,$contentType=null);

uses the extension EHttpClient, if you need support for https, proxies, certificates ...



2) Run a controller action

You can configure to ignore filters, before and afterAction of the controller,
only log the output of the controller if $silent and $logOutput is set to true.

If both $ignoreFilters and $ignoreBeforeAfterAction are set to false,
this will be the same as when using the method CController.forward.


ERunActions::runAction($route,$params=array(),$ignoreFilters=true,$ignoreBeforeAfterAction=true,$logOutput=false,$silent=false)



3) Run a php script

This is a simple method that includes a script and extract the params as variable.
The include file has to be located in runaction/config by default.

ERunActions::runScript($scriptName,$params=array(),$scriptPath=null)


4) Run a controller action as a background task

Use this if you have implemented time-consuming controller actions and the user has not to wait until finished.
For example:

  - importing data
  - sending newsletter mails or mails with large attachments
  - cleanup (db-) processes


    public function actionTimeConsumingProcess()
	{
		if (ERunActions::runBackground())
		{
		   //do all the stuff that should work in background
		   //mail->send() ....
		}
		else
		{
			//this code will be executed immediately
			//echo 'Time-consuming process has been started'
			//user->setFlash ...render ... redirect,
		}
	}


5) Run preconfigured actions as batchjob

Run the config script 'cron.php' from runactions/config

$this->widget('ext.runactions.ERunActions');

The cron.php should return a batch config array(actiontype => configarray)
The are 4 actiontypes (see methods from above) available

 - ERunActions::TYPE_ACTION
 - ERunActions::TYPE_SCRIPT
 - ERunActions::TYPE_TOUCH, ERunActions::TYPE_TOUCHEXT

For example:


return array(
   //execute ImportController actionRun ignoring filters and before- afterAction of the controller
    ERunActions::TYPE_ACTION  => array('route' => '/import/run'),
    ...

   //run the php file runaction/config/afterimport.php to do something with the imported data
    ERunActions::TYPE_SCRIPT  => array('script' => 'afterimport'),
    ...

   //inform another server that the process is finished
   ERunActions::TYPE_TOUCH => array('url'=>'http://example.com/processfinished');
);


You can override the configure the properties of the widget in the config of the action


$this->widget('ext.runactions.ERunActions',
              'ignoreBeforeAfterAction' => true,
              'interval' => 3600,
              'allowedIps' => array('127.0.0.1'),
);

Config script to execute

return array(
    ...

    ERunActions::TYPE_ACTION  => array('route' => '/cache/flush'
                                       'ignoreBeforeAfterAction' => false,
									   ),
    ...
);


6) Use the widget to expose a 'cron' controller action


Add the RunActionsController as 'cron' to the controllerMap in applications config/main.php

'controllerMap' => array(
   'cron' => 'ext.runactions.controllers.RunActionsController',
   ...
 ),


Now you can run the config script runactions/config/cron.php by calling

http://localhost/index.php/cron

or another script by

http://localhost/index.php/cron/run/config/myscript

or running in background so that a HTTP 200 OK will immediatly be returned

http://localhost/index.php/cron/touch/config/myscript


Configure the urls in your crontab by using 'wget'.


7) Notes

In a controller action executed by 'runAction', 'touchUrl' or a batch script
you can use the static methods

- ERunActions::isRunActionRequest()
- ERunActions::isBatchMode()
- ERunActions::isTouchActionRequest()

to switch behavior if the action is called in contexts above.


The widget catches all errors (even php errors) and uses Yii::log if an error occurs.
So running cron jobs will not display internal errors.






