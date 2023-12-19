<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/** @var yii\web\View $this */
/** @var app\models\Performance $model */


echo Html::a('<i class="fa fa-arrow-left"></i> Volver a '.$model->device->name, ['device/view', 'id' => $model->device_id], ['class' => 'btn btn-success']);
$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Performances', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="performance-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id, 'device_id' => $model->device_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id, 'device_id' => $model->device_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que quires borrar esta Actuacion?',
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
                'label' => 'Dispositivo',
                'value' => Html::a('<span>'.$model->device->name . '</span>', ['device/view', 'id' => $model->device->id]),
                'format' => 'html'
            ],
            [
                'attribute' => 'Fecha Creacion',
                'value' => date("d-m-Y", strtotime($model->date)),
            ],
        ],
    ]) ?>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Descripcion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="false">Realizada por</a>
        </li>
                  
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <?= $model->description?>
            </div>

            <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
            <table class="table table-striped text-center ">
                <tbody>
                <thead class="thead-dark">
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </thead>
            <?php foreach ($model->users as $user): ?>
                
                        <tr>
                        <td><?= $user->username ?></td>
                        <td><?= isset(User::$rolOptions[$user->role]) ? User::$rolOptions[$user->role] : 'Desconocido' ?></td>
                        <td>
                            <?= Html::a('Ver', ['user/view', 'id' => $user->id], ['class' => 'btn btn-success']); ?>
                            </td>
                            </tr>
            
            <?php endforeach; ?>
            </tbody>
        </table>
            </div>
                        

        </div>

