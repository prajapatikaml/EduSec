<?php
use yii\helpers\Html;
?>
<li class="treeview active">
	<?= Html::a('<i class="fa fa-user"></i> <span>Employee</span> <i class="fa fa-angle-left pull-right"></i>', ['/student/default/index'])  ?>
        <ul class="treeview-menu">

	<?php if(Yii::$app->user->can('/employee/emp-master/create')) : ?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Add Employee',['/employee/emp-master/create'])  ?>
	    </li>
	<?php endif; ?>

	<?php if(Yii::$app->user->can('/employee/emp-master/index')) : ?>
	    <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Manage Employee',['/employee/emp-master/index'])  ?>
	    </li>
	<?php endif; ?>
 
	<?php if(Yii::$app->user->can('/employee/emp-department/index')) : ?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Department',['/employee/emp-department/index'])  ?>
	    </li>
	<?php endif; ?>

	<?php if(Yii::$app->user->can('/employee/emp-designation/index')) : ?>
	    <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Designation',['/employee/emp-designation/index'])  ?>
	    </li>
	<?php endif; ?> 

	<?php if(Yii::$app->user->can('/employee/emp-category/index')) : ?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Category',['/employee/emp-category/index'])  ?>
	    </li>
	<?php endif; ?>
	
	<?php if(Yii::$app->user->can('/user/resetemploginid')) : ?>
	    <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Reset Login',['/user/resetemploginid'])  ?>
	    </li>
	<?php endif; ?>

	<?php if(Yii::$app->user->can('/user/resetemppassword')) : ?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Reset Password',['/user/resetemppassword'])  ?>
	    </li>
	<?php endif; ?> 
        </ul>
</li>
