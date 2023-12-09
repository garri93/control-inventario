<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Office $model */


$this->title = 'Crear Oficina';
//$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="office-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
