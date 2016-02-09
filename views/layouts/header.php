<?php
use \app\assets_b\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\NotFoundHttpException;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

Yii::$app->name = "EduSec";

if(Yii::$app->language == 'ar') :
	$this->registerCss('
.navbar-right:last-child {
    margin-left: 6px !important;
}
.navbar-nav > .notifications-menu > .dropdown-menu > li.header::after, .navbar-nav > .messages-menu > .dropdown-menu > li.header::after, .navbar-nav > .tasks-menu > .dropdown-menu > li.header::after {
	left:8% !important;
}
');
endif;
?>

<header class="main-header header<?php // (Yii::$app->language == 'ar' ? 'main-header' : 'header')?>">

<?= Html::a(Html::img(Yii::$app->request->baseUrl.'/images/edusec.png', ['width'=>'120px;', 'height'=>'22px']), Yii::$app->homeUrl, ['class' => 'logo', /*'style' => ((\Yii::$app->language == 'ar') ? 'padding: 14px 50px !important;' : '')*/]) ?>

<nav class="navbar navbar-static-top" role="navigation">

<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
<?php
$empInfo = app\modules\employee\models\EmpInfo::find()->where(["LIKE", "emp_joining_date", date('Y-m-d')])->count();
$stuList = app\modules\student\models\StuMaster::find()->where(["LIKE", "created_at", date('Y-m-d')])->count();
$events = app\modules\dashboard\models\Events::find()->where(["LIKE", "created_at", date('Y-m-d')])->count();
$eventsList = app\modules\dashboard\models\Events::find()->where(["LIKE", "event_start_date", date('Y-m-d')])->all();
$empList = Yii::$app->db->createCommand("SELECT * from emp_master WHERE DATE_FORMAT(created_at,'%y-%m-%d') between date_sub(NOW(),INTERVAL 1 WEEK) AND NOW() AND is_status = 0;")->queryAll();

$countT = ((!Yii::$app->session->get('stu_id') && !Yii::$app->session->get('emp_id')) ? ($empInfo + $stuList + count($empList) + $events) : 0);
$notifyCount = ($countT + count($eventsList));

?>
<div class="navbar-right">

<ul class="nav navbar-nav">
<li class="dropdown notifications-menu">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="<?= Yii::t('app', 'Select Language') ?>">
		<i class="fa fa-language fa-lg"></i>
    </a>
	<ul class="dropdown-menu" style="<?= (Yii::$app->language == 'ar') ? 'left: 0 !important; right: auto !important;' : '';?>">
		<li class="header">
			<?= Html::beginForm( yii\helpers\Url::to(['/site/language']), NULL, ['style' => 'margin: 10px; padding-bottom: 35px;'] ) ?>
			<div class="col-sm-6 col-xs-6 no-padding">
			<?= Html::label(Yii::t('app', 'Select Language'), 'language') ?>
			</div>
			<div class="col-sm-6 col-xs-6" style="padding-left:7px;">
			<?= Html::dropDownList('language', Yii::$app->language, ['en' => Yii::t('app', 'English'), 'gu' => Yii::t('app', 'Gujarati (ગુજરાતી)'), 'hi' => Yii::t('app', 'Hindi (हिन्दी)'), 'fr' => Yii::t('app', 'French (français)'), 'es' => Yii::t('app', 'Spanish (Latin American)'), 'ar' => Yii::t('app', 'Arabic (العربية)')], ['class'=> 'form-control', 'onchange' => 'this.form.submit()', 'style' => 'padding: 5px;', 'title' => Yii::t('app', 'Select Language')]) ?>
			</div>

			<?= Html::endForm() ?>
		</li>
	</ul>
</li>
<?php if(!Yii::$app->session->get('stu_id')) : ?>
<li class="dropdown module-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" title="<?= Yii::t('app', 'Main Menu') ?>">
		<i class="fa fa-th fa-lg"></i>
    </a>
	<?= $this->render(
		'module-name.php'
	)
	?>
</li>
<?php endif; ?>
<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-warning"><?= ($notifyCount) ? $notifyCount : "0";?></span>
    </a>
    <ul class="dropdown-menu" style="<?= (Yii::$app->language == 'ar') ? 'left: 0 !important; right: auto !important;' : '';?>">

        <li class="header"><?= (($notifyCount) ? (Yii::t('app', "You have ").$notifyCount.Yii::t('app', " notifications")) : (Yii::t('app', "You have No notifications"))); ?></li>
	<?php if($notifyCount != 0) : ?>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
		<?php 
		    if(!Yii::$app->session->get('stu_id') && !Yii::$app->session->get('emp_id')) :
		      if(!empty($empList)) { ?>
                <li>
                    <a href="#">
                        <i class="fa fa-users info"></i><strong> <?= count($empList); ?> <?= Yii::t('app', 'new employee(s) added in week') ?> </strong>
                    </a>
                </li>
		<?php } ?>
		<?php if(!empty($stuList)) { ?>
                <li>
                    <a href="#">
                        <i class="fa fa-user warning"></i><strong> <?= Html::encode($stuList); ?> <?= Yii::t('app', 'new student(s) added today') ?> </strong>
                    </a>
                </li>
		<?php } ?>
		<?php if(!empty($empInfo)) { ?>
                <li>
                    <a href="#">
                        <i class="fa fa-users success"></i><strong> <?= Html::encode($empInfo); ?> <?= Yii::t('app', 'new employee(s) joined today') ?> </strong>
                    </a>
                </li>
		<?php } ?>
		<?php if(!empty($events)) { ?>
                <li>
                    <a href="#">
                        <i class="fa fa-info success"></i><strong> <?= Html::encode($events); ?> <?= Yii::t('app', 'event(s) created today') ?> </strong>
                    </a>
                </li>
		<?php } 
		     endif;
		?>
		<?php if(!empty($eventsList)) {
			foreach($eventsList as $event) :
		?>
                <li>
                    <a href="#">
                        <i class="fa fa-calendar warning"></i> <?= '<strong style="word-wrap: break-word; width:50px">'.Yii::t('app', 'Event : ').'</strong>'.Html::encode(substr($event->event_title, 0, 10))."... &nbsp; <strong> ".Yii::t('app', 'Time : ')."</strong><small class='label label-info'>".Html::encode(date('d-M H:i A', strtotime($event->event_start_date)))."</small>";?>
                    </a>
                </li>
		<?php endforeach; } ?>
            </ul>
        </li>

	<?php endif; ?>
    </ul>
</li>

<?php
if (Yii::$app->user->isGuest) {
    ?>
    <li class="footer">
        <?= Html::a(Yii::t('app', 'Login'), ['/site/login']) ?>
    </li>
<?php
} else {
	$isStudent = $isEmployee = '';

	if(!Yii::$app->user->isGuest) {
	      $isStudent = Yii::$app->session->get('stu_id');
	      $isEmployee = Yii::$app->session->get('emp_id');
	}
	if(isset($isStudent))
	{
		$stuMaster = app\modules\student\models\StuMaster::find()->andWhere(['stu_master_id' => $isStudent])->one();
	        $stuInfo = app\modules\student\models\StuInfo::findOne($stuMaster->stu_master_stu_info_id);
		$Photo = $stuInfo->getStuPhoto($stuInfo->stu_photo);
		$ProfileLink =  ['/student/stu-master/view', 'id' => $stuMaster->stu_master_id];
		$linkStyle = 'display:block'; // for profile link class
	}
	else if(isset($isEmployee))
	{
		$empMaster = app\modules\employee\models\EmpMaster::find()->andWhere(['emp_master_id' => $isEmployee])->one();
	        $empInfo = app\modules\employee\models\EmpInfo::findOne($empMaster->emp_master_emp_info_id);

		$Photo =  $empInfo->getEmpPhoto($empInfo->emp_photo);
		$ProfileLink =  ['/employee/emp-master/view', 'id' => $empMaster->emp_master_id];
		$linkStyle = 'display:block'; // for profile link class
	}
	else {
		$Photo = Yii::getAlias('@web'). '/data/emp_images/no-photo.png';
		$linkStyle = 'display:none'; // for profile link class
		$ProfileLink = $userPullL = '';
	}
    ?>
    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i>
            <span><?= @Yii::$app->user->identity->user_login_id ?> <i class="caret"></i></span>
        </a>
        <ul class="dropdown-menu" style="margin-right:<?= (Yii::$app->language == 'ar' && isset($isStudent)) ? '-50px' : '10px'; ?>">
            <!-- User image -->
            <li class="user-header bg-light-blue">
                <img src="<?= $Photo ?>" class="img-circle" alt="User Image"/>

                <p style="font-size: 18px;">
                    <?= @Yii::$app->user->identity->user_login_id ?>
                </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body" style="<?= $linkStyle ?>">
                <div class="col-xs-6 no-padding">
		    <?= Html::a(Yii::t('app', 'View Profile'), $ProfileLink, ['class' => 'btn btn-default btn-flat', 'style' => 'font-size:13px']) ?>
                </div>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
		    <?= Html::a(Yii::t('app', 'Change Password'), ['/user/change'], ['class' => 'btn btn-default btn-flat', 'style' => 'font-size:12px'.((Yii::$app->language == 'fr' || Yii::$app->language == 'es') ? ';padding: 6px 3px;' : '')]) ?>
                </div>
                <div class="pull-right">
                    <?= Html::a(
                            Yii::t('app', 'Sign out'),
                            ['/site/logout'],
                            ['data-method' => 'post','class'=>'btn btn-default btn-flat', 'style' => 'font-size:12px'.((Yii::$app->language == 'fr' || Yii::$app->language == 'es') ? ';padding: 6px 3px;' : '')]
                        ) ?>
                </div>
            </li>
        </ul>
    </li><?php
}
?>
<!-- User Account: style can be found in dropdown.less -->

</ul>
</div>
</nav>
</header>
