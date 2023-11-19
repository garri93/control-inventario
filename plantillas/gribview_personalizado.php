<?php

/******************************** 
 * 
 * En el controlador 
 * 
 */
    /**
     * Displays a single Customer model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        /**/ */  $model = $this->findModel($id);

         /**/ */ $searchModel = new officeSearch();
         /**/ */ $searchModel->customer_id = $id;
         /**/ */ $dataProvider = $searchModel->search($this->request->queryParams);

          return $this->render('view', [
              'searchModel' => $searchModel,
              'dataProvider' => $dataProvider,
              'model' => $model,
            ]);

    }


/******************************** 
 * 
 * En la vista
 * 
 */



 <div class="col-sm-6 col-md-6 col-xl-6">
                
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Oficinas</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                    </li> -->
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="gridview-custom">
                    <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                //'showHeader'=> false, //Ocultar todo el header paginacion, label, cuadro de busqueda.
                                'filterModel' => $searchModel, //Mostrar cuadro de busqueda.
                                'summary' => '', //Ocultar texto paginacion superior
                                
                                'columns' => [
                                    [
                                       

                                        'enableSorting' => false, // Desactivar la clasificacion ascendente y descendente
                                        'label' => 'Seleccionar Oficina', //Ocultar fila de label
                                        'attribute' => 'name',   
                                        'format' => 'raw',
                                        'value'=> function ($model) {
                                                                return Html::a('<span>'.$model->name . '</span>' . Html::tag('i', '', ['class' => 'fa fa-arrow-right']), ['office/view', 'id' => $model->id]);
                                                    },
                                    ],                
                                ],
                        ]); ?>
                    </div>
                    </div>

                    <!-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <p>hola</p> 
                    </div>

                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> -->
                </div>


?>