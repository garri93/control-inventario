<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Oficina $model */

$this->title = 'Update Oficina: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Oficinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="oficina-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
