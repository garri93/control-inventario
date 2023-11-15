<?php

use app\models\User;
use app\models\Company;
use app\models\Customer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\officeSearch;
use app\models\office;


?>


<div><h1>Area de Representantes</h1></div>

<section>
    <div class="container">
     <div>  
        <div class="row">
            
            <div class="col-sm-6 col-md-6 col-xl-6">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        'name',
                        
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
    </div>
</section>


