<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\editors\Summernote;


/** @var yii\web\View $this */
/** @var app\models\Attribute $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="attribute-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'device_id')->textInput() ?>

    <?= $form->field($model, 'description')->widget(Summernote::class, [
        'useKrajeePresets' => false,
        'class' => 'form-control kv-editor-container'
        
    ]); ?>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
