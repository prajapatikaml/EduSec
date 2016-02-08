<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-19">
	  <div class='module-links'>
	   <?php 
		
		if(!empty($_REQUEST['page'])) {
		  $hasPortlets =  $_REQUEST['page'];
		  Yii::app()->user->setState('loadPortlets', $hasPortlets);
		}
		else
		  $hasPortlets = Yii::app()->user->getState('loadPortlets');
	     if(isset($hasPortlets)) {
		echo '<span class="module-title">'.CHtml::link(ucfirst(Yii::app()->user->getState('loadPortlets')), Yii::app()->baseUrl.'/dashboard/index.indexPage/page/'.Yii::app()->user->getState('loadPortlets')).'</span>'; 
		$this->widget('application.components.views.ModulePages.Portlets.'.Yii::app()->user->getState('loadPortlets') , array());
	    }
	   ?>
	  </div>
	  <div class='main-link'>
	     <a href="#"><?php echo ucfirst(Yii::app()->user->getState('loadPortlets')); ?></a>
	  </div>

	<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
</div>
<?php $this->endContent(); ?>
