<?php

namespace app\components;
use yii\base\BootstrapInterface;
use Yii;

class LanguageSelector implements BootstrapInterface
{
    public $supportedLanguages = [];

    public function bootstrap($app)
    {
        $preferredLanguage = isset(Yii::$app->request->cookies['language']) ? (string)Yii::$app->request->cookies['language'] : null;
		
        // or in case of database:
        // $preferredLanguage = $app->user->language;

        if (empty($preferredLanguage)) {
            $preferredLanguage = Yii::$app->request->getPreferredLanguage($this->supportedLanguages);
        }

        \Yii::$app->language = $preferredLanguage;
    }
}

?>
