<?php

use app\models\User;
use app\models\Company;
use app\models\UserSearch;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


?>


<div><h1>Area de Tecnico</h1></div>

<section>

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'surname',
            'email:email',
            'dni',
            'phone',
            //'company_id',
            'role',
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


</section>

<section>

</section>