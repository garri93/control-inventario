<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

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
        ],
    ]) ?>

</div>



<div class="col-sm-6 col-md-6 col-xl-6">
                
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Oficinas</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                    </li> -->
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="gridview-custom">
                    <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                //'showHeader'=> false, //Ocultar todo el header paginacion, label, cuadro de busqueda.
                                'filterModel' => $searchModel, //Mostrar cuadro de busqueda.
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

                    <!-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <p>hola</p> 
                    </div>

                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> -->
                </div>


?>