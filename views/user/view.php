<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\select2\Select2;

use app\models\User;
use app\models\Office;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = $model->username;
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que quieres borrar al usuario '. $model->username.' ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'surname',
            'dni',
            'phone',

            [
                'attribute' => 'role',
                'value' => function ($data) {
                    return isset(User::$rolOptions[$data->role]) ? User::$rolOptions[$data->role] : 'Desconocido';
                },
            ],

            'email:email',
        ],
    ]) ?>

</div>
<div class="text-center">
<h2>Oficinas Asignadas</h2>
</div>
<div class="tab-pane fade show" id="users" role="tabpanel" aria-labelledby="users-tab">
                <table class="table table-striped text-center">
                    <tbody>
                        <thead class="thead-dark">
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </thead>
                    <?php foreach ($model->offices as $office): ?>
                    
                            <tr>
                            <td><?= $office->name ?></td>
                            
                            <td><?= 
                                 Html::a('Ver', ['office/view', 'id' => $office->id], ['class' => 'btn btn-success']); ?>
                         <?= 
                                Html::a('Quitar', ['deleteassignment', 'user_id' => $model->id, 'office_id' => $office->id], [
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
