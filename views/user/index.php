<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Usuarios';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Usuario', ['create'], ['class' => 'btn btn-success']) ?>
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
            return ['class' => 'user_grid'];
        },
        'columns' => [

            'username',
            'surname',
            'email:email',
            'dni',
            'phone',
            //'company_id',
            [
                'attribute' => 'role',
                'value' => function ($data) {
                    return isset(User::$rolOptions[$data->role]) ? User::$rolOptions[$data->role] : 'Desconocido';
                },
            ],

            //'password',
            //'auth_key', 
           //'accessToken', 
           
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    </div>
</div>
