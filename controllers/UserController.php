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

/**
 * UserController implements the CRUD actions for User model.
 */

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\student\models\StuMasterSearch;
use app\modules\student\models\StuMaster;
use app\modules\student\models\StuInfo;
use app\modules\employee\models\EmpMasterSearch;
use app\modules\employee\models\EmpMaster;
use app\modules\employee\models\EmpInfo;

class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionChange()
    {
	$model=$this->findModel(Yii::$app->user->id);
	$model->scenario = 'change';

	if(isset($_POST['User']))
	{
		$model->attributes = $_POST['User'];
		$user = User::findOne(Yii::$app->user->id);
		$model->user_password = md5($model->new_pass.$model->new_pass);
		if($model->save())
			return $this->redirect(['/site/index']);
	}

	return $this->render('password_changeform',[
		'model'=>$model,
	]);
     }

    public function actionResetstudpassword()
    {
	$model = new StuMasterSearch();

	return $this->render('resetstudpassword',[
		'model'=>$model,
	]);
    }
   
    public function actionUpdateStudPassword($id)
    {
		$model=$this->findModel($id);
		$student_data = StuMaster::find()->where(['stu_master_user_id'=>$_REQUEST['id']])->one();
		$student_info = StuInfo::findOne($student_data->stu_master_stu_info_id)->stu_first_name;
		$model->user_password=MD5($model->user_login_id.$model->user_login_id);
		$model->updated_by = Yii::$app->getid->getId();
		$model->updated_at= new \yii\db\Expression('NOW()');
		if($model->save()) {
		 	\Yii::$app->session->setFlash('resetstudpassword',"<i class='glyphicon glyphicon-info-sign'></i> ".$student_info."'s Password is Reset");
			return $this->redirect(['user/resetstudpassword']);
		}
		
     }

     public function actionResetemppassword()
     {
	$model=new EmpMasterSearch();

	return $this->render('resetemppassword',[
			'model'=>$model,
		]);
     }

     public function actionUpdateEmpPassword($id)
     { 
		$model=$this->findModel($id);
		$emp_data = EmpMaster::find()->where(['emp_master_user_id'=>$id])->one();		
		$emp_info = EmpInfo::findOne($emp_data->emp_master_emp_info_id)->emp_first_name;
		$model->user_password=MD5($model->user_login_id.$model->user_login_id);
		$model->updated_by = Yii::$app->getid->getId();
		$model->updated_at= new \yii\db\Expression('NOW()');
		if($model->save()) {
		 	\Yii::$app->session->setFlash('resetemppassword',"<i class='glyphicon glyphicon-info-sign'></i> " .$emp_info."'s Password is Reset");
			return $this->redirect(['user/resetemppassword']);
		}
		
    }

    public function actionResetemploginid()
    {
	$model = new EmpMasterSearch();
	
	return $this->render('resetemploginid',[
		'model'=>$model,
	]);
    }

    /** Use for update employee login user details.
	*  @param integer $id the ID of the model to be update.
	*/
    public function actionUpdateemploginid($id)
    {
	$model=$this->findModel($id);
	$emp_data = EmpMaster::find()->where(['emp_master_user_id'=>$id])->one();		
	$emp_info = EmpInfo::findOne($emp_data->emp_master_emp_info_id)->emp_first_name;

	if(isset($_POST['User']))
	{
		$model->attributes=$_POST['User'];
		$model->user_login_id = $_POST['User']['user_login_id'];
		\Yii::$app->session->setFlash('resetemploginid',"<i class='glyphicon glyphicon-info-sign'></i> " .$emp_info."'s Login id is Reset");

		if($model->save()) {
			\Yii::$app->session->setFlash('resetemploginid',"<i class='glyphicon glyphicon-info-sign'></i> " .$emp_info."'s Login id is Reset");
			return $this->redirect(['resetemploginid']);
		}
	}

	return $this->render('updateemploginid',[
		'model'=>$model,
	]);
    }

    public function actionResetstudloginid()
    {
	$searchModel = new StuMasterSearch();
	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

	return $this->render('resetstudloginid',[
		'searchModel'=>$searchModel,'dataProvider' => $dataProvider,
	]);
    }

    public function actionUpdatestudloginid($id)
    {
	$model=$this->findModel($id);
	$student_data = StuMaster::find()->where(['stu_master_user_id'=>$_REQUEST['id']])->one();
	$student_info = StuInfo::findOne($student_data->stu_master_stu_info_id)->stu_first_name;

	if(isset($_POST['User']))
	{
		$model->attributes=$_POST['User'];
		$model->user_login_id = $_POST['User']['user_login_id'];
		\Yii::$app->session->setFlash('resetstudloginid',"<i class='glyphicon glyphicon-info-sign'></i> " .$student_info."'s Login id is Reset");
		if($model->save()) {
			\Yii::$app->session->setFlash('resetstudloginid',"<i class='glyphicon glyphicon-info-sign'></i> " .$student_info."'s Login id is Reset");
			return $this->redirect(['resetstudloginid']);
		}
	}

	return $this->render('updatestudloginid',[
		'model'=>$model,
	]);
    }
    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
