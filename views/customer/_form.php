<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;

use kartik\editors\Summernote;


/** @var yii\web\View $this */
/** @var app\models\Customer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'internal_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cif')->textInput(['maxlength' => true]) ?>

    

    <?= $form->field($model, 'phone')->textInput() ?> 
 
    <?= $form->field($model, 'notes')->widget(Summernote::class, [
        'useKrajeePresets' => false,
        'class' => 'form-control kv-editor-container'
        
    ]); ?>
   


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
