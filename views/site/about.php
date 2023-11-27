<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:

            <h1>
                <?php if(!Yii::$app->user->isGuest): ?>
                    <?= Yii::$app->user->identity->accessToken?>
                    <?= Yii::$app->user->identity->username?>
                    <?= Yii::$app->user->identity->role?>
                    <?php var_dump(Yii::$app->user->identity->isUserAdmin());
                    var_dump(Yii::$app->user->identity->getrole());?>
                <?php endif; ?>
                <?php 
                 for($i=0; $i<100; $i++){
                    echo "</br> ";
                    echo \Yii::$app->security->generateRandomString();
                    
                    echo "</br> ";
                   
                   }
                
                
                ?>
            </h1>
    </p>

    <code><?= __FILE__ ?></code>
</div>
