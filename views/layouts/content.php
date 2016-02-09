<?php
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
?>
<aside class="right-side">

        <?= Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		'homeLink'=>['label' => '<i class="fa fa-dashboard"></i> Home', 'encode' => false, 'url'=>Yii::$app->homeUrl],
        	
            ]
        ) ?>


    <section class="content">
        <?= $content ?>
    </section>

    <footer class="edusec-main-footer">
      <div class="container col-lg-12 col-md-12 col-xs-12 no-padding">
        <div class="pull-right hidden-xs">
          <!--b>Version</b> 3.0 -->
        </div>
        <strong>Copyright &copy; <?= date('Y') ?> <a href="http://www.rudrasoftech.com">Rudra Softech</a>.</strong> All rights reserved.
      </div>
    </footer>

</aside>


