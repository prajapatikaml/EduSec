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
 * NoticeController implements the CRUD actions for Notice model.
 *
 * @package EduSec.modules.dashboard.controllers
 */

namespace app\modules\dashboard\controllers;

use Yii;
use app\modules\dashboard\models\Notice;
use app\modules\dashboard\models\NoticeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\bootstrap\ActiveForm;
use yii\helpers\Json;
use yii\web\UploadedFile;
use pheme\grid\actions\ToggleAction;

class NoticeController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
		    'notice-file' => ['post'],
                ],
            ],
        ];
    }

    public function actions() 
    {
	    return [
		'toggle' => [
		    'class' => ToggleAction::className(),
		    'modelClass' => 'app\modules\dashboard\models\Notice',
		    'attribute' => 'is_status',
		    // Uncomment to enable flash messages
		    'setFlash' => true,
		],
	    ];
    }
    /**
     * Lists all Notice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NoticeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Notice model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewPopup($id)
    {
	 return $this->renderAjax('view-popup', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Notice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Notice();

	if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax) {
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ActiveForm::validate($model);
       	}
        if ($model->load(Yii::$app->request->post())) {		
		
		$model->attributes = $_POST['Notice'];
		$model->notice_date = date('Y-m-d', strtotime($_POST['Notice']['notice_date']));
		$model->created_by = Yii::$app->getid->getId();
		$model->created_at= new \yii\db\Expression('NOW()');
		$model->notice_file_path = UploadedFile::getInstance($model,'notice_file_path');
		if($model->notice_file_path)
		{
			$model->notice_file_path->saveAs(Yii::getAlias('@webroot').'/data/notice/'.$model->notice_file_path = 'Notice_'.date("d-m-Y_His").'.'.$model->notice_file_path->extension);
		}
		else
			$model->notice_file_path = NULL;	

			if($model->save(false))
				return $this->redirect(['index']);
			else
				return $this->render('create', ['model' => $model,]);

		            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Notice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
	$old_model = $this->findModel($id);

	if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ActiveForm::validate($model);
       	}
        if ($model->load(Yii::$app->request->post())) {
		
		$model->attributes = $_POST['Notice'];
		$model->notice_date = Yii::$app->dateformatter->getDateFormat($_POST['Notice']['notice_date']);
		$model->notice_file_path = UploadedFile::getInstance($model,'notice_file_path');

		if($model->notice_file_path)
		{
			$Dfile = Yii::getAlias('@webroot').'/data/notice/'.$old_model->notice_file_path;
			if(is_file($Dfile) && file_exists($Dfile)) {
				unlink($Dfile);
			}
			$model->notice_file_path->saveAs(Yii::getAlias('@webroot').'/data/notice/'.$model->notice_file_path = 'Notice_'.date("d-m-Y_His").'.'.$model->notice_file_path->extension);
		}
		else
			$model->notice_file_path = $old_model->notice_file_path;

		$model->updated_by = Yii::$app->getid->getId();
		$model->updated_at = new \yii\db\Expression('NOW()');
		if($model->save(false))
			return $this->redirect(['view', 'id' => $model->notice_id]);
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Notice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = Notice::findOne($id);
	$model->is_status = 2;
	$model->updated_by = Yii::$app->getid->getId();
	$model->updated_at = new \yii\db\Expression('NOW()');
	$model->save();

        return $this->redirect(['index']);
    }

    public function actionNoticeFile( $nid )
    {
	$path = Yii::getAlias('@webroot') . '/data/notice/';
	$model = Notice::find()->where('notice_id = '.$nid)->one();
	$nfile = $path.$model->notice_file_path;
	$ext = substr(strrchr($model->notice_file_path,'.'),1);

	if(!empty($model) && file_exists($nfile)) {
		return Yii::$app->response->sendFile($nfile, date('Y-m-dHis').".".$ext);
	}
	else
		throw new NotFoundHttpException('The requested page does not exist.');	

    }

    /**
     * Finds the Notice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Notice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Notice::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
