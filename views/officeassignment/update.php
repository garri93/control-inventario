<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OfficeAssignment $model */

$this->title = 'Update Office Assignment: ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Office Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'user_id' => $model->user_id, 'office_id' => $model->office_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="office-assignment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
