<?php use yii\helpers\Html; ?>
<li class="treeview active">
	<?= Html::a('<i class="fa fa-graduation-cap"></i> <span>Course Management</span> <i class="fa fa-angle-left pull-right"></i>', ['/student/default/index'])  ?>
        <ul class="treeview-menu">
	<?php if(Yii::$app->user->can('/course/courses/index')) { ?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Course',['/course/courses/index'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/course/batches/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Batch',['/course/batches/index'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/course/section/index')) {
	?>
	    <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Section',['/course/section/index'])  ?>
	    </li>
	<?php }
	?>
        </ul>
</li>
