<?php use yii\helpers\Html; ?>

	<?php if(Yii::$app->user->can('Configuration')) { ?>
	    <li><?= Html::a('<i class="fa fa-cogs"></i> <span>Configuration</span>', ['/default/index']); ?></li>
	<?php } 
	      if(Yii::$app->user->can('/dashboard/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-dashboard"></i> <span>Dashboard</span>', ['/dashboard/default/index']); ?></li>
	<?php }
	      if(Yii::$app->user->can('/course/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-graduation-cap"></i> <span>Course Management</span>', ['/course/default/index']);?></li>
	<?php }
	      if(Yii::$app->user->can('/student/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-users"></i> <span>Student</span>', ['/student/default/index']);  ?></li>
	<?php }
	      if(Yii::$app->user->can('/employee/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-user"></i> <span>Employee</span>', ['/employee/default/index']);  ?></li>
	<?php }
	      if(Yii::$app->user->can('/fees/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-inr"></i> <span>Fees</span>', ['/fees/default/index']); ?></li>
	<?php }
	      if(Yii::$app->user->can('/report/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-bar-chart"></i> <span>Reports Center</span>', ['/report/default/index']); ?></li>
	<?php }
	      if(Yii::$app->user->can('Rights')) {
	?>
	    <li><?= Html::a('<i class="fa fa-user-secret"></i> <span>User Rights</span>', ['/rights/']); ?></li>
	<?php } ?>
