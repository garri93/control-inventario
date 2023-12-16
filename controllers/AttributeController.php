<?php

namespace app\controllers;

use app\models\Attribute;
use app\models\Device;
use app\models\User;
use app\models\AttributeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;



/**
 * AttributeController implements the CRUD actions for Attribute model.
 */
class AttributeController extends Controller
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
                            $attribute = Attribute::findOne(Yii::$app->request->get('id'));
                            if($attribute === null) 
                                return false;
                            return Yii::$app->user->identity->canAccessByAssignedOffice($attribute->device->office_id) && !Yii::$app->user->identity->isUserManager();
                        },
                    ],
                    [
                        'actions' => ['view'],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $attribute = Attribute::findOne(Yii::$app->request->get('id'));
                            if($attribute === null) 
                                return false;
                            return Yii::$app->user->identity->canAccessByAssignedOffice($attribute->device->office_id);
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
     * Lists all Attribute models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AttributeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Attribute model.
     * @param int $id ID
     * @param int $device_id Device ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $device_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $device_id),
        ]);
    }

    /**
     * Creates a new Attribute model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($device_id = "", $office_id="")
    {
        $model = new Attribute();
        $model->device_id = $device_id;
        $model->office_id = $office_id;
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['/device/view', 'id' => $model->device_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Attribute model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @param int $device_id Device ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $device_id, $office_id)
    {
        $model = $this->findModel($id, $device_id);
        $model->office_id = $office_id;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['/device/view', 'id' => $model->device_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Attribute model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @param int $device_id Device ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $device_id)
    {
        $this->findModel($id, $device_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Attribute model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @param int $device_id Device ID
     * @return Attribute the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $device_id)
    {
        if (($model = Attribute::findOne(['id' => $id, 'device_id' => $device_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Esta pagina no existe');
    }
}
