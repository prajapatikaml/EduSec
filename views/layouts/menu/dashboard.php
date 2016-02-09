<?php use yii\helpers\Html; ?>
<li class="treeview active">
	<?= Html::a('<i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>', ['/#'])  ?>
        <ul class="treeview-menu">
	<?php if(Yii::$app->user->can('/dashboard/msg-of-day/index')) { ?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Massage of Day',['/dashboard/msg-of-day'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/dashboard/notice/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Notice',['/dashboard/notice'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/dashboard/events/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Events',['/dashboard/events'])  ?>
	    </li>
	<?php }
	?>
        </ul>
</li>
