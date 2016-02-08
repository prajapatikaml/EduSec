<?php
$this->breadcrumbs=array(
	'Employee Notifications',
);
?>

<h1>Employee Notifications</h1>

<div id="notifications" class="box-content" >
	  <?php echo EmployeeNotification::loadAllNotice($notices);?>
</div>

<?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
    'contentSelector' => '#notifications',
    'itemSelector' => 'div.notifiche',
    'loadingText' => 'Loading...',
    'donetext' => 'All notices are loaded.',
    'pages' => $pages,
)); ?>


<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'summaryText'=>'',
	'cssFile'=>Yii::app()->request->baseUrl.'/css/newdashboard.css',
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>count($dataProvider),
		'header'=>''
	    ),
)); */?>
