<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Oficina $model */

$this->title = 'Create Oficina';
$this->params['breadcrumbs'][] = ['label' => 'Oficinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oficina-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
