<?php use yii\helpers\Html; ?>
<li class="treeview active">
	<?= Html::a('<i class="fa fa-cogs"></i> <span>Configuration</span> <i class="fa fa-angle-left pull-right"></i>', ['/default/index'])  ?>
        <ul class="treeview-menu">
	<?php if(Yii::$app->user->can('/country/index')) { ?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Country',['/country/index'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/state/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> State / Province',['/state/index'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/city/index')) {
	?>
	    <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> City / Town',['/city/index'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/document-category/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Document Category',['/document-category/index'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/languages/index')) {
	?>
	    <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Languages',['/languages/index'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/national-holidays/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> National Holiday',['/national-holidays/index'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/nationality/index')) {
	?>
	    <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Nationality',['/nationality/index'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/organization/index')) {
	?>
	    <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Institute',['/organization/index'])  ?>
	    </li>
	<?php } ?>
	   
        </ul>
</li>
