<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets_b;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
/*
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
	//'css/bootstrap-dropdown-checkbox.css',
	'css/bootstrap-multiselect.css',
    ];
    public $js = [
	//'js/bootstrap-dropdown-checkbox.min.js',
	'js/bootstrap-multiselect.js',
	'js/table_js/FixedColumns.js',
	'js/table_js/jquery.dataTables.js',
    ];

     public $jsOptions = [
    'position' => \yii\web\View::POS_HEAD
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
} */

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath = '@bower/admin-lte';
    public $css = [
		'css/AdminLTE.css',
		'css/font-awesome-4.3.0/css/font-awesome.min.css',
		'css/ionicons-2.0.1/css/ionicons.min.css',
		'css/bootstrap-multiselect.css',
		'css/EdusecCustome.css',
    ];
    public $js = [
		'js/AdminLTE/app.js',
		//'//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
		'js/plugins/slimScroll/jquery.slimscroll.min.js',
		'js/bootstrap-multiselect.js',
		'js/custom-delete-confirm.js',
		'js/bootbox.js',
		'js/bootstrap.file-input.js',
		'js/bootstrapx-clickover.js',
    ];
    public $jsOptions = [
    		'position' => \yii\web\View::POS_HEAD
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
	'yii\bootstrap\BootstrapPluginAsset',
    ];
}
