<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Setting $model */

echo Html::a('<i class="fa fa-arrow-left"></i> Volver a '.$model->device->name, ['device/view', 'id' => $model->device_id], ['class' => 'btn btn-success']);
$this->title = 'Editar Configuracion: ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="setting-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
