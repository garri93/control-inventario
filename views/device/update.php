<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Device $model */

echo Html::a('<i class="fa fa-arrow-left"></i> Volver', ['device/view', 'id' => $model->id], ['class' => 'btn btn-success']);
$this->title = 'Editar Dispositivo: ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Devices', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="device-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
