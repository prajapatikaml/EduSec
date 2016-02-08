<?php

/**
 * CToggleColumn class file.
 *
 * @author DonnaInsolita
 * @copyright Copyright &copy; 2012 DonnaInsolita
 * @license http://www.yiiframework.com/license/
 */
class QtoggleAction extends CAction {
	 
    public function run($id,$attribute,$que) {
		
        if(Yii::app()->request->isPostRequest)
        {
            // we only allow deletion via POST request
            $model = $this->controller->loadModel($id);
            $range=Yii::app()->cache->get($que);
            if(empty($range)){
                throw new CHttpException(400,'Invalid queuetoggle identificator!!! Check JtoggleColumn settings queueid.');
            }

            $range=explode(',',$range);
            if(!isset($_POST['val']))
            {
                $curr=array_search($model->$attribute,$range);
                $next=(isset($range[$curr+1]))?$range[$curr+1]:$range[0];
                $model->$attribute = $next;
            }else{
                $val=$_POST['val'];
                if(!in_array($_POST['val'],$range)){
                    throw new CHttpException(400,'Invalid post data');
                }
                $model->$attribute = $val;
                if(!$model->validate()){
                    throw new CHttpException(400,CHtml::errorSummary($model));
                }

            }
            $model->save(false);
            
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
        throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }
 
}

?>
