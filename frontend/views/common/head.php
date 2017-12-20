<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;

\frontend\assets\MainAsset::register($this);
?>
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-7 col-xs-7">
                <div class="logo">
                    <a href="/"><img src="/source/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-0 col-xs-0">

                <div class="search-field">

                    <?= Html::beginForm(\yii\helpers\Url::to('/search/index'), 'get',['class' => 'nameclass'])  ?>

                        <?= Html::textInput('news', '', ['placeholder' => 'Поиск по новостям...', 'class' => 'search-one active-search']) ?>

                        <?= Html::textInput('interviews', '', ['placeholder' => 'Поиск по интервью...', 'class' => 'search-two']) ?>

                        <?= Html::textInput('technologies', '', ['placeholder' => 'Поиск по технологиям...', 'class' => 'search-three']) ?>

                        <div class="search-icon">
                            <div class="search-up-down">
                                <a href="javascript:void(0)" class="search-up-icon"><img src="/source/img/prev-arrow.png" alt=""></a>
                                <a href="javascript:void(0)" class="search-down-icon"><img src="/source/img/prev-arrow.png" alt=""></a>
                            </div>
                        </div>

                    <button class="btn btn-primary" style="display: none;">Find Now</button>
                    <?= Html::endForm() ?>
                </div>
            </div>
            <div class="col-lg-2 col-lg-offset-1 col-md-2 col-sm-5 col-xs-5">
                <div class="log-in">
                    <div class="language">
                        <a href="">RU</a>
                        <a href="">en</a>

                        <?php if ($guest = Yii::$app->user->isGuest): ?>
                            <a href="/site/login">Войти</a>

                        <?php elseif (Yii::$app->user->getId() === 37): ?>
                            <?= \yii\widgets\Menu::widget([
                                'options' => ['class' => ''],
                                'items' => [
                                    ['label' => 'Личный кабинет', 'url' => ['/admin/news']],
                                    ['label' => 'Выйти', 'url' => ['/site/logout'], 'template' => '<a href="{url}" data-method="post">{label}</a>'],
                                ],
                            ]);
                            ?>

                        <?php else: ?>
                            <?php echo \yii\widgets\Menu::widget([
                                'options' => ['class' => ''],
                                'items' => [
                                    ['label' => 'Личный кабинет', 'url' => ['/cabinet/company']],
                                    ['label' => 'Выйти', 'url' => ['/site/logout'], 'template' => '<a href="{url}" data-method="post">{label}</a>'],
                                ],
                            ]); ?>
                        <?php endif; ?>
                    </div>
                    <div class="log-button">
                        <?php
                        $menuReg = [];
                        if ($guest) {
                            $menuReg[] = ['label' => 'Регистрация', 'url' => ['/site/signup'], 'linkOptions' => ['class' => 'main-style-button']];
                        }
                        echo Nav::widget([
                            'options' => ['class' => 'language'],
                            'items' => $menuReg,
                        ]);
                        ?>
                    </div>
                </div>
                <div class="hidden-menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav class="main-menu-lg">
    <div class="container">
        <nav class="row">
            <div class="col-md-12 col-lg-12">
                <div class="links">
                    <ul class="menu">
                        <li><a href="/">Главная</a></li>
                        <li><a href="/news">Новости</a></li>
                        <li><a href="/catalog">Каталог</a></li>
                        <li><a href="/technologies">Технологии</a></li>
                        <li><a href="/interview">Инетрвью</a></li>
                        <li class="calendar-menu"><a href="#">Календарь событий</a>
                            <ul class="submenu">
                                <li><a href="/calendar">Календарь</a></li>
                                <li><a href="/calendar/previews">Анонсы</a></li>
                                <li><a href="/calendar/report">Отчеты</a></li>
                            </ul>
                        </li>
                        <li><a href="/magazine">Журнал</a></li>
                        <li><a href="/contacts">Контакты</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</nav>
<div class="hidden-menu-content">
    <div class="close-button">
        <div></div>
        <div></div>
    </div>
    <div class="links-hidden">
        <ul style="margin-top: 25px">
            <li><a href="/">Главная</a></li>
            <li><a href="/news">Новости</a></li>
            <li><a href="/catalog">Каталог</a></li>
            <li><a href="/technologies">Технологии</a></li>
            <li><a href="/interview">Инетрвью</a></li>
            <li><a href="/calendar">Календарь</a></li>
            <li><a href="/calendar/previews">Анонсы</a></li>
            <li><a href="/calendar/report">Отчеты</a></li>
            <li><a href="/magazine">Журнал</a></li>
            <li><a href="/contacts">Контакты</a></li>
        </ul>
    </div>
    <div class="log-in-hidden">
        <div class="language">
            <a href="">RU</a>
            <a href="">en</a>

            <?php if ($guest = Yii::$app->user->isGuest): ?>
                <a href="/site/login">Войти</a>

            <?php elseif (Yii::$app->user->getId() === 37): ?>
                <?= \yii\widgets\Menu::widget([
                    'options' => ['class' => ''],
                    'items' => [
                        ['label' => 'Личный кабинет', 'url' => ['/admin/news']],
                        ['label' => 'Выйти', 'url' => ['/site/logout'], 'template' => '<a href="{url}" data-method="post">{label}</a>'],
                    ],
                ]);
                ?>

            <?php else: ?>
                <?php echo \yii\widgets\Menu::widget([
                    'options' => ['class' => ''],
                    'items' => [
                        ['label' => 'Личный кабинет', 'url' => ['/cabinet/company']],
                        ['label' => 'Выйти', 'url' => ['/site/logout'], 'template' => '<a href="{url}" data-method="post">{label}</a>'],
                    ],
                ]); ?>
            <?php endif; ?>
        </div>
        <div class="log-button-hidden">
            <?php
            $menuReg = [];
            if ($guest) {
                $menuReg[] = ['label' => 'Регистрация', 'url' => ['/site/signup'], 'linkOptions' => ['class' => 'main-style-button']];
            }
            echo Nav::widget([
                'options' => ['class' => 'language'],
                'items' => $menuReg,
            ]);
            ?>
        </div>
    </div>
</div>