<?php
use yii\helpers\Html;
?>

<ul class="dropdown-menu" style="<?= (Yii::$app->language == 'ar') ? 'left: 0 !important; right: auto !important;' : '';?>">
    <li>
        <ul class="menu">
			<?php if(Yii::$app->user->can('Configuration')) : ?>
            <li>
				<?= Html::a('<i class="fa fa-cogs text-aqua fa-2x"></i><h4> '.Yii::t('app', 'Configuration').'</h4>', ['/default/index']);?>
            </li>
			<?php endif; ?>
			<?php if(Yii::$app->user->can('/dashboard/default/index')) : ?>
            <li>
				<?= Html::a('<i class="fa fa-dashboard text-green fa-2x"></i> <h4>'.Yii::t('dash', 'Dashboard').'</h4>', ['/dashboard/default/index']);?>
            </li>
			<?php endif; ?>
			<?php if(Yii::$app->user->can('/course/default/index')) : ?>
            <li>
				<?= Html::a('<i class="fa fa-graduation-cap text-yellow fa-2x"></i> <h4>'.Yii::t('course', 'Course').'</h4>', ['/course/default/index']);?>
            </li>
			<?php endif; ?>
			<?php if(Yii::$app->user->can('/student/default/index')) : ?>
            <li>
				<?= Html::a('<i class="fa fa-users text-orange fa-2x"></i> <h4>'.Yii::t('stu', 'Student').'</h4>', ['/student/default/index']);?>
            </li>
			<?php endif; ?>
			<?php if(Yii::$app->user->can('/employee/default/index')) : ?>
            <li>
				<?= Html::a('<i class="fa fa-user text-purple fa-2x"></i> <h4>'.Yii::t('emp', 'Employee').'</h4>', ['/employee/default/index']);?>
            </li>
			<?php endif; ?>
			<?php if(Yii::$app->user->can('/fees/default/index')) : ?>
            <li>
				<?= Html::a('<i class="fa fa-money text-green fa-2x" ></i> <h4>'.Yii::t('fees', 'Fees').'</h4>', ['/fees/default/index']);?>
            </li>
			<?php endif; ?>
			<?php if(Yii::$app->user->can('/report/default/index')) : ?>
            <li>
				<?= Html::a('<i class="fa fa-line-chart text-blue fa-2x"></i> <h4>'.Yii::t('report', 'Report Center').'</h4>', ['/report/default/index']);?>
            </li>
			<?php endif; ?>
			<?php if(Yii::$app->user->can('Rights')) : ?>
            <li>
				<?= Html::a('<i class="fa fa-user-secret text-orange fa-2x"></i> <h4>'.Yii::t('urights', 'User Rights').'</h4>', ['/rights/assignment/index']);?>
            </li>
			<?php endif; ?>
        </ul>
    </li>
</ul>
