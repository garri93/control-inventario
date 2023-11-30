<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use app\models\Category;
use app\models\Office;
use kartik\depdrop\DepDrop;
use app\models\Customer;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Device $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="device-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_device')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
/*
    $data = ArrayHelper::map(Office::find()->orderBy('name')->where(['company_id' => Yii::$app->user->identity->company_id])->all(), 'id', 'name');

    echo $form->field($model, 'category_id')->widget(Select2::classname(), [
           'data' => $data,
           'options' => ['placeholder' => 'Select a color ...', 'multiple' => false],
           'pluginOptions' => [
               'tags' => true,
               'tokenSeparators' => [',', ' '],

           ],
       ]);*/
        // Parent 
        
        $customer = ArrayHelper::map(Customer::find()->orderBy('name')->where(['company_id' => Yii::$app->user->identity->company_id])->all(), 'id', 'name');
        echo $form->field($model, 'customer_id')->dropDownList($customer, ['id' => 'id_customer', 'prompt' => 'Seleccione un cliente...']);

    // Additional input fields passed as params to the child dropdown's pluginOptions
    //$data = ArrayHelper::map(Office::find()->orderBy('name')->where(['customer_id' => ])->all(), 'id', 'name');
    // Child # 1
    echo $form->field($model, 'office_id')->widget(DepDrop::classname(), [
        'options' => ['id' => 'office_id'],
        'pluginOptions' => [
            'depends' => ['id_customer'],
            'placeholder' => 'Selecciona...',
            'initialize' => !$model->isNewRecord ,
            'url' => Url::to(['office-customer','id_customer' => $model->customer_id]),
            

        ]
    ]);




















    ?>

<?php
    $data = ArrayHelper::map(Category::find()->orderBy('name')->where(['company_id' => Yii::$app->user->identity->company_id])->all(), 'id', 'name');

    echo $form->field($model, 'category_id')->widget(Select2::classname(), [
        'data' => $data,
        'size' => Select2::LARGE,
        'options' => ['placeholder' => 'Selecciona Categoria ...',],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Categorias');
    ?>
  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
