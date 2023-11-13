<?php

use app\models\User;
use app\models\Company;
use app\models\UserSearch;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


?>

<div><h1>Area de Administration</h1></div>


<?php
$model = Company::findOne(Yii::$app->user->identity->company_id);
$searchModel = new UserSearch();
$searchModel->company_id = Yii::$app->user->identity->company_id;
$dataProvider = $searchModel->search($this->request->queryParams);
GridView::widget([
    
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
]);





?>