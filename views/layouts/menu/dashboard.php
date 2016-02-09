<?php use yii\helpers\Html; ?>
<li class="treeview active">
	<?= Html::a('<i class="fa fa-dashboard"></i> <span>'.Yii::t('dash', 'Dashboard').'</span> <i class="fa fa-angle-left pull-right"></i>', ['/#'])  ?>
        <ul class="treeview-menu">
	<?php if(Yii::$app->user->can('/dashboard/msg-of-day/index')) { ?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> '.Yii::t('dash', 'Massage Of The Day'),['/dashboard/msg-of-day'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/dashboard/notice/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> '.Yii::t('dash', 'Notice'),['/dashboard/notice'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/dashboard/events/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> '.Yii::t('dash', 'Events'),['/dashboard/events'])  ?>
	    </li>
	<?php }
	?>
        </ul>
</li>
