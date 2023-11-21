<?php

use app\models\OfficeAssignment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\OfficeAssignmentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Office Assignments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="office-assignment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Office Assignment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'office_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, OfficeAssignment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'user_id' => $model->user_id, 'office_id' => $model->office_id]);
                 }
            ],
        ],
    ]); ?>


</div>
