<?php 
use yii\helpers\Html; 
use app\modules\student\models\StuMaster;
use \app\modules\course\models\Batches;
$this->title = 'Manage Course Modules';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(".disp-count{cursor:default;} .disp-count:hover {background-color:none !important}");
?>


<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-graduation-cap"></i> Manage Course Modules</h3>
	</div>
	<div class="box-body">

	<div class="row">
		<div class="col-md-4 col-sm-6 col-xs-12">
		      <div class="edusec-link-box">
		        <span class="edusec-link-box-icon bg-yellow"><i class="fa fa-graduation-cap"></i></span>
		        <div class="edusec-link-box-content">
		          <span class="edusec-link-box-text"><?= Html::a('Manage Course', ['/course/courses']);?></span>
		          <span class="edusec-link-box-number"><?= app\modules\course\models\Courses::find()->where(['is_status'=>0])->count(); ?></span>
			 <span class="edusec-link-box-desc"></span>
			  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/course/courses/create']); ?></span>
		        </div><!-- /.info-box-content -->
		      </div><!-- /.info-box -->
		</div>

		<div class="col-md-4 col-sm-6 col-xs-12">
		      <div class="edusec-link-box">
		        <span class="edusec-link-box-icon bg-teal"><i class="fa fa-users"></i></span>
		        <div class="edusec-link-box-content">
		          <span class="edusec-link-box-text"><?= Html::a('Manage Batches', ['/course/batches']);?></span>
		          <span class="edusec-link-box-number"><?= app\modules\course\models\Batches::find()->where(['is_status'=>0])->count(); ?></span>
			 <span class="edusec-link-box-desc"></span>
			  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/course/batches/create']); ?></span>
		        </div><!-- /.info-box-content -->
		      </div><!-- /.info-box -->
		</div>

		<div class="col-md-4 col-sm-6 col-xs-12">
		      <div class="edusec-link-box">
		        <span class="edusec-link-box-icon bg-green"><i class="fa fa-sitemap"></i></span>
		        <div class="edusec-link-box-content">
		          <span class="edusec-link-box-text"><?= Html::a('Manage Section', ['/course/section']);?></span>
		          <span class="edusec-link-box-number"><?= app\modules\dashboard\models\Notice::find()->where(['is_status'=>0])->count(); ?></span>
			 <span class="edusec-link-box-desc"></span>
			  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/course/section/create']); ?></span>
		        </div><!-- /.info-box-content -->
		      </div><!-- /.info-box -->
		</div>

	</div> <!-- /. End Row-->	

</div><!-- /.box-body -->
</div>

