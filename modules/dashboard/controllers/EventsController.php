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
 * EventsController implements the CRUD actions for Events model.
 *
 * @package EduSec.modules.dashboard.controllers
 */

namespace app\modules\dashboard\controllers;

use Yii;
use app\modules\dashboard\models\Events;
use app\modules\dashboard\models\EventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class EventsController extends Controller
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
     * Lists all Events models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Events model.
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
     * Creates a new Events model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAddEvent()
    {
        $model = new Events();

        if ($model->load(Yii::$app->request->post()) || isset($_POST['Events'])) {

		$eventList = Events::find()->where(['LIKE', 'event_start_date', Yii::$app->dateformatter->getDateFormat($_POST['Events']['event_start_date'])])->andwhere(['is_status'=> 0])->count();

		if($eventList > 6) {
			Yii::$app->session->setFlash('maxEvent', "<b><i class='fa fa-warning'></i> Maximum Events Limit Reached, you can not add more event for this day</b>");
			return $this->redirect(['index']);
		}
		$model->attributes = $_POST['Events'];
		$model->event_start_date = Yii::$app->dateformatter->storeDateTimeFormat($_POST['Events']['event_start_date']);
		$model->event_end_date = Yii::$app->dateformatter->storeDateTimeFormat($_POST['Events']['event_end_date']);
		$model->created_by = Yii::$app->getid->getId();
		$model->created_at = new \yii\db\Expression('NOW()');

		if($model->save()) {
		    if(isset($_GET['return_dashboard']))
	            	return $this->redirect(['/dashboard']);
		    else 
			return $this->redirect(['index']);
		}
		else {
                    return $this->renderAjax('_form', ['model' => $model,]);
        	}
        } else {
            return $this->renderAjax('_form', [
                'model' => $model,
            ]);
        }
    }

    public function actionViewEvents($start=NULL,$end=NULL,$_=NULL) {

	    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

	    $eventList = Events::find()->where(['is_status'=> 0])->all();

	    $events = [];

	    foreach ($eventList as $event) {
	      $Event = new \yii2fullcalendar\models\Event();
	      $Event->id = $event->event_id;
	      $Event->title = $event->event_title;
	      $Event->description = $event->event_detail;
	      $Event->start = $event->event_start_date;
	      $Event->end = $event->event_end_date;
	      $Event->color = (($event->event_type == 1) ? '#00A65A' : (($event->event_type == 2) ? '#00C0EF' : (($event->event_type == 3) ? '#F39C12' : '#074979')));
	      $Event->textColor = '#FFF';
	      $Event->borderColor = '#000';
	      $Event->event_type = (($event->event_type == 1) ? 'Holiday' : (($event->event_type == 2) ? 'Important Notice' : (($event->event_type == 3) ? 'Meeting' : 'Messages')));
	      $Event->allDay = ($event->event_all_day == 1) ? true : false;
	     // $Event->url = $event->event_url;
	      $events[] = $Event;
	    }
	    return $events;
    }
    /**
     * Updates an existing Events model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateEvent($event_id)
    {
        $model = $this->findModel($event_id);

        if ($model->load(Yii::$app->request->post()) || isset($_POST['Events'])) {

		$model->attributes = $_POST['Events'];
		$model->event_start_date = Yii::$app->dateformatter->storeDateTimeFormat($_POST['Events']['event_start_date']);
		$model->event_end_date = Yii::$app->dateformatter->storeDateTimeFormat($_POST['Events']['event_end_date']);
		$model->updated_by = Yii::$app->getid->getId();
		$model->updated_at = new \yii\db\Expression('NOW()');

		if($model->save()) {
	            if(isset($_GET['return_dashboard']))
	            	return $this->redirect(['/dashboard']);
		    else 
			return $this->redirect(['index']);
		}
		else {
                    return $this->renderAjax('_form', ['model' => $model,]);
        	}
        } else {
            return $this->renderAjax('_form', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Events model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionEventDelete($e_id)
    {
        $model = Events::findOne($e_id);
	$model->is_status = 2;
	$model->updated_by = Yii::$app->getid->getId();
	$model->updated_at = new \yii\db\Expression('NOW()');
	$model->save();

        if(isset($_GET['return_dashboard']))
		return $this->redirect(['/dashboard']);
	else 
		return $this->redirect(['index']);
    }

    /**
     * Finds the Events model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Events the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Events::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
