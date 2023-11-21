<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OfficeAssignment $model */

$this->title = 'Create Office Assignment';
$this->params['breadcrumbs'][] = ['label' => 'Office Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="office-assignment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
