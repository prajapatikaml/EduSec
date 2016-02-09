<?php use yii\helpers\Html; ?>

<li class="treeview active">
	<?= Html::a('<i class="fa fa-bar-chart"></i> <span>Reports Center</span> <i class="fa fa-angle-left pull-right"></i>', ['/student/default/index'])  ?>
        <ul class="treeview-menu">
	<?php if(Yii::$app->user->can('/report/employee/empinforeport')) { ?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Employee Info Report', ['/report/employee/empinforeport'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/report/student/stuinforeport')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Student Info Report', ['/report/student/stuinforeport'])  ?>
	    </li>
	<?php }
		   if(Yii::$app->user->can('/login-details/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Login History',['/login-details/index'])  ?>
	    </li>
	<?php }
	?>
	
        </ul>
</li>
