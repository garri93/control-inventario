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
                    <?=$id = Yii::$app->user->identity->accessToken?>
                    <?=$id = Yii::$app->user->identity->username?>
                <?php endif; ?>
            </h1>
    </p>

    <code><?= __FILE__ ?></code>
</div>
