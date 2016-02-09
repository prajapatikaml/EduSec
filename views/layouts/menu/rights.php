<?php use yii\helpers\Html; ?>
<li class="treeview active">
	<?= Html::a('<i class="fa fa-user-secret"></i> <span>User Rights</span> <i class="fa fa-angle-left pull-right"></i>', ['/#'])  ?>
        <ul class="treeview-menu">
	<?php  
	      if(Yii::$app->user->can('/rights/assignment/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Assignment',['/rights/assignment'])  ?>
	    </li>
	<?php 
	      }
	      if(Yii::$app->user->can('/rights/permission/index')) { ?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Permission',['/rights/permission'])  ?>
	    </li>
	<?php }
	      if(Yii::$app->user->can('/rights/role/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Role',['/rights/role'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/rights/route/index')) {
	?>
            <li>
		<?php // Html::a('<i class="fa fa-angle-double-right"></i> Route',['/rights/route'])  ?>
	    </li>
	<?php }
	?>
        </ul>
</li>
