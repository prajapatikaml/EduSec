<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Create :type', array(':type'=>Rights::getAuthItemTypeName($_GET['type']))),
); ?>

<div class="createAuthItem">

	<h2 style="color:#427FED;border-bottom:2px solid #ff503f;padding: 10px 1%;width: 98%;"><?php echo Rights::t('core', 'Create :type', array(
		':type'=>Rights::getAuthItemTypeName($_GET['type']),
	)); ?></h2>

	<?php $this->renderPartial('_form', array('model'=>$formModel)); ?>

</div>
