<?php
$this->breadcrumbs=array(
	'Manage'=>array('index'),
);?>
<div id="statusMsg">

<?php
	    Yii::app()->clientScript->registerScript(
	   'myHideEffect',
	   '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
	 CClientScript::POS_READY
	);

	if(Yii::app()->user->hasFlash('success')) { ?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('success'); ?>
	</div>
	<?php } ?>

</div>
<?php $this->renderPartial('_list', array(
		'dataProvider'=>$dataProvider,
));
?>
