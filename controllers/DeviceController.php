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
use app\models\CustomerSearch;
use yii;
use yii\helpers\ArrayHelper;
use app\models\Office;
use yii\web\Response;

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

                /** Configuraciones */
         /**/  $searchModelCustomer = new CustomerSearch();
         /**/  $searchModelCustomer->company_id = Yii::$app->user->identity->company_id;
         /**/  $customer = $searchModelCustomer->search($this->request->queryParams);


        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            //'customer' => $customer,
            
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

/**
 * Acción a la que llama el select de clientes para saber cuales son las oficinas hijas
 * @param false $customer_id -> Para cuando queremos premarcar una oficina porque ya ha sido guardada (Ejem modificar oficina)
 * @return array|string[]
 */

 /*
  * customer_id >> Parámetro que se pasa cuando estamos editando para que preseleccione la primera ver
  * depdrop_parents >> Es el valor elegido en el select padre del que hace la llamada $_POST 
  */
public function actionOfficeCustomer($customer_id = false)
{
    Yii::$app->response->format = Response::FORMAT_JSON;

    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $office = Office::find()->where(['customer_id' => $parents[0] ])->orderBy(['name' => SORT_DESC])->all();

            $selected = '';

            if($customer_id)
                $selected = $customer_id;

                return ['output' => $office, 'selected' => $selected];

            
        }
    }
    return ['output' => '', 'selected' => ''];
}


}
