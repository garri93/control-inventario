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
?>


<section>
    <div class="customer-view">
        <div class="row">
        <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="row ">
            <div class="col-sm-6 col-md-6 col-xl-6 border-right">

                
                
                <p>
                    <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?php if(Yii::$app->user->identity->isUserAdmin()):?>
                    <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
                        
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
                
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Oficinas</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                    </li> -->
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="gridview-custom">
                    <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                //'showHeader'=> false, //Ocultar todo el header paginacion, label, cuadro de busqueda.
                                'filterModel' => $searchModel, //Mostrar cuadro de busqueda.
                                'summary' => '', //Ocultar texto paginacion superior
                                
                                'columns' => [
                                    [
                                       

                                        'enableSorting' => false, // Desactivar la clasificacion ascendente y descendente
                                        'label' => 'Seleccionar Oficina', //Ocultar fila de label
                                        'attribute' => 'name',   
                                        'format' => 'raw',
                                        'value'=> function ($model) {
                                                                return Html::a('<span>'.$model->name . '</span>' . Html::tag('i', '', ['class' => 'fa fa-arrow-right']), ['office/view', 'id' => $model->id]);
                                                    },
                                    ],                
                                ],
                        ]); ?>
                    </div>
                    </div>

                    <!-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <p>hola</p> 
                    </div>

                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> -->
                </div>
            </div>
        </div>
    </div>

</section>