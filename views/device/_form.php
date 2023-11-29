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

/** @var yii\web\View $this */
/** @var app\models\Device $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="device-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_device')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'office_id')->textInput() ?>
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
    echo $form->field($model, 'customer')->dropDownList($customer, ['id' => 'id_customer']);
    
    // Additional input fields passed as params to the child dropdown's pluginOptions
    echo Html::hiddenInput('input-type-1', 'Additional value 1', ['id' => 'input-type-1']);
    echo Html::hiddenInput('input-type-2', 'Additional value 2', ['id' => 'input-type-2']);
    
    // Child # 1
    echo $form->field($model, 'subcat1')->widget(DepDrop::classname(), [
        'type' => DepDrop::TYPE_SELECT2,
        'data' => [2 => 'Tablets'],
        'options' => ['id' => 'subcat1-id', 'placeholder' => 'Select ...'],
        'select2Options' => ['pluginOptions' => ['allowClear' => true]],
        'pluginOptions' => [
            'depends' => ['cat1-id'],
            'url' => Url::to(['/site/subcat1']),
            'params' => ['input-type-1', 'input-type-2']
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
