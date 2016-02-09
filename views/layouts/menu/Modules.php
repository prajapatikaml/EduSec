<?php use yii\helpers\Html; ?>

	<?php if(Yii::$app->user->can('Configuration')) { ?>
	    <li><?= Html::a('<i class="fa fa-cogs"></i> <span>'.Yii::t('app', 'Configuration').'</span>', ['/default/index']); ?></li>
	<?php } 
	      if(Yii::$app->user->can('/dashboard/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-dashboard"></i> <span>'.Yii::t('dash', 'Dashboard').'</span>', ['/dashboard/default/index']); ?></li>
	<?php }
	      if(Yii::$app->user->can('/course/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-graduation-cap"></i> <span>'.Yii::t('course', 'Course Management').'</span>', ['/course/default/index']);?></li>
	<?php }
	      if(Yii::$app->user->can('/student/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-users"></i> <span>'.Yii::t('stu', 'Student').'</span>', ['/student/default/index']);  ?></li>
	<?php }
	      if(Yii::$app->user->can('/employee/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-user"></i> <span>'.Yii::t('emp', 'Employee').'</span>', ['/employee/default/index']);  ?></li>
	<?php }
	      if(Yii::$app->user->can('/fees/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-money"></i> <span>'.Yii::t('fees', 'Fees').'</span>', ['/fees/default/index']); ?></li>
	<?php }
	      if(Yii::$app->user->can('/report/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-bar-chart"></i> <span>'.Yii::t('report', 'Report Center').'</span>', ['/report/default/index']); ?></li>
	<?php }
	      if(Yii::$app->user->can('Rights')) {
	?>
	    <li><?= Html::a('<i class="fa fa-user-secret"></i> <span>'.Yii::t('urights', 'User Rights').'</span>', ['/rights/']); ?></li>
	<?php } ?>
