<?php
use \app\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\NotFoundHttpException;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

Yii::$app->name = "EduSec";
?>

<header class="header">

<?= Html::a(Yii::$app->name, Yii::$app->homeUrl, ['class' => 'logo']) ?>

<nav class="navbar navbar-static-top" role="navigation">

<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>

<div class="navbar-right">

<ul class="nav navbar-nav">

<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-warning"></i>
        <span class="label label-warning">10</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have 10 notifications</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li>
                    <a href="#">
                        <i class="ion ion-ios7-people info"></i> 5 new members joined today
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page
                        and may cause design problems
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-users warning"></i> 5 new members joined
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="ion ion-ios7-cart success"></i> 25 sales made
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ion ion-ios7-person danger"></i> You changed your username
                    </a>
                </li>
            </ul>
        </li>
        <li class="footer"><a href="#">View all</a></li>
    </ul>
</li>
<!-- Tasks: style can be found in dropdown.less -->
<li class="dropdown tasks-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-tasks"></i>
        <span class="label label-danger">9</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have 9 tasks</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li><!-- Task item -->
                    <a href="#">
                        <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">20% Complete</span>
                            </div>
                        </div>
                    </a>
                </li>
                <!-- end task item -->
                <li><!-- Task item -->
                    <a href="#">
                        <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                        </h3>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">40% Complete</span>
                            </div>
                        </div>
                    </a>
                </li>
                <!-- end task item -->
                <li><!-- Task item -->
                    <a href="#">
                        <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                        </h3>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">60% Complete</span>
                            </div>
                        </div>
                    </a>
                </li>
                <!-- end task item -->
                <li><!-- Task item -->
                    <a href="#">
                        <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                        </h3>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">80% Complete</span>
                            </div>
                        </div>
                    </a>
                </li>
                <!-- end task item -->
            </ul>
        </li>
        <li class="footer">
            <a href="#">View all tasks</a>
        </li>
    </ul>
</li>
<?php
if (Yii::$app->user->isGuest) {
    ?>
    <li class="footer">
        <?= Html::a('Login', ['/site/login']) ?>
    </li>
<?php
} else {
	$isStudent = $isEmployee = '';

	if(!Yii::$app->user->isGuest){
	      $isStudent = Yii::$app->session->get('stu_id');
	      $isEmployee = Yii::$app->session->get('emp_id');
	}
	if(isset($isStudent))
	{
		$stuMaster = app\modules\student\models\StuMaster::find()->where(['stu_master_id' => $isStudent, 'is_status' => 0])->one();
		if(!empty($stuMaster))
		      $stuInfo = app\modules\student\models\StuInfo::findOne($stuMaster->stu_master_stu_info_id);
		else
		      throw new NotFoundHttpException('The requested user login credentials does not exist.');

		$path = Yii::$app->homeUrl. 'data/stu_images/';
		$Photo = ($stuInfo->stu_photo) ? $path.$stuInfo->stu_photo : $path.'noStudent.png';
		$ProfileLink =  ['/student/stu-master/view', 'id' => $stuMaster->stu_master_id];
		$linkStyle = 'display:block'; // for profile link class
	}
	else if(isset($isEmployee))
	{
		$empMaster = app\modules\employee\models\EmpMaster::find()->where(['emp_master_id' => $isEmployee, 'is_status' => 0])->one();
		if(!empty($empMaster))
		      $empInfo = app\modules\employee\models\EmpInfo::findOne($empMaster->emp_master_emp_info_id);
		else
		      throw new NotFoundHttpException('The requested user login credentials does not exist.');

		$path = Yii::$app->homeUrl. 'data/emp_images/';
		$Photo = ($empInfo->emp_photo) ? $path.$empInfo->emp_photo : $path.'no-photo';
		$ProfileLink =  ['/employee/emp-master/view', 'id' => $empMaster->emp_master_id];
		$linkStyle = 'display:block'; // for profile link class
	}
	else {
		$Photo = Yii::$app->homeUrl. 'data/emp_images/no-photo';
		$linkStyle = 'display:none'; // for profile link class
		$ProfileLink = $userPullL = '';
	}
    ?>
    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i>
            <span><?= @Yii::$app->user->identity->user_login_id ?> <i class="caret"></i></span>
        </a>
        <ul class="dropdown-menu" style="margin-right:10px">
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
		    <?= Html::a('View Profile', $ProfileLink, ['class' => 'btn btn-default btn-flat', 'style' => 'font-size:13px']) ?>
                </div>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
		    <?= Html::a('Change Password', ['/user/change'], ['class' => 'btn btn-default btn-flat', 'style' => 'font-size:12px']) ?>
                </div>
                <div class="pull-right">
                    <?= Html::a(
                            'Sign out',
                            ['/site/logout'],
                            ['data-method' => 'post','class'=>'btn btn-default btn-flat', 'style' => 'font-size:12px']
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
