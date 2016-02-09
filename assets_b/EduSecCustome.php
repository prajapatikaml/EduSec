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

class EduSecCustome extends AssetBundle
{
    public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath = '@bower/admin-lte';
    public $css = [
		//'css/AdminLTE.css',
    ];
    public $js = [
		'js/responsive-tabs.js',
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
