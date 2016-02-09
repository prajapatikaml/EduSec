<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model yii\web\IdentityInterface */

$this->title = Yii::t('rbac-admin', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-8 no-padding"><h3 class="box-title"><i class="fa fa-search"></i> <?= Html::encode($this->title) ?></h3></div>
  <div class="col-lg-1 col-sm-2 col-xs-4 pull-right no-padding" style="padding-top: 20px !important;">
	<?= Html::a('Back', ['index'], ['class' => 'btn btn-block btn-back']) ?>
   </div>
</div>

<div class="col-xs-12 col-lg-12">
 <div class="box box-primary view-item no-padding">
  <div class="box-header with-border">
    <i class="fa fa-user"></i>
    <h3 class="box-title text-aqua"><?= Yii::t('rbac-admin', '<b>User</b>') ?> : <?= Html::encode($model->{$usernameField}) ?></h3>
  </div><!-- /.box-header -->
  <div class="box-body">
  <div class="assignment-index row">
   <div class="col-xs-12 col-lg-12">
    <div class="col-lg-5 col-sm-5 col-xs-12">
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
    <div class="col-lg-2 col-sm-2 col-xs-12 text-center">
        <br><br>
        <?php
        echo Html::a('>>', '#', ['class' => 'btn btn-success', 'title' => 'Assign', 'data-action' => 'assign']) . '<br><br>';
        echo Html::a('<<', '#', ['class' => 'btn btn-danger', 'title' => 'Delete', 'data-action' => 'delete']) . '<br>';
        ?>
	<br><br>
    </div>
    <div class="col-lg-5 col-sm-5 col-xs-12">
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
</div>
<?php
$this->render('_script',['id'=>$model->{$idField}]);
?>
