<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use app\models\User;
use app\models\Company;
use app\models\Customer;
use app\models\officeSearch;
use app\models\office;

/** @var yii\web\View $this */
/** @var app\models\Customer $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<section>
<div class="customer-view">
<div class="row">
    <div class="col-sm-6 col-md-6 col-xl-6">

    

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'name',
            'cif',
            'phone',
            
        ],
    ]) ?>
    </div>

    <div class="col-sm-6 col-md-6 col-xl-6">

    <h1>Oficinas</h1>

    <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        'name',
                        'customer_id',

                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Office $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],
                    ],
                ]); ?>
    </div>
    </div>
</div>

</section>