<?php
\frontend\assets\MainAsset::register($this);
\frontend\assets\MagazineAsset::register($this);
use yii\widgets\LinkPager;
?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumbs-inner">
                    <ul>
                        <li><a href="/">Мир Упаковки</a></li>
                        <li>|</li>
                        <li class="active-link"><a href="/magazine">Журнал</a></li>
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

                    <div class="news-header-nav">
                        <div class="slider-nav">
                            <div class="prev-magazine-button">

                            </div>
                            <div class="next-magazine-button">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-12">

                <div class="magazine-wrapper">

                    <div class="owl-carousel magazine-slider">
                        <?php foreach ($magazine as $item): ?>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="magazine-img">
                                    <img src="/uploads/magazine/<?= $item['id'] ?>/<?= $item['general_image'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="about-this">
                                    <h1>Статьи номера:</h1>
                                    <p><?= $item['description'] ?></p>
                                    <div class="download-button">
                                        <?= yii\helpers\Html::a('PDF-ВЕРСИЯ ЖУРНАЛА', $item['site_url']  , ['class' => 'main-style-button','target' => '_blank', 'rel' => 'nofollow']) ?>
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
                                                <a href="/magazine/payment">Online подписка</a>
                                                <p>на онлайн версию журнала</p>
                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

<div class="history">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="news-header">
                    <h1 class="headline">АРХИВ ЖУРНАЛА “МИР УПАКОВКИ“</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach ($models as $m): ?>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">

                        <div class="history-inner">
                            <a href="/magazine/magazine-one?id=<?= $m['id'] ?>"><img src="/uploads/magazine/<?= $m['id'] ?>/<?= $m['general_image'] ?>"></a>
                            <p><?= date('m/Y', $m['created_at']) ?></p>
                        </div>

                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="bottom-links" style="text-align: center">
                <?php echo LinkPager::widget([
                    'pagination' => $pages,
                    'nextPageLabel' => '<div class="pagination-next"><span>СЛЕДУЮЩАЯ</span></div>',
                    'prevPageLabel' => '<div class="pagination-prev"><span>ПРЕДЫДУЩАЯ</span></div>',
                    'maxButtonCount'=>5,
                    'options' => [
                        'class' => 'pagination',
                    ]
                ]);
                ?>
            </div>
        </div>
    </div>