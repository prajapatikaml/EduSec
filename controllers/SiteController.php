<?php

/*****************************************************************************************
 * EduSec  Open Source Edition is a School / College management system developed by
 * RUDRA SOFTECH. Copyright (C) 2010-2015 RUDRA SOFTECH.

 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see http://www.gnu.org/licenses. 

 * You can contact RUDRA SOFTECH, 1st floor Geeta Ceramics, 
 * Opp. Thakkarnagar BRTS station, Ahmedbad - 382350, India or
 * at email address info@rudrasoftech.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * RUDRA SOFTECH" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by RUDRA SOFTECH".
*****************************************************************************************/

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\modules\employee\models\EmpMaster;
use app\modules\student\models\StuMaster;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
	$this->checkInstallation();

	$this->layout = 'homePage';
	if (\Yii::$app->user->isGuest)
		return $this->redirect(['site/login']);
        else {
		$isStudent = Yii::$app->session->get('stu_id');
		$isEmployee = Yii::$app->session->get('emp_id');
		$holidayData = \app\models\NationalHolidays::find()->andWhere(['is_status'=>0])->asArray()->all();
		if(isset($isStudent)) {
		    $payFees = Yii::$app->db->createCommand("SELECT SUM(fees_pay_tran_amount) FROM fees_payment_transaction WHERE fees_pay_tran_stu_id=".Yii::$app->session->get('stu_id')." AND is_status=0")->queryScalar(); 
		    $currentFeesData = \app\modules\fees\models\FeesPaymentTransaction::getUnpaidTotal($isStudent);
        	    return $this->render('stu-dashboard', ['holidayData'=>$holidayData, 'currentFeesData'=>$currentFeesData, 'payFees'=>$payFees]);
		}
		else if(isset($isEmployee))
		    return $this->render('emp-dashboard', ['holidayData'=>$holidayData]);
		else
		    return $this->render('user-dashboard');
	}
    }

    public function checkInstallation()
    {	
	$checkTbl = Yii::$app->db->schema->tableNames;
	if(empty($checkTbl)) {
		return $this->redirect(['/installation/db-import']);
	} 
	$chkUserTbl = \app\models\User::find()->exists();
	$chkInstituteTbl = \app\models\Organization::find()->exists();
	if(!$chkInstituteTbl || !$chkUserTbl) {
		return $this->redirect(['/installation', 'return'=>1]);
	}
	else  {
		return true;
	}
    }

    public function actionLogin()
    {
	$this->checkInstallation();

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

   	$model = new LoginForm();
	$login = new \app\models\LoginDetails();
	if ($model->load(Yii::$app->request->post())) {
		$log = \app\models\User::find()->where(['user_login_id' => $_POST['LoginForm']['username'], 'is_block' => 0])->one();
		if(empty($log)) {
			\Yii::$app->session->setFlash('loginError', '<i class="fa fa-warning"></i><b> Incorrect username or password. !</b>');
		      	return $this->render('login', ['model' => $model]);
		}
		
		$login->login_user_id = $log['user_id'];
		$loginuser = $login->login_user_id;


		$emplogin = EmpMaster::find()->andWhere(['emp_master_user_id'=>$loginuser])->one();
		$studlogin = StuMaster::find()->andWhere(['stu_master_user_id'=>$loginuser])->one();
		if($studlogin)
		{
			\Yii::$app->session->set('stu_id',$studlogin->stu_master_id);
		}
		else if($emplogin)
		{
			\Yii::$app->session->set('emp_id',$emplogin->emp_master_id);
		}
		else if(!$emplogin && !$studlogin)
		{
			\Yii::$app->session->set('admin_user',$loginuser);
		}
		else {
		      \Yii::$app->session->setFlash('loginError', '<i class="fa fa-warning"></i><b> These Login credentials are Blocked/Deactive by Admin</b>');
		      return $this->render('login', ['model' => $model,]);	
		}

		$login->login_status = 1;
		$login->login_at = new \yii\db\Expression('NOW()');
		$login->user_ip_address=$_SERVER['REMOTE_ADDR'];
		$login->save(false);
		
		if($model->login()) 
	            return $this->goBack();
		else
		    return $this->render('login', ['model' => $model,]);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        if(isset(Yii::$app->user->id))
		\app\models\LoginDetails::updateAll(['login_status' => 0, 'logout_at'=> new \yii\db\Expression('NOW()')],'login_user_id='.Yii::$app->user->id.' AND login_status = 1');	
				
		Yii::$app->user->logout();
		return $this->goHome();
    }

    public function actionForgotpassword()
    {
		$model = new LoginForm();
        return $this->render('forgotpassword', ['model'=>$model,]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionLoadimage()
    {
		$model = \app\models\Organization::find()->asArray()->all();

        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: binary');
		header('Content-type: '.$model[0]['org_logo_type']);
		echo $model[0]['org_logo'];  
	
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
