<?php

use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Categories';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Categoria', ['create'], ['class' => 'btn btn-success']) ?>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Mostrar Filtros</button>

    </p>

    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>   
    </div>


    <div class="text-center-justify">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'summary' => '', //Ocultar texto paginacion superior
        'columns' => [
            'name',
            [
                'contentOptions' => ['class' => 'text-center text-justify'],
                'header' => 'Acciones',
                'class' => ActionColumn::className(),
                
                'template' => '{update} {delete} ',
                'urlCreator' => function ($action, Category $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id, 'company_id' => $model->company_id]);
                 }
            ],
        ],
    ]); ?>
    </div>



</div>
