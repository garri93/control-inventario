<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;


class AdministrationController extends Controller
{

    public $layout = "main";
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
