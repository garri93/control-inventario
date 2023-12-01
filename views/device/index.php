<?php

use app\models\Device;
use app\models\Office;
use kartik\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\select2\Select2;
use app\models\OfficeQuery;
use yii\helpers\ArrayHelper;


/** @var yii\web\View $this */
/** @var app\models\DeviceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Devices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Device', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent_device',
            'name',
            
            [
                'label' => 'Categoria',
                
                'attribute' => 'category_id',
                'value' => 'category.name',
            ],
            //'office_id',
            [
                'label' => 'Oficina',
                'filter' => Select2::widget( [
                    'data' => Office::toDropDown(),
                    
                    'model' => $searchModel,
                    'attribute' => 'office_id',
                    'options' => ['placeholder' => 'Selecciona Categoria ...','prompt' => 'Seleccione un cliente...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
                'attribute' => 'office_id',
                'value' => 'office.name',
            ],
            //'category_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Device $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
