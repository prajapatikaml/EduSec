<?php

class DefaultController extends Controller
{

  
    	
    public function actionIndex()
    {
        $notifiche = GlobalNotification::getAllNotifications();
        $number = 0;
        foreach ($notifiche as $notifica) {
            if($notifica->isNotReaded()) {
                $number = $number + 1;
                Yii::app()->user->setFlash('success' . ($number), $notifica->content);
            }
        }

        $this->render('index', array(
            'notifiche' => $notifiche,
        ));
    }

    public function actionAddEndOfWorld()
    {
        $notifyii = new Notifyii();
        $notifyii->message('The end of the world');
        $notifyii->expire(new DateTime("21-12-2012"));
        $notifyii->from("-1 week");
        $notifyii->to("+1 day");
        $notifyii->role("admin");
        $notifyii->link($this->createUrl('/site/index'));
        $notifyii->save();

        $url = $this->createUrl('index');
        $this->redirect($url);
    }

}
