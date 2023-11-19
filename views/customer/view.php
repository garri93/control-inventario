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
        <h1><?= Html::encode($this->title) ?></h1>              
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
                        'phone',
                        //'notes:ntext',                 
                    ],
                ]) ?>
          

           
    </div>

</section>

<section>

<ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="oficinas-tab" data-toggle="tab" href="#oficinas" role="tab" aria-controls="home" aria-selected="true">Oficinas</a>
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
                        
<div class="container ">  
    <div class="row">
    <?= Html::a('Crear Oficina', ['office/create', 'customer_id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="row ">

    <?php
           
        foreach ($dataOffice as $fila => $valor) {

    ?>
            <div class="card col-sm-3 col-md-3 col-xl-3 rounded mr-1 mb-2">
               <?=Html::img('@web/img/icono-edificio-de-oficinas.png', ['class' => ''])?>
               <div class="card-body">
                    <?=Html::tag('p', 'Nombre: '.$dataOffice[$fila]['name'], ['class' => 'card-title'])?>
                    <?=Html::tag('p', 'Telefon: '.$dataOffice[$fila]['phone'], ['class' => 'card-text'])?>
                    <?=Html::tag('p', 'Direccion: '.$dataOffice[$fila]['address'], ['class' => 'card-text'])?>
                    <?= Html::a('Ver Oficina', ['office/view', 'id' => $dataOffice[$fila]['id']], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

            <div class="card col-sm-3 col-md-3 col-xl-3 rounded mr-1 mb-2">
               <?=Html::img('@web/img/icono-edificio-de-oficinas.png', ['class' => ''])?>
               <div class="card-body">
                    <?=Html::tag('p', 'Nombre: '.$dataOffice[$fila]['name'], ['class' => 'card-title'])?>
                    <?=Html::tag('p', 'Telefon: '.$dataOffice[$fila]['phone'], ['class' => 'card-text'])?>
                    <?=Html::tag('p', 'Direccion: '.$dataOffice[$fila]['address'], ['class' => 'card-text'])?>
                    <?= Html::a('Ver Oficina', ['office/view', 'id' => $dataOffice[$fila]['id']], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

            <div class="card col-sm-3 col-md-3 col-xl-3 rounded mr-1 mb-2">
               <?=Html::img('@web/img/icono-edificio-de-oficinas.png', ['class' => ''])?>
               <div class="card-body">
                    <?=Html::tag('p', 'Nombre: '.$dataOffice[$fila]['name'], ['class' => 'card-title'])?>
                    <?=Html::tag('p', 'Telefon: '.$dataOffice[$fila]['phone'], ['class' => 'card-text'])?>
                    <?=Html::tag('p', 'Direccion: '.$dataOffice[$fila]['address'], ['class' => 'card-text'])?>
                    <?= Html::a('Ver Oficina', ['office/view', 'id' => $dataOffice[$fila]['id']], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

            <div class="card col-sm-3 col-md-3 col-xl-3 rounded mr-1 mb-2">
               <?=Html::img('@web/img/icono-edificio-de-oficinas.png', ['class' => ''])?>
               <div class="card-body">
                    <?=Html::tag('p', 'Nombre: '.$dataOffice[$fila]['name'], ['class' => 'card-title'])?>
                    <?=Html::tag('p', 'Telefon: '.$dataOffice[$fila]['phone'], ['class' => 'card-text'])?>
                    <?=Html::tag('p', 'Direccion: '.$dataOffice[$fila]['address'], ['class' => 'card-text'])?>
                    <?= Html::a('Ver Oficina', ['office/view', 'id' => $dataOffice[$fila]['id']], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

            <div class="card col-sm-3 col-md-3 col-xl-3 rounded mr-1 mb-2">
               <?=Html::img('@web/img/icono-edificio-de-oficinas.png', ['class' => ''])?>
               <div class="card-body">
                    <?=Html::tag('p', 'Nombre: '.$dataOffice[$fila]['name'], ['class' => 'card-title'])?>
                    <?=Html::tag('p', 'Telefon: '.$dataOffice[$fila]['phone'], ['class' => 'card-text'])?>
                    <?=Html::tag('p', 'Direccion: '.$dataOffice[$fila]['address'], ['class' => 'card-text'])?>
                    <?= Html::a('Ver Oficina', ['office/view', 'id' => $dataOffice[$fila]['id']], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>     
    <?php
        }
    ?>
</div>
        
        </div>
                   
                    </div>

                     <div class="tab-pane fade" id="anotaciones" role="tabpanel" aria-labelledby="anotaciones-tab">
                     <?php 

                    if(!$model->notes) {
                        echo 'Sin Anotaciones';
                     } else {
                        echo Html::encode( $model->notes);
                     }
                     ?>
                    </div>

                   <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> -->
                </div>








</section>

</div>

