<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title"> Manage Backup Files</span>
<div class="operation">
<?php echo CHtml::link('Add New', array('create'), array('class'=>'btn green'))?>
<?php echo CHtml::link('Schedule Backup', array('databaseBackupCron/admin'), array('class'=>'btn green'))?>
</div>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'install-grid',
	'dataProvider' => $dataProvider,
	'columns' => array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),

		'name',
		'size',
		'create_time',
		array(
			'class' => 'CButtonColumn',
			'template' => ' {download}',
			  'buttons'=>array
			    (
			        'download' => array
			        (
			            'url'=>'Yii::app()->createUrl("backup/default/download", array("file"=>$data["name"]))',
				     'imageUrl'=> Yii::app()->baseUrl.'/images/dbbackup1.png',
			        ),
			    ),		
		),
			array(
			'class' => 'CButtonColumn',
			'template' => '{restore}',
			  'buttons'=>array
			    (
			       'restore' => array
			        (
			            'url'=>'Yii::app()->createUrl("backup/default/restore", array("file"=>$data["name"]))',
				
				),
			        'delete' => array
			        (
			            'url'=>'Yii::app()->createUrl("backup/default/delete", array("file"=>$data["name"]))',
			        ),
			    ),		
		),

	),
	
)); ?></div>
