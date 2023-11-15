<?php

use app\models\User;
use app\models\Company;
use app\models\Customer;
use app\models\UserSearch;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


?>


<div><h1>Area de Tecnico</h1></div>


<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-2 col-xl-3">
                <h2>Acceso Directo</h2>
                <p><i><?= Html::a("Ver Datos Empresa", '/company/view?id='); ?></i></p>
                <p><i><?= Html::a("Panel de Tecnicos", '/administration/technical'); ?></i></p>
  
            </div>
      
            <div class="col-sm-6 col-md-2 col-xl-3">
                <h2>Clientes</h2>
                <p><i><?= Html::a("Listado de Clientes", '/customer/index'); ?></i></p>
                <p><i><?= Html::a("Crear Usuario", '/user/index'); ?></i></p>
            </div>
        
            <div class="col-sm-6 col-md-2 col-xl-3">
                <h2>Usuarios</h2>
                <p><i><?= Html::a("Listado Usuarios", '/user/index'); ?></i></p>
                <p><i><?= Html::a("Crear Usuario", '/user/index'); ?></i></p>
            </div>
        </div>

    </div>
</section>