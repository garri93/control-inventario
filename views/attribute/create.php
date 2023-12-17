<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Attribute $model */
echo Html::a('<i class="fa fa-arrow-left"></i> Volver', ['device/view', 'id' => $model->device_id], ['class' => 'btn btn-success']);
$this->title = 'Crear Atributo';
//$this->params['breadcrumbs'][] = ['label' => 'Attributes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attribute-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
