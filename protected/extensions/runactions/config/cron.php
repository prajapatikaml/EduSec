<?php

/*

Example configuration for cron
Has to return an array(actionType => array(...config...))

Details see readme.txt

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

*/

return array();