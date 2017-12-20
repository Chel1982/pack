<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <meta http-equiv="x-rim-auto-match" content="none">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        //'brandLabel' => 'Мир упаковки',
        'brandLabel' => '',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse ',
        ],
    ]);
    $menuItems = [

/*        ['label' => 'Настройки RBAC', 'url' => ['/rbac/default/index']],*/

        ['label' => 'Мир упаковки', 'url' => ['/']],

        ['label' => 'Баннер Grief', 'url' => ['/admin/bannergrief']],

        ['label' => 'О проекте', 'url' => ['/admin/aboutproject']],

        ['label' => 'Баннер', 'url' => ['/admin/banner']],

        ['label' => 'Наши партнеры', 'url' => ['/admin/partner']],

        ['label' => 'Контакты', 'url' => ['/admin/contacts']],

        ['label' => 'Журнал', 'items' => [
            ['label' => 'Журнал','url' => ['/admin/magazine']],
            ['label' => 'Проплата за журнал','url' => ['/admin/payment']],
        ]],

        ['label' => 'Рассылка', 'url' => ['/admin/subscribe']],

        ['label' => 'Раздел интервью', 'items' => [
            ['label' => 'Интервью', 'url' => ['/admin/interview']],
            ['label' => 'Категории интервью', 'url' => ['/admin/interviewcategories']],
        ]],

        ['label' => 'Календарь', 'items' => [
            ['label' => 'Анонсы', 'url' => ['/admin/calendar-preview']],
            ['label' => 'Отчёты','url' => ['/admin/calendar-reports']],
            ['label' => 'События','url' => ['/admin/calendar']],
        ]],

        ['label' => 'Раздел пользователи', 'items' => [
            ['label' => 'Пользователи','url' => ['/admin/user']],
            ['label' => 'Компании пользователей','url' => ['/admin/company']],
            ['label' => 'Статьи компаний', 'url' => ['/admin/articles']],
            ['label' => 'Продукция компаний', 'url' => ['/admin/prodcompany']],
            ['label' => 'Галерея продукции', 'url' => ['/admin/galeryprod']],
            ['label' => 'Каталог компаний','url' => ['/admin/catalog']],
            ['label' => 'Подкаталог компаний','url' => ['/admin/catalogsubcategories']],
            ['label' => 'Товары компаний','url' => ['/admin/cataloggoods']],
            ['label' => 'Добавить компанию в каталог','url' => ['/admin/companyhascatalog']],
            ['label' => 'Добавить компанию в подкаталог','url' => ['/admin/companyhascatalogsubcategories']],
            ['label' => 'Добавить компанию в товары','url' => ['/admin/companyhascataloggoods']],
        ]],

        ['label' => 'Раздел новости', 'items' => [
            ['label' => 'Новости','url' => ['/admin/news']],
            ['label' => 'Категории новостей','url' => ['/admin/newscategories']]
        ]],

        ['label' => 'Раздел технологии','items' => [
            ['label' => 'Технологии', 'url' => ['/admin/technologies']],
            ['label' => 'Категории технологий', 'url' => ['/admin/technologiescategories']],
        ]],
        //['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
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
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
