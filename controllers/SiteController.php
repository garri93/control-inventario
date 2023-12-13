<?php

namespace app\controllers;

use app\models\Company;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\SignupForm;
use yii\db\Transaction;

class SiteController extends Controller
{

    public $layout = "front";
    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [

                    // Acceso libre para todo el mundo
                    [
                        'actions' => [],
                        'allow' => true,
                    ],

                    // Acceso sólo invitados
                    [                       
                        'actions' => [],                      
                        'allow' => true,                       
                        'roles' => ['?'],
                    ],

                    // Acceso sólo para usuarios logueados independientemente del rol
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                    // Acceso sólo para usuarios con rol administrador
                    [
                        'actions' => ['administration'],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->isUserAdmin();
                        },
                    ],

                    // Acceso sólo para usuarios con rol Tecnico
                    [
                       'actions' => [],
                       'allow' => true,
                       'roles' => ['@'],
                       'matchCallback' => function ($rule, $action) {
                        return Yii::$app->user->identity->isUserTechnical();
                      },
                   ],
                    // Acceso sólo para usuarios con rol Encargado                  
                   [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->isUserManager();
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            switch (Yii::$app->user->identity->role) {
                case User::ROL_ADMIN:
                    return $this->redirect(["customer/index"]);
                break;
            case User::ROL_TECHNICAL :
                    return $this->redirect(["customer/index"]);
                break;
            case User::ROL_MANAGER :
                    return $this->redirect(["customer/index"]);
                break;
            }
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
     
            switch (Yii::$app->user->identity->role) {
                case User::ROL_ADMIN:
                        return $this->redirect(["customer/index"]);
                    break;
                case User::ROL_TECHNICAL :
                        return $this->redirect(["customer/index"]);
                    break;
                case User::ROL_MANAGER :
                        return $this->redirect(["customer/index"]);
                    break;
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /*
    REgistro empresa y usuario
    */

    public function actionSignup()
    {
        $model = new SignupForm();

        $transaction = Yii::$app->db->beginTransaction();

        if ($model->load($this->request->post()) && $model->validate()) {
            $company = new Company();
            $company->cif = $model->cifcompany;
            $company->email = $model->email;
            $company->name = $model->namecompany;
            
            if($company->save()){
                $transaction->commit();

                $user = new User();
                $user->dni = $model->dni;
                $user->company_id = $company->id;
                $user->surname = $model->surname;
                $user->phone = $model->phone;
                $user->email = $model->email;
                $user->username = $model->username;
                $user->password = $model->password;
                $user->role = 1;

                if($user->save()){
                    $transaction->commit();
                    $transaction->end();
                    return $this->redirect(['customer\view']);
                }
                else
                    $transaction->rollBack();
                    
            }
            else
                $transaction->rollBack();
            
        }
        

        return $this->render('signup', [
            'model' => $model,
        ]);
    }


}
