<?php

/** @var yii\web\View $this */
/** @var string $content */


use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;





AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>




    
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->user->identity->getUserAdminPanel(),
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Inicio', 'url' => [Yii::$app->user->identity->getUserAdminPanel()]],
            ['label' => 'Usuarios', 'url' => ['/user/index'],'visible' => Yii::$app->user->identity->isUserAdmin()],
            ['label' => 'Clientes', 'url' => ['/customer/index'],'visible' => Yii::$app->user->identity->isUserAdmin()|| Yii::$app->user->identity->isUserTechnical()],
            ['label' => 'Oficinas', 'url' => ['/office/index']],
            ['label' => 'Dispositivos', 'url' => ['/device/index'],'visible' => Yii::$app->user->identity->isUserAdmin()|| Yii::$app->user->identity->isUserTechnical() || Yii::$app->user->identity->isUserManager()],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (

            ['label' => 'Hola, '.Yii::$app->user->identity->username,
                'items' => [
                    ['label' => 'Panel administracion', 'url' => [Yii::$app->user->identity->getUserAdminPanel()]],
                       
                        '<div>'
                        . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                        . Html::submitButton(
                            'Cerrar Sesion',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</div>'  
                ]
            ]
            )
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
