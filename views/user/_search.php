<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use app\models\User;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'dni') ?>

    <?= $form->field($model, 'phone') ?>

    <?php echo $form->field($model, 'email') ?> 


    <?= $form->field($model, 'role')->widget(Select2::classname(), [
        'data' => User::$rolOptions,
        'options' => ['placeholder' => 'Seleccionar rol'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
