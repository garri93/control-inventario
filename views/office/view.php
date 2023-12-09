<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use kartik\select2\Select2;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Category;
use app\models\Device;
use app\models\User;

/** @var yii\web\View $this */
/** @var app\models\Office $model */

echo Html::a('<i class="fa fa-arrow-left"></i>  Ir a '.$model->customer->name, ['customer/view', 'id' => $model->customer_id], ['class' => 'btn btn-success']);
$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="datos-tab" data-toggle="tab" href="#datos" role="tab" aria-controls="datos" aria-selected="true">Datos</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="device-tab" data-toggle="tab" href="#device" role="tab" aria-controls="device" aria-selected="false">Dispositivos</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="false">Tecnicos</a>
        </li>
                  
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="datos" role="tabpanel" aria-labelledby="datos-tab">
                <p class="button-accion">
                    <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => '¿Seguro que desea borrar esta oficina, tenga en cuenta que se borrar los datos de esta y todos sus dispositivos?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'name',
                        'address',
                        'postal_code',
                        'phone',
                        [
                            'attribute' => 'customer_id',
                            'value' => $model->customer->name,
                        ],

                    ],
                ]) ?>

            </div>


            <div class="tab-pane fade show" id="device" role="tabpanel" aria-labelledby="device-tab">
             
            <p class="button-accion text-left">
                <?= Html::a('Crear Dispositivo', ['device/create', 'parent_device' => $model->id, 'office_id' => $model->id, 'customer_id' => $model->customer_id], ['class' => 'btn btn-success']) ?>
        
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Mostrar Filtros</button>
            </p>
            

            
            

            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                <div class="filters-container">
                        <?php $form = ActiveForm::begin([
                            'action' => ['office/view?id='.$model->id], // Ajusta la acción según tu controlador y acción de búsqueda
                            'method' => 'get',
                        ]); ?>

                        <?= $form->field($searchModelDevice, 'name')->textInput() ?>
                        <?php
                            $data = ArrayHelper::map(Category::find()->orderBy('name')->where(['company_id' => Yii::$app->user->identity->company_id])->all(), 'id', 'name');

                            echo $form->field($searchModelDevice, 'category_id')->widget(Select2::classname(), [
                                'data' => $data,
                                'size' => Select2::LARGE,
                                
                                'options' => ['placeholder' => 'Selecciona Categoria ...','prompt' => 'Seleccione una Categoria...'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ])->label('Categorias');
                         ?>
                        


                        <div class="form-group">
                            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
          
                </div>
            </div>
         
            <div class="gridview-custom text-justify text-center ">
                   <?= GridView::widget([
                            'dataProvider' => $dataProviderDevice,
                            //'filterModel' => $searchModelDevice,
                            'summary' => '', //Ocultar texto paginacion superior
                            'rowOptions' => function ($model, $key, $index, $grid) {
                                return ['class' => 'device-parent'];
                            },
                            'columns' => [
                                [
                                    'label' => 'Nombre',
                                    'enableSorting' => false, // Desactivar la clasificacion ascendente y descendente
                                    'attribute' => 'name',
                          
                                ],
                                [
                                    'label' => 'Dispositivo Padre',
                                    'enableSorting' => false, // Desactivar la clasificacion ascendente y descendente
                                    'attribute' => 'parent_device',
                                    'value' => function ($model) use ($dataProviderDevice) {
                                        // Obtiene el valor 'deviceparent' del modelo actual
                                        $deviceParentValue = $model['deviceparent'];
                                        $deviceParentid = $model['parent_device'];
                        
                                        // Construye el enlace con el valor de 'deviceparent'
                                        return Html::a('<span>' . $deviceParentValue . '</span>', ['device/view', 'id' => $deviceParentid]);
                                    },
                                    'format' => 'raw', // Permite HTML en el valor
                                ],
                                [
                                    'label' => 'Categoria',
                                    'enableSorting' => false, // Desactivar la clasificacion ascendente y descendente
                                    'attribute' => 'category_id',
                                    'value' => 'category.name',
                                ],
                                [
                                    'class' => ActionColumn::className(),
                                    'header' => 'Acciones',
                                    'urlCreator' => function ($action, Device $model, $key, $index, $column) {
                                        return Url::toRoute(['/device/' . $action, 'id' => $model->id]);
                                    }
                                ],
                     
                            ],
                        ]); ?>
                </div>
            </div>

            <div class="tab-pane fade show" id="users" role="tabpanel" aria-labelledby="users-tab">
                <table class="table table-striped text-center">
                    <tbody>
                        <thead class="thead-dark">
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </thead>
                    <?php foreach ($model->users as $user): ?>
                    
                            <tr>
                            <td><?= $user->username ?></td>
                            <td><?= isset(User::$rolOptions[$user->role]) ? User::$rolOptions[$user->role] : 'Desconocido' ?></td>
                            <td><?= 
                                 Html::a('Ver', ['user/view', 'id' => $user->id], ['class' => 'btn btn-success']); ?>
                         <?= 
                                Html::a('Quitar', ['deleteassignment', 'user_id' => $user->id, 'office_id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Seguro que quieres desvincular al usuario de esta Oficina?',
                                    'method' => 'post',
                                ],
                            ]) ?></td>
                            </tr>
                
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
    




        </div>

        






   



