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
 * @package EduSec.modules.course.controllers 
 */

namespace app\modules\course\controllers;

use Yii;
use app\modules\course\models\Batches;
use app\modules\course\models\BatchesSearch;
use app\modules\course\models\Section;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\HttpException;
use yii\bootstrap\ActiveForm;
use yii\helpers\Json;
use pheme\grid\actions\ToggleAction;

class BatchesController extends Controller
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
    public function actions() 
    {
	    return [
		'toggle' => [
		    'class' => ToggleAction::className(),
		    'modelClass' => 'app\modules\course\models\Batches',
		    'attribute' => 'is_status',
		    // Uncomment to enable flash messages
		    'setFlash' => true,
		],
	    ];
    } 
    /**
     * Lists all Batches models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BatchesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Batches model.
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
     * Creates a new Batches model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Batches();

	if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
        	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        	return ActiveForm::validate($model);
       	}

        if ($model->load(Yii::$app->request->post())) {

		$model->attributes = $_POST['Batches'];
		$model->start_date = Yii::$app->dateformatter->getDateFormat($_POST['Batches']['start_date']);
		$model->end_date = Yii::$app->dateformatter->getDateFormat($_POST['Batches']['end_date']);
		$model->created_by = Yii::$app->getid->getId();
		$model->created_at= new \yii\db\Expression('NOW()');
		if($model->save())
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
     * Updates an existing Batches model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

	if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
        	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        	return ActiveForm::validate($model);
       	}
        if ($model->load(Yii::$app->request->post())) {

		$model->attributes = $_POST['Batches'];
		$model->start_date = Yii::$app->dateformatter->getDateFormat($_POST['Batches']['start_date']);
		$model->end_date = Yii::$app->dateformatter->getDateFormat($_POST['Batches']['end_date']);
		$model->updated_by = Yii::$app->getid->getId();
		$model->updated_at= new \yii\db\Expression('NOW()');
		if($model->save())
			return $this->redirect(['view', 'id' => $model->batch_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Batches model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
	$section = Section::find()->where(['section_batch_id' => $id, 'is_status' => 0])->exists();
	if($section)
	{
		$err_msg = 'Section';
	}
	else
	{
		$err_msg = '';
	}

	if(!empty($err_msg))
		throw new HttpException(400,'You can not delete this record because it is used in '.$err_msg.' table.');
	else {
		$model = Batches::findOne($id);
        	$model->is_status = 2;
		$model->update();
	}
        return $this->redirect(['index']);
    }

    /**
     * Finds the Batches model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Batches the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Batches::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
