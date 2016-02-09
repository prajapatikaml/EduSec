<?php use yii\helpers\Html; ?>

<li class="treeview active">
	<?= Html::a('<i class="fa fa-inr"></i> <span>Fees</span> <i class="fa fa-angle-left pull-right"></i>', ['/student/default/index'])  ?>
        <ul class="treeview-menu">
	<?php if(Yii::$app->user->can('/fees/bank-master/index')) { ?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Bank Master',['/fees/bank-master/index'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/fees/fees-collect-category/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Fees Category',['/fees/fees-collect-category/index'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/fees/fees-payment-transaction/collect')) {
	?>
	    <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Fees Collect',['/fees/fees-payment-transaction/collect'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/fees/fees-payment-transaction/stu-fees-data') && Yii::$app->session->get('stu_id')) {
	?>
	    <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Fees Collection',['/fees/fees-payment-transaction/stu-fees-data'])  ?>
	    </li>
	<?php } ?>
        </ul>
</li>
