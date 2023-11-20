<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;


/** @var yii\web\View $this */
/** @var app\models\Office $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="office-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>
    
    <?= $form->field($model, 'assignmentUsers')->dropDownList(User::getList(), ['multiple' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
