<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Setting $model */

echo Html::a('<i class="fa fa-arrow-left"></i> Volver a '.$model->device->name, ['device/view', 'id' => $model->device_id], ['class' => 'btn btn-success']);
$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="setting-view">

    <h1>Configuracion: <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id, 'office_id' => $model->device->office_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id, 'device_id' => $model->device_id ], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que deseas Borrar la configuracion: '.Html::encode($this->title).' ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            [
                'attribute' => 'Fecha Creacion',
                'value' => date("d-m-Y", strtotime($model->creation_date)),
            ],
            [
                'attribute' => 'Fecha Edicion',
                'value' => date("d-m-Y", strtotime($model->edition_date)),
            ],
            [
                'attribute' => 'Dispositivo',
                'value' => $model->device->name,
            ],

        ],
    ]) ?>

    <?= $model->description?>

</div>
