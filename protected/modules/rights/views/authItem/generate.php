<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Generate items'),
); ?>
<div id="rights-menu">

	<?php $this->renderPartial('/_menu'); ?>

</div>

<div id="generator">

	<h2 style="color:#427FED;border-bottom:2px solid #ff503f;padding: 10px 1%;width: 98%;"><?php echo Rights::t('core', 'Generate items'); ?></h2>

	<p><?php echo Rights::t('core', 'Please select which items you wish to generate.'); ?></p>

	<div class="form">

		<?php $form=$this->beginWidget('CActiveForm'); ?>

			<div class="row">

				<table class="items generate-item-table" border="0" cellpadding="0" cellspacing="0">

					<tbody>

						<tr class="application-heading-row">
							<th colspan="3"><?php echo Rights::t('core', 'Application'); ?></th>
						</tr>

						<?php $this->renderPartial('_generateItems', array(
							'model'=>$model,
							'form'=>$form,
							'items'=>$items,
							'existingItems'=>$existingItems,
							'displayModuleHeadingRow'=>true,
							'basePathLength'=>strlen(Yii::app()->basePath),
						)); ?>

					</tbody>

				</table>

			</div>
<br/>
			<div class="row">

   				<?php echo CHtml::link(Rights::t('core', 'Select all'), '#', array(
   					'onclick'=>"jQuery('.generate-item-table').find(':checkbox').attr('checked', 'checked'); return false;",
   					'class'=>'selectAllLink')); ?>
   				/
				<?php echo CHtml::link(Rights::t('core', 'Select none'), '#', array(
					'onclick'=>"jQuery('.generate-item-table').find(':checkbox').removeAttr('checked'); return false;",
					'class'=>'selectNoneLink')); ?>

			</div>

   			<div class="row buttons">

				<?php echo CHtml::submitButton(Rights::t('core', 'Generate'),array('class'=>'submit')); ?>

			</div>

		<?php $this->endWidget(); ?>

	</div>

</div>
