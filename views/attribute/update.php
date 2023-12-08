<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Attribute $model */

echo Html::a('<i class="fa fa-arrow-left"></i> Volver a '.$model->device->name, ['device/view', 'id' => $model->device_id], ['class' => 'btn btn-success']);
$this->title = 'Editar atributo: ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Attributes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id, 'device_id' => $model->device_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attribute-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
