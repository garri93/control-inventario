<?php

namespace app\controllers;

use app\models\Device;
use app\models\DeviceSearch;
use app\models\SettingSearch;
use app\models\performanceSearch;
use app\models\AttributeSearch;
use app\models\Performance;
use app\models\Setting;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\CategorySearch;
use app\models\Category;
use yii;


/**
 * DeviceController implements the CRUD actions for Device model.
 */
class DeviceController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Device models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DeviceSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Device model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        /**/   $model = $this->findModel($id);

                

                /** Configuraciones */
         /**/  $searchModelSetting = new SettingSearch();
         /**/  $searchModelSetting->device_id = $id;
         /**/  $dataProviderSetting = $searchModelSetting->search($this->request->queryParams);

                /** Atributos */
         /**/  $searchModelAttribute = new AttributeSearch();
         /**/  $searchModelAttribute->device_id = $id;
         /**/  $dataProviderAttribute = $searchModelAttribute->search($this->request->queryParams);

                 /** Actuaciones */
         /**/  $searchModelPerformance= new PerformanceSearch();
         /**/  $searchModelPerformance->device_id = $id;
         /**/  $dataProviderPerformance = $searchModelPerformance->search($this->request->queryParams);

         return $this->render('view', [
            'searchModelSetting' => $searchModelSetting,
            'dataProviderSetting' => $dataProviderSetting,

            'searchModelAttribute' => $searchModelAttribute,
            'dataProviderAttribute' => $dataProviderAttribute,

            'searchModelPerformance' => $searchModelPerformance,
            'dataProviderPerformance' => $dataProviderPerformance,

            'model' => $model,
          ]);


    
/*
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);*/
    }

    /**
     * Creates a new Device model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Device();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Device model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Device model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Device model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Device the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Device::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



}
