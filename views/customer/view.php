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
        <?php if(Yii::$app->user->identity->isUserAdmin()):?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?><?php endif; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'internal_code',
            'name',
            'cif',
            
            

            
        ],
    ]) ?>
    </div>

    <div class="col-sm-6 col-md-6 col-xl-6">

    <h1>Oficinas</h1>

    <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    //'showHeader'=> false,
                    'columns' => [
                        [
                            'attribute' => 'name',   
                            'format' => 'raw',
                            'value'=> function ($model) {
                                         //return Url::to([$dataProvider['name'],'/office/view', 'id' => $dataProvider['id']]);
                                         //return Html::a(Html::encode($dataProvider['name']),'/office/view','id' => $dataProvider['id']);
                                         return Html::a($model->name, ['office/view', 'id' => $model->id]);
                                     },
                            ],

                        
                    ],
                ]); ?>
    </div>
    </div>
</div>

</section>