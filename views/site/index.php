<?php
use yii\helpers\Html;
/** @var yii\web\View $this */
?>

<header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-5">
                        <div class="text-container">
                            <h1>Control de Inventario </h1>
                            <p class="p-large">Optimiza la gestión de tus activos y servicios informáticos con nuestra plataforma de inventario especializada.</p>
                            <?= Html::a('Iniciar Sesion', ['/site/login'], ['class' => 'btn-solid-lg page-scroll'])?>
                            <?= Html::a('Registrarse', ['/site/signup'], ['class' => 'btn-solid-lg page-scroll'])?>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6 col-xl-7">
                        <div class="image-container">
                            <div class="img-wrapper">
                                <img class="img-fluid" src="img/capturaspantalla/dispositivos/vistadispositivos.png " alt="alternative">
                            </div> <!-- end of img-wrapper -->
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->
</header>


    <!-- Description -->
    <div class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">Descripcion</div>
                    <h2 class="h2-heading">Control total de tus clientes</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="img/description-1.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Acceso Rapido a tus clientes</h4>
                            <p>Tendras acceso directo a tus clientes desde la pagina de inicio</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="img/description-2.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Creacion de Actuaciones</h4>
                            <p>Podras ver tu dispositivos y las reparaciones que han tenido con nuestra seccion de Actuaciones</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="img/description-3.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Control de los empleados que realizaron la actuacion</h4>
                            <p>En nuestra app podras asignar empleados a las reparaciones realizadas a los dispositivos</p>
                        </div>
                    </div>
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of description -->


    <!-- Features -->
    <div id="features" class="tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">Caracterisiticas</div>
                    <h2 class="h2-heading">Gestión de inventarios</h2>
                    <p class="p-heading">Nuestra plataforma intuitiva te permite tener un control total sobre tus activos, mejorando la eficiencia operativa y reduciendo los tiempos de inactividad.</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Tabs Links -->
                    <ul class="nav nav-tabs" id="argoTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="nav-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true"><i class="fas fa-list"></i>Clientes y oficinas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"><i class="fas fa-envelope-open-text"></i>Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false"><i class="fas fa-chart-bar"></i>Categorias</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" id="nav-tab-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false"><i class="fas fa-chart-bar"></i>Dispositivos</a>
                        </li>
                    </ul>
                    <!-- end of tabs links -->

                    <!-- Tabs Content -->
                    <div class="tab-content" id="argoTabsContent">

                        <!-- Tab -->
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="img/capturaspantalla/cliente/vista.png" alt="alternative">
                                    </div> <!-- end of image-container -->
                                </div> <!-- end of col -->
                                <div class="col-lg-6">
                                    <div class="text-container">
                                        <h3>Asigna Oficinas a tus Clientes </h3>
                                        <p>Hemos diseñado un sistema intuitivo que te permite asignar oficinas de manera directa y eficiente a cada cliente. Con unos simples clics, establece la conexión entre tus clientes y sus ubicaciones correspondientes. Este enfoque simplificado facilita la organización de datos, asegurando que cada cliente esté vinculado claramente a la oficina asociada. Simplifica tu administración, mejora la organización y optimiza la relación cliente-oficina con Control de Inventario.</p>
                                    </div> <!-- end of text-container -->
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div> <!-- end of tab-pane -->
                        <!-- end of tab -->

                        <!-- Tab -->
                        <div class="tab-pane fade show" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="img/capturaspantalla/usuario/index.png " alt="alternative">
                                    </div> <!-- end of image-container -->
                                </div> <!-- end of col -->
                                <div class="col-lg-6">
                                    <div class="text-container">
                                        <h3>Control de Usuarios</h3>
                                        <p>En Control de Inventario, proporcionamos un control preciso sobre quién accede a qué. A través de nuestro sistema de permisos, asigna a cada usuario acceso a oficinas específicas, adaptando la experiencia según las necesidades de tu equipo. Ya sea el personal de soporte en la sede principal o técnicos en sucursales remotas, aseguramos que cada miembro acceda solo a la información relevante para su función. Simplifica la gestión y refuerza la seguridad con Control de Inventario: donde los accesos son personalizados según tus reglas</p>
                                        
                                    </div> <!-- end of text-container -->
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div> <!-- end of tab-pane -->
                        <!-- end of tab -->

                        <!-- Tab -->
                        <div class="tab-pane fade show" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="img/capturaspantalla/indexcategorias.png" alt="alternative">
                                    </div> <!-- end of image-container -->
                                </div> <!-- end of col -->
                                <div class="col-lg-6">
                                    <div class="text-container">
                                        <h3>Sistema de Categorias</h3>
                                        <p>Creemos en la personalización a tu medida. Ahora, puedes organizar tus dispositivos de manera intuitiva mediante categorías personalizadas. Define tus propias categorías para adaptarse a las necesidades específicas de tu empresa, desde equipos de red hasta periféricos especializados. Simplifica la navegación, encuentra lo que necesitas en un instante y lleva la organización de tus dispositivos al siguiente nivel con Control de Inventario. </p>
                                    </div> <!-- end of text-container -->
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div> <!-- end of tab-pane -->
                                                <!-- Tab -->
                        <div class="tab-pane fade show" id="tab-4" role="tabpanel" aria-labelledby="tab-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="img/capturaspantalla/dispositivos/vistadispositivos.png " alt="alternative">
                                    </div> <!-- end of image-container -->
                                </div> <!-- end of col -->
                                <div class="col-lg-6">
                                    <div class="text-container">
                                        <h3>Gestiona Tus Dispositivos con Eficiencia</h3>
                                        <p>Nuestra plataforma simplifica la administración de dispositivos y periféricos al ofrecer una visión completa de tu inventario. Desde el seguimiento de dispositivos hasta la configuración de parámetros, optimiza tu entorno informático de manera intuitiva y eficaz. Con Control de inventario, el control total está al alcance de tus manos.</p>
                                        <ul class="list-unstyled li-space-lg">
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Crear configuraciones para tus dispositivos</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Crea Actuaciones para controlar que se hizo y quien la realizo</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Controla los Perifericos vinculados a cada dispositivo</div>
                                            </li>
                                        </ul>
                                    </div> <!-- end of text-container -->
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div> <!-- end of tab-pane -->
                        <!-- end of tab -->
                        <!-- end of tab -->
                    </div> <!-- end of tab content -->
                    <!-- end of tabs content -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of tabs -->
    <!-- end of features -->


   


    <!-- Details -->
    <div id="details" class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Registrate Gratis</h2>
                        <p>Aprobecha la oportunidad nuestra app gratis por tiempo limitao. No te pierdas tu prueba gratuita</p>

                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="img/tiempolimitado.jpg" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of details -->




