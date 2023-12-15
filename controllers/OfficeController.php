<?php

namespace app\controllers;

use app\models\Office;
use app\models\OfficeSearch;
use app\models\OfficeAssignment;
use app\models\Device;
use app\models\DeviceSearch;

use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\filters\AccessControl;

/**
 * OfficeController implements the CRUD actions for Office model.
 */
class OfficeController extends Controller
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
                    // Acceso sólo para usuarios con rol administrador
                    [
                        'actions' => ['view', 'create', 'update','delete'],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->isUserAdmin();
                        },
                    ],
                    [
                        'actions' => ['view', 'create', 'update'],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->isUserTechnical();

                        },
                    ],
                    [
                        'actions' => ['view'],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $model = new Office;
                            return Yii::$app->user->identity->isUserManager() && $model->validateCompanyAccess();

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
     * Lists all Office models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OfficeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Office model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $if ($model->validateCompanyAccess($model->id)) {
            echo 'hola'} else {};

        /** Device */
         /**/  $searchModelDevice = new DeviceSearch();
         /**/  $searchModelDevice->office_id = $id;
         /**/  $dataProviderDevice= $searchModelDevice->search($this->request->queryParams);
       


        return $this->render('view', [

            'searchModelDevice' => $searchModelDevice,
            'dataProviderDevice' => $dataProviderDevice,

            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Office model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($customer_id = '')
    {
        $model = new Office();
        $model->customer_id = $customer_id;
        
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
     * Updates an existing Office model.
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
     * Deletes an existing Office model.
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
     * Finds the Office model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @param int $customer_id ID
     * @return Office the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelByCliente($id, $customer_id)
    {
        if (($model = Office::find()->where(['id' => $id])->delCliente($customer_id)->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModel($id)
    {
        if (($model = Office::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    /**
     * Funcion para borrar las relaciones entre officina y usuarios
     */

    public function actionDeleteassignment($user_id,$office_id)
    {
        $model = new OfficeAssignment();
        $model = OfficeAssignment::findOne($user_id,$office_id);
        
        if ($model) {
            $model->delete();
        }
        
        return $this->redirect(['office/view', 'id' => $office_id]);
    }




}


