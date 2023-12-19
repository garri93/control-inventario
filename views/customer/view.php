<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

use kartik\sidenav\SideNav;



use app\models\User;
use app\models\Company;
use app\models\Customer;
use app\models\officeSearch;
use app\models\office;




/** @var yii\web\View $this */
/** @var app\models\Customer $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<h1><?= Html::encode($this->title) ?></h1>      


                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="oficinas-tab" data-toggle="tab" href="#oficinas" role="tab" aria-controls="home" aria-selected="true">Oficinas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="home" aria-selected="true">Datos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="anotaciones-tab" data-toggle="tab" href="#anotaciones" role="tab" aria-controls="anotaciones" aria-selected="false">Anotaciones</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                    </li> -->
                </ul>
                <div class="tab-content" id="myTabContent">
    
                <div class="tab-pane fade show active" id="oficinas" role="tabpanel" aria-labelledby="oficinas-tab">
        
                <p class="button-accion text-left">
                <?= Html::a('Crear Oficina', ['office/create', 'customer_id' => $model->id], ['class' => 'btn btn-success']) ?>
        
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Mostrar Filtros</button>
            </p>


                
            <div class="collapse" id="collapseExample">
            <div class="card card-body">
            <div class="filters-container">
                    <?php $form = ActiveForm::begin([
                        'action' => ['customer/view?id='.$model->id], // Ajusta la acción según tu controlador y acción de búsqueda
                        'method' => 'get',
                    ]); ?>

                    <?= $form->field($searchModeloffice, 'name')->textInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
      
            </div>
        </div>

        <div class="row ">
                <?php
                        $summaryEnable = '';
                        $pagerEnable = '';
                        $listOptions=['class' => 'row' ];
                        $itemOptions=['class' => 'col-sm-3 col-md-3 col-xl-12'];
                        $summaryOptions=['class' => 'border-2 masonary-grid-listview-summary text-right'];
                        $pagerOptions= ['class' => 'masonary-grid-listview-pager'];
                        $layout = sprintf('%s{items}%s', $summaryEnable ? '{summary}' : '', $pagerEnable ? '{pager}' : '');
                        
                        echo ListView::widget([
                                'dataProvider' => $dataProvideroffice,
                                'layout' => $layout,
                                'options' => [
                                    'tag' => 'div',
                                ],
                                'itemOptions'=> [

                                    'tag' => 'div',

                                ], 
                                'itemView' => function ($model, $key, $index, $widget) {
                                    echo '<div class="col-sm-12 col-md-4 col-xl-4 py-2   h-100">';
                                    echo '<div class="card rounded ">';
                                    echo '<div class="headercardofffice d-flex align-items-center col-12 d-flex justify-content-around text-center">';
                                    echo Html::img('@web/img/icono-edificio-de-oficinas.png', ['class' => 'w-25 rounded-circle float-start ' ]);
                                    echo Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
                                    echo '</div>';
                                    echo '<div class="card-body d-flex align-items-stretch">';
                                    
                                    echo Html::tag('p', '<b>Telefono:</b> '.$model->phone, ['class' => 'card-text']);
                                    //echo Html::tag('p', 'Direccion: '.$model->address, ['class' => 'card-text']);
                            
                                    echo '</div>';

                                    echo Html::a('Ver Oficina', ['office/view', 'id' => $model->id], ['class' => 'btn btn-primary']);
                                    echo '</div>';
                                    echo '</div>';
                                },
                                'summaryOptions' => $summaryOptions,
                                'pager' => [
                                    'firstPageLabel' => 'first',
                                    'lastPageLabel' => 'last',
                                    'prevPageLabel' => '<span class="fa fa-arrow-left"></span>',
                                    'nextPageLabel' => '<span class="fa fa-arrow-right"></span>',
                                    'maxButtonCount' => 8,
                                    'options' => $pagerOptions
                                ],

                            ]) ?>

                            
                        </div>
                        </div>
                
            
                   
                    <div class="tab-pane fade show" id="data" role="tabpanel" aria-labelledby="data-tab">
                                
                                <div class="customer-view">
                                        
                                            <p class="button-accion">
                                                <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                                <?php if(Yii::$app->user->identity->isUserAdmin()):?>
                                                <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
                                                    
                                                    'class' => 'btn btn-danger',
                                                    'data' => [
                                                        'confirm' => '¿ Seguro que deseas borrar al cliente?',
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
                                                    'phone',
                                                    //'notes:ntext',                 
                                                ],
                                            ]) ?>
                                    

                                    
                                </div>

  
                    </div>

                    <div class="tab-pane fade show" id="anotaciones" role="tabpanel" aria-labelledby="anotaciones-tab">
                        <div class="notes py-3">

                            <?php if(!$model->notes) {echo 'Sin Anotaciones';} else {echo  $model->notes;}?>

                        </div>
                    </div>

                   <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> -->
                </div>
                </div>
