<?php

namespace app\controllers;

use app\models\Device;
use app\models\DeviceSearch;
use app\models\DeviceQuery;
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
use yii\filters\AccessControl;

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
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create', 'office-customer'],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->isUserTechnical() || Yii::$app->user->identity->isUserAdmin();
                        },
                    ],
                    
        
                    [
                        'actions' => ['update','delete', 'office-customer'],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $device = Device::findOne(Yii::$app->request->get('id'));
                            if($device === null) 
                                return false;
                            return Yii::$app->user->identity->canAccessByAssignedOffice($device->office_id) && !Yii::$app->user->identity->isUserManager();
                        },
                    ],
                    [
                        'actions' => ['view'],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $device = Device::findOne(Yii::$app->request->get('id'));
                            if($device === null) 
                                return false;
                            return Yii::$app->user->identity->canAccessByAssignedOffice($device->office_id);
                        },
                    ],

                ],
            ],
     //Controla el modo en que se accede a las acciones, en este ejemplo a la acción logout
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Device models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DeviceSearch();
        $searchModel->activo = Device::ACTIVO_SI;
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
         /**/  $searchModelDevice = new DeviceSearch();
         /**/  $searchModelDevice->parent_device = $id;
         /**/  $dataProviderDevice= $searchModelDevice->search($this->request->queryParams);
       

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

            'searchModelDevice' => $searchModelDevice,
            'dataProviderDevice' => $dataProviderDevice,

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
    public function actionCreate($parent_device = "", $office_id = "", $customer_id = "")
    {
        $model = new Device();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
            $model->parent_device = $parent_device;
            $model->office_id = $office_id;
            $model->customer_id = $customer_id;
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
        $model->customer_id = $model->office->customer_id;

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

        throw new NotFoundHttpException('Esta pagina no existe');
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

            if($parents)
                $selected =  $parents;

                return ['output' => $office, 'selected' => $selected];

            
        }
    }
    return ['output' => '', 'selected' => ''];
}


}
