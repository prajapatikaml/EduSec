<?php

foreach(Yii::app()->user->getFlashes() as $key => $message) {
	/*
	if(!isset($registerScript_animate_flash))
	{
		
		Yii::app()->clientScript->registerScript(
			'animateFlashMsg',
			'$(".flash-message").animate({opacity: 1.0}, 3000).fadeOut("slow");',
			CClientScript::POS_READY
		);
		$registerScript_animate_flash = 1;
	} */
	echo '<div class="flash-message flash-' . $key . '">' . $message . "</div>\n";
}
?>
