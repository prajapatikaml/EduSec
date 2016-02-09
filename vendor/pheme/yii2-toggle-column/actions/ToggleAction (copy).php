<?php
/**
 * @link http://phe.me
 * @copyright Copyright (c) 2014 Pheme
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace pheme\grid\actions;

use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\web\MethodNotAllowedHttpException;

/**
 * @author Aris Karageorgos <aris@phe.me>
 */
class ToggleAction extends Action
{
    /**
     * @var string name of the model
     */
    public $modelClass;

    /**
     * @var string model attribute
     */
    public $attribute = 'active';

    /**
     * @var string|array additional condition for loading the model
     */
    public $andWhere;

    /**
     * @var string|int|boolean what to set active models to
     */
    public $onValue = 1;

    /**
     * @var string|int|boolean what to set inactive models to
     */
    public $offValue = 0;

    /**
     * @var bool whether to set flash messages or not
     */
    public $setFlash = false;

    /**
     * @var string flash message on success
     */
    public $flashSuccess = "Model saved";

    /**
     * @var string flash message on error
     */
    public $flashError = "Error saving Model";

    /**
     * @var string|array URL to redirect to
     */
    public $redirect;

    public $type = NULL;
    /**
     * Run the action
     * @param $id integer id of model to be loaded
     *
     * @throws \yii\web\MethodNotAllowedHttpException
     * @throws \yii\base\InvalidConfigException
     * @return mixed
     */
    public function run($id)
    {
        if (!Yii::$app->request->getIsPost()) {
            throw new MethodNotAllowedHttpException();
        }
        $id = (int)$id;
        $result = null;

        if (empty($this->modelClass) || !class_exists($this->modelClass)) { 
            throw new InvalidConfigException("Model class doesn't exist");
        }
        /* @var $modelClass \yii\db\ActiveRecord */
        $modelClass = $this->modelClass;
        $attribute = $this->attribute;

	/* @Edited By AmitG */
	if($modelClass == 'app\modules\dashboard\models\Notice')
		$model = $modelClass::find()->where(['notice_id' => $id]);

	if($modelClass == 'app\modules\dashboard\models\MsgOfDay')
        	$model = $modelClass::find()->where(['msg_of_day_id' => $id]);

	if($modelClass == 'app\modules\fees\models\FeesCollectCategory')
        	$model = $modelClass::find()->where(['fees_collect_category_id' => $id]);

	if($modelClass == 'app\modules\course\models\Courses')
        	$model = $modelClass::find()->where(['course_id' => $id]);

        if (!empty($this->andWhere)) {
            $model->andWhere($this->andWhere);
        }

        $model = $model->one();

        if (!$model->hasAttribute($this->attribute)) {
            throw new InvalidConfigException("Attribute doesn't exist");
        }

        if ($model->$attribute == $this->onValue) {
            $model->$attribute = $this->offValue;
        } else {
            $model->$attribute = $this->onValue;
        }

	/* @Edited By AmitG */
	if($this->type === 'toggle-status') {
		$model->updateAll([$attribute => 0], 'is_status = 1');
	}
	
        if ($model->save()) {
            if ($this->setFlash) {
                Yii::$app->session->setFlash('success', $this->flashSuccess);
            }
        } else {
            if ($this->setFlash) {
                Yii::$app->session->setFlash('error', $this->flashError);
            }
        }
        if (Yii::$app->request->getIsAjax()) {
            Yii::$app->end();
        }
        /* @var $controller \yii\web\Controller */
        $controller = $this->controller;
        if (!empty($this->redirect)) {
            return $controller->redirect($this->redirect);
        }
        return $controller->redirect(Yii::$app->request->getReferrer());
    }
}
