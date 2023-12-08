<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Performance $model */

echo Html::a('<i class="fa fa-arrow-left"></i> Volver a '.$model->device->name, ['device/view', 'id' => $model->device_id], ['class' => 'btn btn-success']);

$this->title = 'Crear Actuacion';
//$this->params['breadcrumbs'][] = ['label' => 'Performances', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="performance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
