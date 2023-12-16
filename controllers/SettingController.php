<?php

namespace app\controllers;

use app\models\Setting;
use app\models\SettingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;

/**
 * SettingController implements the CRUD actions for Setting model.
 */
class SettingController extends Controller
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
                        'actions' => ['create'],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->isUserTechnical() || Yii::$app->user->identity->isUserAdmin();
                        },
                    ],
        
                    [
                        'actions' => ['update','delete'],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $setting = Setting::findOne(Yii::$app->request->get('id'));
                            if($setting === null) 
                                return false;
                            return Yii::$app->user->identity->canAccessByAssignedOffice($setting->device->office_id) && !Yii::$app->user->identity->isUserManager();
                        },
                    ],
                    [
                        'actions' => ['view'],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $setting = Setting::findOne(Yii::$app->request->get('id'));
                            if($setting === null) 
                                return false;
                            return Yii::$app->user->identity->canAccessByAssignedOffice($setting->device->office_id);
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
     * Lists all Setting models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SettingSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Setting model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Setting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($device_id = "", $office_id = "")
    {
        $model = new Setting();

        if ($this->request->isPost) {
            $model->creation_date=date("y-m-d");
            $model->edition_date=date("y-m-d");
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
            $model->office_id = $office_id;
            $model->device_id = $device_id;

        }



        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Setting model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $device_id, $office_id = "")
    {
        $model = $this->findModel($id);
        $model->edition_date=date("y-m-d");
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->office_id = $office_id;
        $model->device_id = $device_id;
        return $this->render('update', [
            'model' => $model,
            
        ]);
    }

    /**
     * Deletes an existing Setting model.
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
     * Finds the Setting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Setting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Setting::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Esta pagina no existe');
    }
}
