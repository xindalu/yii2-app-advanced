<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Carousel;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => Yii::t('common', 'home'), 'url' => ['/site/index']],
        ['label' => Yii::t('common', 'about'), 'url' => ['/site/about']],
        ['label' => Yii::t('common', 'contact'), 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('common', 'signup'), 'url' => ['/site/signup']];
        $menuItems[] = ['label' => Yii::t('common', 'login'), 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                Yii::t('common', 'logout') . ' (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    $menuItems[] = [
        'label' => Yii::t('common', 'lang_' . strtolower(Yii::$app->session['language'] ?: 'zh_cn')),
        'items' => [
            ['label' => Yii::t('common', 'lang_zh_cn'), 'url' => '/site/language?lang=zh_CN'],
            ['label' => Yii::t('common', 'lang_en'), 'url' => '/site/language?lang=en'],
        ],
    ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    <?= Carousel::widget([
        'options' => [
            'class' => 'home-carousel slide',
        ],
        'controls' => [
            '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span>',
            '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span>',
        ],
        'items' => [
            [
                'content' => '<img src="' . Url::to('@web/images/head-bg.svg') . '"/>',
                'caption' => '<h1>Example headline.</h1>
                              <p>Note: If you\'re viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>',
            ],
            [
                'content' => '<img src="' . Url::to('@web/images/head-bg.svg') . '"/>',
                'caption' => '<h1>Another example headline.</h1>
                              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>',
            ],
            [
                'content' => '<img src="' . Url::to('@web/images/head-bg.svg') . '"/>',
                'caption' => '<h1>One more for good measure.</h1>
                              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>',
            ],
        ],
    ]) ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
        <?= Alert::widget() ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
