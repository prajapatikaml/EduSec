<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
fedemotta\datatables\DataTablesBootstrapAsset::register($this);

/* @var $this yii\web\View */

$this->title = Yii::t('stu', 'Import Student');
$this->params['breadcrumbs'][] = ['label' => Yii::t('stu', 'Student'), 'url'=>['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([
	'id' => 'import-student',
	'enableAjaxValidation' => false,
	'options' => ['enctype' => 'multipart/form-data'],
]); ?>

<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-file-excel-o"></i> <?php echo Yii::t('stu', 'Select File'); ?></h3>
	</div><!--./box-header-->
	<div class="box-body">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<?= $form->field($model, 'importFile')->fileInput(['title' => Yii::t('stu', 'Browse Excel File')])->label(false) ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="callout callout-info">
					<h4><?php echo Yii::t('stu', 'You must have to follow the following instruction at the time of importing data'); ?></h4>
					<ol>
						<li><b><?php echo Yii::t('stu', 'The field with red color are the required field cannot be blank.'); ?></b></li>
						<li><?php echo Yii::t('stu', 'Student ID is auto generated.'); ?></li>
						<li><?php echo Yii::t('stu', 'Birth date must be less than current date.'); ?></li>
						<li><?php echo Yii::t('stu', 'Student import detail must match with application selected language.'); ?></li>
					</ol>
					<h5><?php echo Yii::t('stu', 'Download the sample format of Excel sheet.'); ?> <b><?= Html::a(Yii::t('stu', 'Download'), ['download-file', 'id' => 'SSF']) ?></b></h5>
				</div><!--./callout-->
			</div><!--./col-->
		</div><!--./row-->
	</div><!--./box-body-->
	<div class="box-footer">
		<?= Html::submitButton('<i class="fa fa-upload"></i>'.Yii::t('stu', ' Import'), ['class' => 'btn btn-primary']) ?>
	</div>
</div><!--./box-->
<?php ActiveForm::end(); ?>

<?php if(!empty($importResults)) : ?>
<!---Start Import Summary Results Block--->
<div class="box box-info">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-list-ul"></i> <?php echo Yii::t('stu', 'Students Import Results'); ?></h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-sm-12">
				<?php $totalError = (count($importResults['dispResults'])-$importResults['totalSuccess']); ?>
				<?php $headerTr = $content = ''; $i = 1; ?>
				
				<?php if(!empty($importResults['totalSuccess'])) : ?>
					<div class="alert alert-success">
						<h4><i class="fa fa-check"></i> <?php echo Yii::t('stu', 'Success!'); ?></h4>
						<?= "{$importResults['totalSuccess']}". Yii::t('stu', ' students importing successfully.') ?>
					</div>
				<?php endif; ?>
				
				<?php if(!empty($totalError)) : ?>
					<div class="alert alert-danger">
						<h4><i class="fa fa-ban"></i> <?php echo Yii::t('stu', 'Error!'); ?></h4>
						<?= "{$totalError}". Yii::t('stu', ' students importing error.') ?>
					</div>
				<?php endif; ?>
				<?php
					$headerTr.= Html::tag('th', Yii::t('stu', 'Sr No'));
					$headerTr.= Html::tag('th', Yii::t('stu', 'Title'));
					$headerTr.= Html::tag('th', Yii::t('stu', 'First Name'));
					$headerTr.= Html::tag('th', Yii::t('stu', 'Last Name'));
					$headerTr.= Html::tag('th', Yii::t('stu', 'Date of Birth'));
					$headerTr.= Html::tag('th', Yii::t('stu', 'Course'));
					$headerTr.= Html::tag('th', Yii::t('stu', 'Batch'));
					$headerTr.= Html::tag('th', Yii::t('stu', 'Section'));
					$headerTr.= Html::tag('th', Yii::t('stu', 'Admission Date'));

					$headerTr.= Html::tag('th', Yii::t('stu', 'Status'));
					$headerTr.= Html::tag('th', Yii::t('stu', 'Remarks/Message'));
				?>
				<table class="table table-striped table-bordered" id = "fixHeader">
					<thead>
						<?= Html::tag('tr', $headerTr, ['class' => 'active']) ?>
					</thead>
					<tbody>
					
					<?php foreach($importResults['dispResults'] as $line) : 						
						$content = '';
						$content.= Html::tag('td', $i++);
						$content.= Html::tag('td', $line['A']); //Title
						$content.= Html::tag('td', $line['B']); //First Name
						$content.= Html::tag('td', $line['C']); //last Name
						$content.= Html::tag('td', $line['D']); //Date of Birth
						$content.= Html::tag('td', $line['E']); //Course
						$content.= Html::tag('td', $line['F']); //Batch
						$content.= Html::tag('td', $line['G']); //Section
						$content.= Html::tag('td', $line['H']); //Admission Date
						
						$content.= Html::tag('td', ($line['type'] == 'E') ? Yii::t('stu', 'ERROR') : Yii::t('stu', 'SUCCESS')); //Status
						$content.= Html::tag('td', ($line['type'] == 'E') ? $line['message'] : Html::a(Yii::t('stu', 'View Profile'), ['stu-master/view', 'id' => $line['stuMasterId']], ['class' => 'btn btn-sm btn-info', 'target' => '_BLANK'])); //Remarks/Message
						
						echo Html::tag('tr', $content, ['class' => ($line['type'] == 'E') ? 'danger' : 'success']); 
						?>	
					<?php endforeach; ?> 
					</tbody>
				</table>
			</div>
		</div>
	</div><!--./box-body-->
</div><!--./box-->
<?php endif; ?>

<?php
$ckBoxCheckScript = <<< JS
    var table = $('#fixHeader').DataTable( {
        scrollY:        "450px",
        scrollX:        true,
        scrollCollapse: false,
        paging:         false,
        bSort: 			false,
        bInfo: 			false,
    } );  
JS;
$this->registerJs($ckBoxCheckScript, yii\web\View::POS_READY);
?>
