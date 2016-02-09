<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 */
$this->title = Yii::t('rbac-admin', 'Routes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-search"></i> <?= Html::encode($this->title) ?></h3></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding edusecArLangCss"></div>
	<div class="col-xs-4 left-padding edusecArLangCss"></div>
	<div class="col-xs-4 left-padding">
        <?= Html::a(Yii::t('rbac-admin', 'ADD'), ['create'], ['class' => 'btn btn-block btn-success']) ?>
	</div>
  </div>
</div>

<div class="col-xs-12">
 <div class="box box-primary view-item">
   <div class="routes-form-list row" style="padding-bottom:10px">

   <div class="col-xs-12 col-lg-12">
    <div class="col-lg-5 col-sm-12 col-xs-12">
        <?= "<b>".Yii::t('rbac-admin', 'Available')."</b>" ?>:
        <?php
        echo "<div class='input-group form-group col-lg-10 col-xs-8 pull-right no-padding'>".Html::textInput('search_av', '', ['class' => 'role-search form-control', 'data-target' => 'new']);
        echo Html::a('<span class="glyphicon glyphicon-refresh"></span>', '', ['id'=>'btn-refresh', 'title' => Yii::t('rbac-admin', 'Refresh'), 'class' => 'input-group-addon']). "</div>";
        echo '<br>';
        echo Html::listBox('routes', '', $new, [
            'id' => 'new',
            'multiple' => true,
            'size' => 15,
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
        <?= "<b>".Yii::t('rbac-admin', 'Assigned')."</b>" ?>:
        <?php
        echo "<div class='form-group col-lg-10 col-xs-8 pull-right no-padding'>".Html::textInput('search_asgn', '', ['class' => 'role-search form-control', 'data-target' => 'exists']) . '</div>';
        echo Html::listBox('routes', '', $exists, [
            'id' => 'exists',
            'multiple' => true,
            'size' => 15,
            'style' => 'width:100%;padding:5px',
            'options' => $existsOptions]);
        ?>
    </div>
   </div>

  </div>
 </div>
</div>
<?php
$this->render('_script');
