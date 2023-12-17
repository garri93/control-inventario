<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\editors\Summernote;
use yii\helpers\ArrayHelper;
use app\models\Device;
use app\models\User;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Performance $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="performance-form">
    

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    
    <?= $form->field($model, 'UserPerformance')->widget(Select2::classname(), [
        'data' => User::getList(),
        'size' => Select2::LARGE,
        'options' => ['placeholder' => 'Selecciona Usuario ...','prompt' => 'Seleccione una Usuario...','multiple' => true],
        'pluginOptions' => [
            'allowClear' => true

        ],
    ])->label('Realizada por')
    ?>

    <?php
   
    $data = ArrayHelper::map(Device::find()->orderBy('name')->where(['office_id' => $model->office_id])->all(), 'id', 'name');

    echo $form->field($model, 'device_id')->widget(Select2::classname(), [
        'data' => $data,
        'size' => Select2::LARGE,
        'disabled' => true,
        
        'options' => ['placeholder' => 'Selecciona dispositivo ...','prompt' => 'Seleccione una dispositivo...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Dispositivo');
    ?>

    <?= $form->field($model, 'description')->widget(Summernote::class, [
        'useKrajeePresets' => false,
        'class' => 'form-control kv-editor-container'
        
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

