<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Device $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="device-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_device')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'device_name_id')->textInput() ?>

    <?= $form->field($model, 'office_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