<div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title"><i class="fa fa-graduation-cap"></i> Manage Current Active Course</h3>
	</div><!-- /.box-header -->
	<div class="box-body">
	<?php if(!empty($actCourseData)) : ?>
	  <div id="accordion" class="box-group">

	<?php foreach($actCourseData as $ck=>$cv) : ?>	
	    <div class="panel box box-default">
	      <div class="box-header with-border">
		<h4 class="box-title">
		  <?= Html::a(($ck+1).'. '.$cv->course_name, '#collapse'.$ck, ['data-parent'=>'#accordion', 'data-toggle'=>'collapse', 'aria-expanded'=>"true", 'style'=>'color:#3c8dbc']) ?>
		</h4>
		<div class="pull-right box-tools">
		    <span class="btn btn-sm btn-info disp-count">
			<i class="fa fa-users"></i> Students &nbsp;
			<span class="badge">
				<?= StuMaster::find()->where(['is_status'=>0, 'stu_master_course_id'=>$cv->course_id])->count() ?>
			</span>
		    </span>
		     <span class="btn btn-sm btn-warning disp-count">
			<i class="fa fa-sitemap"></i> Batches &nbsp;
			<span class="badge">
				<?= Batches::find()->where('is_status<>2 AND batch_course_id='.$cv->course_id)->count() ?>
			</span>
		    </span>

		    <?= Html::a('<i class="fa fa-eye"></i>', ['courses/view', 'id'=>$cv->course_id], ['class'=>'btn-sm btn btn-default', 'title'=>'View Course Details']) ?>
		    <?= Html::a('<i class="fa fa-pencil-square-o"></i>', ['courses/update', 'id'=>$cv->course_id], ['class'=>'btn-sm btn btn-default', 'title'=>'Edit Course Details']) ?>
		    <?= Html::a('<i class="fa fa-trash-o"></i>', ['courses/delete', 'id'=>$cv->course_id], ['class'=>'btn-sm btn btn-default', 'title'=>'Delete', 
			'data' => ['confirm' => 'Are you sure you want to delete this item?',
          			'method' => 'post']
			]) 
		     ?>
                </div>
	      </div>

	      <div class="panel-collapse collapse" id="<?= 'collapse'.$ck?>" aria-expanded="true" style="">
		<div class="box-body">
		<?php $batchData = Batches::find()->where('is_status!=2 AND batch_course_id = '.$cv->course_id)->asArray()->all(); ?>
		  <ol style=" font-size: 15px; line-height: 35px;">
		    <?php foreach($batchData as $bk=>$bv) : ?>
			<li><?= $bv['batch_name'] ?>
			    <?= Html::a('<i class="fa fa-eye"></i>', ['batches/view', 'id'=>$bv['batch_id']], ['class'=>'btn-xs btn btn-default', 'title'=>'View Batch Details']) ?>
			    <?= Html::a('<i class="fa fa-pencil-square-o"></i>', ['batches/update', 'id'=>$bv['batch_id']], ['class'=>'btn-xs btn btn-default', 'title'=>'Edit Batch Details']) ?>
			    <?= Html::a('<i class="fa fa-trash-o"></i>', ['batches/delete', 'id'=>$bv['batch_id']], ['class'=>'btn-xs btn btn-default', 'title'=>'Delete', 
				'data' => ['confirm' => 'Are you sure you want to delete this item?',
				'method' => 'post']
			     ]) 
			?>	
				<div class="pull-right hidden-xs">
					<span class="label label-default">
						<i class="fa fa-users"></i> Students&nbsp;
						<span class="badge" style="background:#fff;color: #777;">
						<?= StuMaster::find()->where(['is_status'=>0, 'stu_master_batch_id'=>$bv['batch_id']])->count() ?>
						</span>
					</span> &nbsp;
					<?php if($bv['is_status']==0) : ?>
						<span class="label label-success">Active</span>
					<?php else : ?>
						<span class="label label-danger">Inactive</span>
					<?php endif; ?>
				</div>
			<?php $secData = \app\modules\course\models\Section::find()->where('is_status!=2 AND section_batch_id = '.$bv['batch_id'])->asArray()->all(); ?>
				<ol>
				<?php foreach($secData as $sk=>$sv) : ?>
					<li>
					    <?= $sv['section_name'] ?>
					    <?= Html::a('<i class="fa fa-eye"></i>', ['section/view', 'id'=>$sv['section_id']], ['class'=>'btn-xs btn btn-default', 'title'=>'View Section Details']) ?>
			    		    <?= Html::a('<i class="fa fa-pencil-square-o"></i>', ['section/update', 'id'=>$sv['section_id']], ['class'=>'btn-xs btn btn-default', 'title'=>'Edit Section Details']) ?>
			    		    <?= Html::a('<i class="fa fa-trash-o"></i>', ['section/delete', 'id'=>$sv['section_id']], ['class'=>'btn-xs btn btn-default', 'title'=>'Delete', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post']]) ?> 
					    <div class="pull-right hidden-xs">
						<span class="label label-default">
							<i class="fa fa-users"></i> Students&nbsp;
							<span class="badge" style="background:#fff;color: #777;">
							<?= StuMaster::find()->where(['is_status'=>0, 'stu_master_section_id'=>$sv['section_id']])->count() ?>
							</span>
						</span> &nbsp;
						<?php if($bv['is_status']==0) : ?>
						<span class="label label-success">Active</span>
						<?php else : ?>
						<span class="label label-danger">Inactive</span>
						<?php endif; ?>
					    </div>
					</li>
				<?php endforeach; ?> 
				</ol>
			 
			</li>
		    <?php endforeach; ?>
		  </ol>
		</div>
	      </div><!-- /.panel box -->
	    </div><!-- /.panel box -->
	<?php endforeach; ?>
	  </div><!-- /.box-group -->
	<?php else : ?>
		<div class="alert alert-danger">No results found.</div>
	<?php endif; ?>
	</div><!-- /.box-body -->
</div><!-- /.box-main -->