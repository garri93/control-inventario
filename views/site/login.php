<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

//$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
   
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-12 form-control'],
            'errorOptions' => ['class' => 'col-lg-12 invalid-feedback'],
        ],
    ]); ?>
            <!-- Header -->
    <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1> Iniciar sesion</h1>
                   <!-- <p>You don't have a password? Then please <a class="white" href="sign-up.html">Sign Up</a></p>  -->
                    <!-- Sign Up Form -->
                    <div class="form-container">
                        <form id="logInForm" data-toggle="validator" data-focus="false">
                            <div class="form-group">
                            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                            </div>
                            <div class="form-group">
                            <?= $form->field($model, 'password')->passwordInput() ?>
            
                            </div>
                            <div class="form-group">
                            <?= $form->field($model, 'rememberMe')->checkbox(['template' => "<div class=\"offset-lg-1 col-lg-6 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>"])?>
                            </div>

                            <div class="form-group">
                                <?= Html::submitButton('Iniciar Sesion', ['class' => 'form-control-submit-button', 'name' => 'login-button']) ?>
                               
                            </div>
                            <div class= "text-center">
                            <?= "¿No tienes Cuenta?  " . Html::a('Registrate', ['/site/signup'])?>
                            </div>
                            <div class="form-message">
                                <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                            </div>
                        </form>
                    </div> <!-- end of form container -->
                    <!-- end of sign up form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->





















    <?php ActiveForm::end(); ?>

    
</div>
