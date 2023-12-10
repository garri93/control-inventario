<?php

use app\models\Customer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CustomerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clientes';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Cliente', ['create'], ['class' => 'btn btn-success']) ?>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Mostrar Filtros</button>
    </p>

    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>   
    </div>
    <div class='gridview-custom'>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'summary' => '', //Ocultar texto paginacion superior
        'rowOptions' => function ($model, $key, $index, $grid) {
            return ['class' => 'customer_grid'];
        },
        'columns' => [
            'internal_code',
            'name',
            'cif',
            //'company_id',
            'phone', 
           //'notes:ntext', 
            [
                'class' => ActionColumn::className(),
                'header' => 'Acciones',
                'urlCreator' => function ($action, Customer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
    </div>

</div>
