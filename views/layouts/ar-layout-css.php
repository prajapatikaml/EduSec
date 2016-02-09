<?php use yii\helpers\Html; ?>
<?php if(Yii::$app->language == 'ar'): ?> <!-- Add RTL css for supporting Arabic Language -->
	<!-- Bootstrap 3.3.5 RTL -->
	<link rel="stylesheet" href="<?= Yii::getAlias('@web'); ?>/vendor/bower/bootstrap-rtl/css/bootstrap-rtl.min.css"> 
	<!-- Theme RTL style -->
	<link rel="stylesheet" href="<?= Yii::getAlias('@web'); ?>/vendor/bower/admin-lte/css/AdminLTE-rtl.css">

<?php 

$this->registerCss('
		input[type], textarea {
			direction: rtl;
		}
		.box-title {
			float:right !important;
			/*padding:0 !important;*/
		}
		.box.box-solid .box-title {
			float:right !important;
			padding:5px !important;
		}
		.edusecArLangCss {
			float:right !important;
		}
		.edusecArLangHide {
			display:none !important;
		}
		.table.detail-view th {
			float:right !important;
		}
		.close {
			float:left !important;
		}
		.highcharts-legend-item text, text {
			direction:ltr;
		}
		.table th {
			text-align: right !important;
		}
		.popover {
			width:300px;
		}
		.nav-tabs > li {
			float: right;
		}
		.select2-search-choice-close {
			right: unset !important;
		}
		.edusecArLangPopover {
			width: 6.667% !important;
		}
');

endif; ?>
