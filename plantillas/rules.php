<?php

/*** Comentado */

public function behaviors1()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    // Acceso libre para todo el mundo
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' => [],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                    ],
                    // Acceso sólo invitados
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' => [],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['?'],
                    ],
                    // Acceso sólo para usuarios logueados independientemente del rol
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' => ['logout'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                    ],
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' => ['logout', 'admin','user','company','divice'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isUserAdmin();
                        },
                    ],
                    [
                       //Los usuarios simples tienen permisos sobre las siguientes acciones
                       'actions' => ['logout', '' ],
                       //Esta propiedad establece que tiene permisos
                       'allow' => true,
                       //Usuarios autenticados, el signo ? es para invitados
                       'roles' => ['@'],
                       //Este método nos permite crear un filtro sobre la identidad del usuario
                       //y así establecer si tiene permisos o no
                       'matchCallback' => function ($rule, $action) {
                          //Llamada al método que comprueba si es un usuario simple
                          return User::isUserSimple();

                          User::find()->where()->deMiEmpresa()->ordenadas()->all()
                      },
                   ],
                   [
                        //Los usuarios simples tienen permisos sobre las siguientes acciones
                        'actions' => [ 'user'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                        //Llamada al método que comprueba si es un usuario simple
                        return User::isUserSimple();
                    },
                ],
                ],
            ],
     //Controla el modo en que se accede a las acciones, en este ejemplo a la acción logout
     //sólo se puede acceder a través del método post
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

/** Sin comentar */

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
                        'actions' => ['login'],                      
                        'allow' => true,                       
                        'roles' => ['?'],
                    ],

                    // Acceso sólo para usuarios logueados independientemente del rol
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                    // Acceso sólo para usuarios con rol administrador
                    [
                        'actions' => [],                       
                        'allow' => true,                      
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserAdmin();
                        },
                    ],

                    // Acceso sólo para usuarios con rol Tecnico
                    [
                       'actions' => [],
                       'allow' => true,
                       'roles' => ['@'],
                       'matchCallback' => function ($rule, $action) {
                          return User::isUserTechnical();
                      },
                   ],
                    // Acceso sólo para usuarios con rol Encargado                  
                   [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                        return User::isUserManager();
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







?>