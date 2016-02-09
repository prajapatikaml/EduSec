<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var mdm\admin\models\AuthItem $model
 */
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-search"></i> <?= $this->title ?> </h3></div>
  <div class="col-xs-4"></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding">
	<?= Html::a('Back', ['index'], ['class' => 'btn btn-block btn-back']) ?>
	</div>
	<div class="col-xs-4 left-padding">
        <?= Html::a(Yii::t('rbac-admin', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-block btn-primary']) ?>
	</div>
	<div class="col-xs-4 left-padding">
        <?= Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->name], [
            'class' => 'btn btn-block btn-danger',
            'data-confirm' => Yii::t('rbac-admin', 'Are you sure to delete this item?'),
            'data-method' => 'post',]);
        ?> 
	</div>
   </div>
</div>

<div class="col-xs-12">
 <div class="box box-primary view-item">
   <div class="auth-item-view row" style="padding-bottom:10px">
    <?php
    echo DetailView::widget([
        'model' => $model,
	'options'=>['class'=>'table  detail-view'],
        'attributes' => [
            'name',
            'description:ntext',
           // 'ruleName',
           // 'data:ntext',
        ],
    ]);
    ?>

   <div class="col-xs-12 col-lg-12">
    <div class="col-lg-5 col-sm-12 col-xs-12">
        <?= Yii::t('rbac-admin', '<b>Available</b>') ?>:
		<div class="form-group has-feedback">
			<input name="search_av" type="text" class="form-control role-search" placeholder="Search..." data-target="avaliable"/>
			<span class="glyphicon glyphicon-search form-control-feedback"></span>
		</div>
        <?php
        echo Html::listBox('roles', '', $avaliable, [
            'id' => 'avaliable',
            'multiple' => true,
            'size' => 20,
            'style' => 'width:100%;padding:5px']);
        ?>
    </div>
    <div class="col-lg-2 col-sm-12 col-xs-12 text-center">
        <br><br>
        <?php
        echo Html::a('>>', '#', ['class' => 'btn btn-success', 'data-action' => 'assign', 'title' => 'Assign']) . '<br><br>';
        echo Html::a('<<', '#', ['class' => 'btn btn-danger', 'data-action' => 'delete', 'title' => 'Delete']) . '<br>';
        ?>
	<br><br>
    </div>
    <div class="col-lg-5 col-sm-12 col-xs-12">
        <?= Yii::t('rbac-admin', '<b>Assigned</b>') ?>:
		<div class="form-group has-feedback">
			<input name="search_asgn" type="text" class="form-control role-search" placeholder="Search..." data-target="assigned"/>
			<span class="glyphicon glyphicon-search form-control-feedback"></span>
		</div>
        <?php
        echo Html::listBox('roles', '', $assigned, [
            'id' => 'assigned',
            'multiple' => true,
            'size' => 20,
            'style' => 'width:100%;padding:5px']);
        ?>
    </div>
   </div>
  </div>
 </div>
</div>
<?php
$this->render('_script',['name'=>$model->name]);
