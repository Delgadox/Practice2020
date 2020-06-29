<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php

    NavBar::begin([

        'brandLabel' => '<img src="'. yii\helpers\Url::to('@web/images/logo.jpg') .'" class="logo" /> <p class="logoText">Компьютерная революция </p>',
        'brandOptions' => ['class' => 'logoWrap pull-left'],
    ]);
    echo Nav::widget([
        'items' => [
            ['label' => 'Новости', 'url' => ['/site/index'], 'class' => 'pull-right'],
            [
                'label' => 'Создать Новость',
                'url' => ['/admin/index'],
                'visible' => !Yii::$app->user->isGuest,
                'class' => 'pull-right'
            ],
            Yii::$app->user->isGuest ? (
            ['label' => 'Авторизоваться', 'url' => ['/user/security/login'], 'class' => 'pull-right']
            ) : (
                '<li>'
                . Html::beginForm(['/user/security/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn nav-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
        'options' => ['class' => 'navbar-nav ml-auto'],
    ]);
    NavBar::end();

    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="left">&copy; My Company <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
