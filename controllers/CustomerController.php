<?php

namespace app\controllers;

use app\models\Customer;
use app\models\CustomerSearch;
use yii\web\Controller;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use yii\filters\AccessControl;
use yii;
use Yii as GlobalYii;

use app\models\officeSearch;
use app\models\office;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller
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
                        'actions' => ['create'],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->isUserAdmin() || Yii::$app->user->identity->isUserTechnical();
                            
                        },
                    ],
                    [
                        'actions' => ['index'],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['view'],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->canAccessBycustomer(Yii::$app->request->get('id'));
                        },
                    ],
                    [
                        'actions' => ['update',],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return (Yii::$app->user->identity->isUserAdmin() || 
                                        Yii::$app->user->identity->isUserTechnical()) && 
                                            Yii::$app->user->identity->canAccessBycustomer(Yii::$app->request->get('id'));
                            
                        },
                    ],
                    [
                        'actions' => ['delete'],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->isUserAdmin() && Yii::$app->user->identity->canAccessBycustomer(Yii::$app->request->get('id'));
                            
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
     * Lists all Customer models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CustomerSearch();
        $searchModel->company_id = Yii::$app->user->identity->company_id;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customer model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

          $model = $this->findModel($id);


                   /** Configuraciones */
         /**/  $searchModeloffice = new officeSearch();
         /**/  $searchModeloffice->customer_id = $id;
         /**/  $dataProvideroffice= $searchModeloffice->search($this->request->queryParams);

        //   $searchModel = new officeSearch();
        //   $searchModel->customer_id = $id;
        //   $dataProvider = $searchModel->search($this->request->queryParams);
        //   $dataOffice = $dataProvider->getModels();

          return $this->render('view', [
              'searchModeloffice' => $searchModeloffice,
              'dataProvideroffice' => $dataProvideroffice,
              'model' => $model,
            ]);

    }

    /**
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Customer();
        $model->company_id = Yii::$app->user->identity->company_id;

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
     * Updates an existing Customer model.
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
     * Deletes an existing Customer model.
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
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::find()->where(['id' => $id])->deMiEmpesa()->activo()->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Esta pagina no existe');
    }
}
 