<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

class SiteController extends Controller
{
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
                    return $this->redirect(["site/administration"]);
                break;
            case User::ROL_TECHNICAL :
                    return $this->redirect(["site/technical"]);
                break;
            case User::ROL_MANAGER :
                    return $this->redirect(["site/manager"]);
                break;
            }
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
     
            switch (Yii::$app->user->identity->role) {
                case User::ROL_ADMIN:
                        return $this->redirect(["site/administration"]);
                    break;
                case User::ROL_TECHNICAL :
                        return $this->redirect(["site/technical"]);
                    break;
                case User::ROL_MANAGER :
                        return $this->redirect(["site/manager"]);
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

        /**
     * Render areas
     *
     * 
     */
    public function actionAdministration()
    {
        return $this->render('administration');
    }

    public function actionTechnical()
    {
        return $this->render('technical');
    }

    public function actionManager()
    {
        return $this->render('manager');
    }


}
