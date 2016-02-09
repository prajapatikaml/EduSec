<?php
use \app\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

//dmstr\web\AdminLteAsset::register($this);
\app\assets\AppAsset::register($this);
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@bower') . '/admin-lte';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="bg-black">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login-page">

<style>
	.login-page, .register-page {
	    background: none repeat scroll 0 0 #d2d6de;
	}
	.login-box, .register-box {
	    margin: 7% auto;
	    width: 360px;
	}
	.login-logo, .register-logo {
	    font-size: 35px;
	    font-weight: 300;
	    margin-bottom: 25px;
	    text-align: center;
	}
	.login-logo a, .register-logo a {
	    color: #444;
	}
	.login-box-body, .register-box-body {
	    background: none repeat scroll 0 0 #fff;
	    border-top: 0 none;
	    color: #666;
	    padding: 20px;
	}
	.login-box-msg, .register-box-msg {
	    margin: 0;
	    padding: 0 20px 20px;
	    text-align: center;
	}
	.form-control:not(select) {
	    -moz-appearance: none;
	}
	.form-control {
	    border-color: #d2d6de;
	    border-radius: 0 !important;
	    box-shadow: none;
	}
	.login-box-body .form-control-feedback, .register-box-body .form-control-feedback {
	    color: #777;
	}
	.icheckbox_square-blue {
	    background-position: 0 0;
	}
	.icheckbox_square-blue, .iradio_square-blue {
	    border: medium none;
	    cursor: pointer;
	    display: inline-block;
	    height: 22px;
	    margin: 0;
	    padding: 0;
	    vertical-align: middle;
	    width: 22px;
	}
	.btn.btn-flat {
	    border-radius: 0;
	    border-width: 1px;
	    box-shadow: none;
	}
	.btn-primary {
	    background-color: #3c8dbc;
	    border-color: #367fa9;
	}
    </style>

<?php $this->beginBody() ?>

   <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="../../index2.html" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div><!-- /.social-auth-links -->

        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
