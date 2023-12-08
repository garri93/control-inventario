<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Setting $model */

echo Html::a('<i class="fa fa-arrow-left"></i> Volver al Dispositivo', ['device/view', 'id' => $model->device_id], ['class' => 'btn btn-success']);
$this->title = 'Crear Configuracion';

//$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
