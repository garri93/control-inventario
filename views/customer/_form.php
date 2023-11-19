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

    <?= $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput() ?> 
 
    <?= $form->field($model, 'notes')->widget(Summernote::class, [
    'useKrajeePresets' => true,
    'class' => 'block kv-editor-container'
    // other widget settings
]); ?>
   


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
