<?php

use app\models\Office;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ListView;


/** @var yii\web\View $this */
/** @var app\models\OfficeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Offices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="office-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Office', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'address',
            'postal_code',
            'phone',
            //'customer_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Office $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


<div class="col-12">
    <div class="row">
<?php

$summaryEnable = '';
$pagerEnable = '';
$listOptions=['class' => 'row' ];
$itemOptions=['class' => 'col-sm-3 col-md-3 col-xl-12'];
$summaryOptions=['class' => 'border-2 masonary-grid-listview-summary text-right'];
$pagerOptions= ['class' => 'masonary-grid-listview-pager'];
$layout = sprintf('%s{items}%s', $summaryEnable ? '{summary}' : '', $pagerEnable ? '{pager}' : '');
  
  echo ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => $layout,
        'options' => [
            'tag' => 'div',
        ],
        'itemOptions'=> [

            'tag' => 'div',

        ], 
        'itemView' => function ($model, $key, $index, $widget) {
            echo '<div class="col-sm-12 col-md-4 col-xl-4 py-2 justify-content-center">';
            echo '<div class="card rounded">';
            echo '<div class="prueba">';
            echo Html::img('@web/img/icono-edificio-de-oficinas.png', ['class' => 'w-25 rounded-circle float-start ' ],);
            echo Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
            echo '</div>';
            echo '<div class="card-body">';
             
             echo Html::tag('p', 'Telefono: '.$model->phone, ['class' => 'card-text']);
             //echo Html::tag('p', 'Direccion: '.$model->address, ['class' => 'card-text']);
      
             echo '</div>';

             echo Html::a('Ver Oficina', ['office/view', 'id' => $model->id], ['class' => 'btn btn-primary']);
             echo '</div>';
             echo '</div>';
        },
       
        
        'summaryOptions' => $summaryOptions,
        'pager' => [
            'firstPageLabel' => 'first',
            'lastPageLabel' => 'last',
            'prevPageLabel' => '<span class="fa fa-arrow-left"></span>',
            'nextPageLabel' => '<span class="fa fa-arrow-right"></span>',
            'maxButtonCount' => 8,
            'options' => $pagerOptions
        ],

    ]) ?>


</div>


</div>
