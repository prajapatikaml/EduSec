<?php
use yii\widgets\Breadcrumbs;
//use dmstr\widgets\Alert;
?>
<aside class="right-side">
    <section class="content-header pull-left">
        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
    </section>

    <section class="content">
        <?php // Alert::widget() ?>
        <?= $content ?>
    </section>

  <div class="col-lg-12 col-md-12 col-sm-12">
    <footer class="footer">
        <div class="container col-lg-12 col-md-12 col-sm-12 no-padding">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
  </div>

</aside>
