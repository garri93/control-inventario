<?php

use app\models\User;
use app\models\Company;
use app\models\Customer;
use app\models\UserSearch;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


?>


<div><h1>Area de Tecnico</h1></div>


<section>
    <div class="container">
     <div>  
        <div class="row">
            
            <div class="col-sm-6 col-md-6 col-xl-6">
            <h2>Clientes</h2>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        'name',
                        [
                           

                        ],
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Customer $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],
                    ],
                ]); ?>

            </div>
      
            <div class="col-sm-6 col-md-6 col-xl-6">
                <h2>Acciones</h2>
                <p><i><?= Html::a("Crear Cliente", '/customer/create'); ?></i></p>
                <p><i><?= Html::a("Crear oficina", '/office/create'); ?></i></p>
                <p><i><?= Html::a("Crear dispositivo", '/user/index'); ?></i></p>
                <p><i><?= Html::a("Añadir Actuacion", '/user/index'); ?></i></p>
                <p><i><?= Html::a("Añadir Configuracion", '/user/index'); ?></i></p>
                
            </div>
        
        </div>
        </div> 
    </div>
</section>


