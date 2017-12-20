<?php
\frontend\assets\MainAsset::register($this);
\frontend\assets\MagazineAsset::register($this);
?>
<?php /*\yii\widgets\Pjax::begin(); */ ?>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs-inner">
                        <ul>
                            <li><a href="/">Мир Упаковки</a></li>
                            <li>|</li>
                            <li><a href="/magazine">Журнал</a></li>
                            <li>|</li>
                            <li class="active-link"><a href=""><?= $magazine->title ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="magazine">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="news-header">
                        <h1 class="headline"><?= $magazine->title ?></h1>
                        <div class="news-header-nav">
                            <div class="slider-nav">
                                <?= yii\helpers\Html::a("", ['/magazine/magazine-one', 'id' =>  $id + 1], ['class' => 'prev-magazine-button']); ?>
                                <!--<div class="prev-magazine-button">-->

                            </div>
                            <?= yii\helpers\Html::a("", ['/magazine/magazine-one', 'id' =>  $id - 1], ['class' => 'next-magazine-button']); ?>

                            <!--<div class="next-magazine-button"></div>-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="magazine-wrapper">
                        <div class="owl-carousel magazine-slider">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="magazine-img">
                                        <img src="/uploads/magazine/<?= $magazine->id ?>/<?= $magazine->general_image ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="about-this">
                                        <h1>Статьи номера:</h1>
                                        <?= $magazine->description ?>
                                        <div class="download-button">
                                            <?= yii\helpers\Html::a('PDF-ВЕРСИЯ ЖУРНАЛА', $magazine->site_url , ['class' => 'main-style-button','target' => '_blank', 'rel' => 'nofollow']) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="buy-magazine">
                                        <ul>
                                            <li class="out-block">
                                                <div class="buy-inner shop">
                                                    <a href="/magazine/payment">Купить</a>
                                                    <p>печатную версию</p>
                                                </div>
                                            </li>
                                            <li class="out-block">

                                                <div class="buy-inner printer">
                                                    <a href="/magazine/payment">Online подписка</a>
                                                    <p>на печатную версию</p>
                                                </div>
                                            </li>
                                            <li class="out-block">

                                                <div class="buy-inner magz">
                                                    <?= yii\helpers\Html::a('Online подписка', $magazine->site_url  , ['target' => '_blank', 'rel' => 'nofollow']) ?>
                                                    <p>на онлайн версию журнала</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php /*\yii\widgets\Pjax::end(); */ ?>