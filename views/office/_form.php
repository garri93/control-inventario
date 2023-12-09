<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use app\models\Customer;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;


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

    <?php
    $customer = ArrayHelper::map(Customer::find()->orderBy('name')->where(['company_id' => Yii::$app->user->identity->company_id])->all(), 'id', 'name');
    echo $form->field($model, 'customer_id')->dropDownList($customer, ['id' => 'id_customer', 'prompt' => 'Seleccione un cliente...'])->label('Cliente');
    ?>

    <?= $form->field($model, 'assignmentUsers')->widget(Select2::classname(), [
        'data' => User::getList(),
        'size' => Select2::LARGE,
        'options' => ['placeholder' => 'Selecciona Usuario ...','prompt' => 'Seleccione una Usuario...','multiple' => true],
        'pluginOptions' => [
            'allowClear' => true

        ],
    ])->label('Asignar los Usuarios')
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
