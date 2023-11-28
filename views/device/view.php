<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\Attribute;
use yii\helpers\Url;
use yii\grid\ActionColumn;

/** @var yii\web\View $this */
/** @var app\models\Device $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Devices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="device-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['Actualizar', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['Borrar', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'parent_device',
            'name',
            'office_id',
            'category_id',
            // [
            //     'label' => 'Atributos',
            //     'value' => ,
            //     'format' => 'html'
            // ]
        ],
    ]) ?>

</div>



<div class="col-sm-6 col-md-6 col-xl-12">
                
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="attributes-tab" data-toggle="tab" href="#attributes" role="tab" aria-controls="attributes" aria-selected="true">Atributos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="setting-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="false">Configuraciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="deviceson-tab" data-toggle="tab" href="#deviceson" role="tab" aria-controls="deviceson" aria-selected="false">Perifericos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="performance-tab" data-toggle="tab" href="#performance" role="tab" aria-controls="performance" aria-selected="false">Actuaciones</a>
                    </li> 
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="attributes" role="tabpanel" aria-labelledby="attributes-tab">
                    <div class="gridview-custom text-justify text-center ">
                    <?= GridView::widget([
                                'dataProvider' => $dataProviderAttribute,
                                'showHeader'=> false, //Ocultar todo el header paginacion, label, cuadro de busqueda.
                                'filterModel' => $searchModelAttribute, //Mostrar cuadro de busqueda.
                                'summary' => '', //Ocultar texto paginacion superior
                                
                                'columns' => [
                                    /*[
                                        'enableSorting' => false, // Desactivar la clasificacion ascendente y descendente
                                        'label' => 'Seleccionar Oficina', //Ocultar fila de label
                                        'attribute' => 'name',   
                                        'format' => 'raw',
                                        'value'=> function ($model) {
                                                                return Html::a('<span">'.$model->name . ': '.$model->description.'</span>' . Html::tag('i', '', ['class' => 'fa fa-arrow-right']), ['setting/view', 'id' => $model->id]);
                                                    },
                                    ],*/     
                                  
                                    'name',
                                    'description',
                                    [
                                        'class' => ActionColumn::className(),
                                        'urlCreator' => function ($action, Attribute $model, $key, $index, $column) {
                                            return Url::toRoute(['/attribute/'.$action, 'id' => $model->id, 'device_id' => $model->device_id]);
                                         }
                                    ],
                                        
                                ],
                        ]); ?>
                    </div>
                    </div>

                    <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
                    <div class="gridview-custom">
                    <?= GridView::widget([
                                'dataProvider' => $dataProviderSetting,
                                //'showHeader'=> false, //Ocultar todo el header paginacion, label, cuadro de busqueda.
                                'filterModel' => $searchModelSetting, //Mostrar cuadro de busqueda.
                                'summary' => '', //Ocultar texto paginacion superior
                                
                                'columns' => [
                                    [
                                        'enableSorting' => false, // Desactivar la clasificacion ascendente y descendente
                                        'label' => 'Seleccionar Oficina', //Ocultar fila de label
                                        'attribute' => 'name',   
                                        'format' => 'raw',
                                        'value'=> function ($model) {
                                                                return Html::a('<span>'.$model->name . '</span>' . Html::tag('i', '', ['class' => 'fa fa-arrow-right']), ['setting/view', 'id' => $model->id]);
                                                    },
                                    ],                
                                ],
                        ]); ?>
                    </div>
                        

                    </div>

                    <div class="tab-pane fade" id="deviceson" role="tabpanel" aria-labelledby="deviceson-tab">
                    <div class="gridview-custom">
                    <?php
                         

                            foreach ($model->parent as $parent): ?>
                                <p><?= $parent->name ?></p>
                                <p>
                                <?= 
                                Html::a('Delete', ['deleteassignment', 'user_id' => $parent->id, 'office_id' => $model->id], [
                                        'class' => 'btn btn-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                                </p>
                            <?php endforeach; ?>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="performance" role="tabpanel" aria-labelledby="performance-tab">
                    <div class="gridview-custom">
                    <?= GridView::widget([
                                'dataProvider' => $dataProviderPerformance,
                                //'showHeader'=> false, //Ocultar todo el header paginacion, label, cuadro de busqueda.
                                'filterModel' => $searchModelPerformance, //Mostrar cuadro de busqueda.
                                'summary' => '', //Ocultar texto paginacion superior
                                
                                'columns' => [
                                    [
                                        'enableSorting' => false, // Desactivar la clasificacion ascendente y descendente
                                        'label' => 'Seleccionar Oficina', //Ocultar fila de label
                                        'attribute' => 'name',   
                                        'format' => 'raw',
                                        'value'=> function ($model) {
                                                                return Html::a('<span>'.$model->description . '</span>' . Html::tag('i', '', ['class' => 'fa fa-arrow-right']), ['performance/view', 'id' => $model->id]);
                                                    },
                                    ],                
                                ],
                        ]); ?>
                    </div>
                    </div>
                    </div>
                </div>
