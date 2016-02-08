<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" media="print,screen" />
<div id="rights" class="container">

	<div id="content">

		<?php if( $this->id!=='install' ): ?>

			<div id="menu">

				<?php $this->renderPartial('/_menu'); ?>

			</div>

		<?php endif; ?>

		<?php $this->renderPartial('/_flash'); ?>

		<?php echo $content; ?>

	</div><!-- content -->

</div>


