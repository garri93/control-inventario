<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\Attribute;
use app\models\Setting;
use app\models\Performance;
use app\models\Device;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\bootstrap4\Nav;
use yii\bootstrap4\Tabs;

/** @var yii\web\View $this */
/** @var app\models\Device $model */

echo Html::a('<i class="fa fa-arrow-left"></i> Ir a '.$model->office->name, ['office/view', 'id' => $model->office_id], ['class' => 'btn btn-success']);
$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Devices', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="device-view">

    <h1><?= Html::encode($this->title) ?></h1>

</div>
  
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <div class="slider"> </div>  <!-- end slider -->
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
                                    <p class="button-accion">
                        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                        <?= Html::a('Crear Atributo', ['attribute/create', 'device_id' => $model->id, 'office_id' => $model->office_id], ['class' => 'btn btn-success']) ?>
                    </p>
                            
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [

                            'name',
                            [
                                'attribute'=>'Dispositivo Padre',
                                'value' => Html::a('<span>'.$model->deviceparent .'</span>', ['device/view', 'id' => $model->parent_device]),
                                'format' => 'html',
                              
                            ],
                            [
                                'attribute'=>'Oficina',
                                'value' => Html::a('<span>'.$model->office->name .'</span>', ['office/view', 'id' => $model->office_id]),
                                'format' => 'html',
                              
                            ],
                            [
                                'attribute'=>'Categoria',
                                'value' => $model->category->name,
                            ],
                            // [
                            //     'label' => 'Atributos',
                            //     'value' => ,
                            //     'format' => 'html'
                            // ]
                        ],
                    ]) ?>
                    <div class=" text-justify text-center ">
                        <h3>Atributos</h3>
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
                                    [
                                        'attribute'=>'description',
                                        'format' => 'raw',
                                    ],
                                    [
                                        'class' => ActionColumn::className(),
                                        'template' => '{update} {delete} ',
                                        'urlCreator' => function ($action, Attribute $model, $key, $index, $column) {
                                            return Url::toRoute(['/attribute/'.$action, 'id' => $model->id, 'device_id' => $model->device_id, 'office_id' => $model->office_id]);
                                         }
                                    ],
                                        
                                ],
                        ]); ?>
                    </div>
                    </div>

                    <div class="tab-pane fade show " id="setting" role="tabpanel" aria-labelledby="setting-tab">
                    <div class="gridview-custom text-justify text-center ">
                        <p class="button-accion text-left"><?= Html::a('Crear Configuracion', ['setting/create', 'device_id' => $model->id, 'office_id' => $model->office_id], ['class' => 'btn btn-success']) ?></p>
                    <?= GridView::widget([
                                'dataProvider' => $dataProviderSetting,
                                //'showHeader'=> false, //Ocultar todo el header paginacion, label, cuadro de busqueda.
                                //'filterModel' => $searchModelSetting, //Mostrar cuadro de busqueda.
                                'summary' => '', //Ocultar texto paginacion superior
                                'rowOptions' => function ($model, $key, $index, $grid) {
                                    return ['class' => 'device-setting'];
                                },
                                'columns' => [
                                    [
                                        'enableSorting' => false, // Desactivar la clasificacion ascendente y descendente
                                        'label' => 'Nombre', //Ocultar fila de label
                                        'attribute' => 'name',   
                                        
                                    ],  
                                    [
                                        'enableSorting' => false, // Desactivar la clasificacion ascendente y descendente
                                        'label'=>'Ultima Modificacion',
                                        'attribute' => 'edition_date',
                                        'value' => function ($model) {
                                            return date("d-m-Y", strtotime($model->edition_date));
                                        },
                                    ],
                                    [
                                        'header' => 'Acciones', // Agrega el encabezado personalizado aquí
                                        'class' => ActionColumn::className(),
                                        'template' => '{view} {update} {delete} ',
                                        'urlCreator' => function ($action, Setting $model, $key, $index, $column) {
                                            return Url::toRoute(['/setting/'.$action, 'id' => $model->id, 'device_id' => $model->device_id, 'office_id' => $model->office_id]);
                                         }
                                    ],              
                                ],
                        ]); ?>
                    </div>
                        

                    </div>

                    <div class="tab-pane fade show" id="deviceson" role="tabpanel" aria-labelledby="deviceson-tab">
                    <div class="gridview-custom">

                    <p class="button-accion text-left"><?= Html::a('Crear Periferico', ['device/create', 'parent_device' => $model->id, 'office_id' => $model->office_id, 'customer_id' => $model->office->customer_id], ['class' => 'btn btn-success']) ?></p>
                    <?= GridView::widget([
                            'dataProvider' => $dataProviderDevice,
                            //'filterModel' => $searchModelDevice,
                            'summary' => '', //Ocultar texto paginacion superior
                            'rowOptions' => function ($model, $key, $index, $grid) {
                                return ['class' => 'device-parent'];
                            },
                            'columns' => [
                                [
                                    'label' => 'Nombre',
                                    'enableSorting' => false, // Desactivar la clasificacion ascendente y descendente
                                    'attribute' => 'name',
                          
                                ],
                                [
                                    'label' => 'Categoria',
                                    'enableSorting' => false, // Desactivar la clasificacion ascendente y descendente
                                    'attribute' => 'category_id',
                                    'value' => 'category.name',
                                ],
                                [
                                    'class' => ActionColumn::className(),
                                    'header' => 'Acciones',
                                    'urlCreator' => function ($action, Device $model, $key, $index, $column) {
                                        return Url::toRoute([$action, 'id' => $model->id]);
                                    }
                                ],
                            ],
                        ]); ?>
                        
                    </div>
                    </div>
                    <div class="tab-pane fade show" id="performance" role="tabpanel" aria-labelledby="performance-tab">
                    <p class="button-accion">
                        <?= Html::a('Crear Actuacion', ['performance/create','device_id' => $model->id, 'office_id'=> $model->office_id], ['class' => 'btn btn-success']) ?>
                    </p>

                    <div class="gridview-custom">
                    <?= GridView::widget([
                        'dataProvider' => $dataProviderPerformance,
                        //'filterModel' => $searchModelPerformance,
                        //'showHeader'=> false, //Ocultar todo el header paginacion, label, cuadro de busqueda.
                        'summary' => '', //Ocultar texto paginacion superior
                        'rowOptions' => function ($model, $key, $index, $grid) {
                            return ['class' => 'device-performance'];
                        },
                        'columns' => [
                            [
                                'attribute' => 'name',
                                'label' => 'Nombre',
                                'enableSorting' => false, // Desactivar la clasificacion ascendente y descendente
                            ],
                            [
                                'label' => 'Fecha Realizacion',
                                'attribute' => 'date',
                                'enableSorting' => false, // Desactivar la clasificacion ascendente y descendente
                                'value' => function ($model) {
                                    return date("d-m-Y", strtotime($model->date));
                                },
                            ],
                            [
                                'header' => 'Acciones',
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, Performance $model, $key, $index, $column) {
                                    return Url::toRoute(['performance/'.$action, 'id' => $model->id, 'office_id' => $model->device->office_id]);
                                }
                            ],
                        ],
                    ]); ?>

                    
                    </div>
                    </div>
                    </div>

                   
