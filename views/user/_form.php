<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use app\models\User;
use app\models\Office;
/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($model, 'dni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'role')->widget(Select2::classname(), [
        'data' => User::$rolOptions,
        'options' => ['placeholder' => 'Seleccionar rol'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assignmentOffice')->widget(Select2::classname(), [
        'data' => office::toDropDown(),
        'size' => Select2::LARGE,
        'options' => ['placeholder' => 'Selecciona Office ...','prompt' => 'Seleccione una Office...','multiple' => true],
        'pluginOptions' => [
            'allowClear' => true

        ],
    ])->label('Asignar los Oficinas')
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
