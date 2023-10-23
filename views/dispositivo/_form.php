<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Dispositivo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="dispositivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dispositivo_padre')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_dispositivo_id')->textInput() ?>

    <?= $form->field($model, 'oficina_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
