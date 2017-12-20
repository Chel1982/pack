<?php
\frontend\assets\MainAsset::register($this);
\frontend\assets\CalendarAsset::register($this);
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
                        <li><a href="/calendar">Календарь событий</a></li>
                        <li>|</li>
                        <li><a href="/calendar/report">Отчеты</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="anons-events">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="headline">АНОНСЫ СОБЫТИЙ</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <?php foreach ($models as $item): ?>
                    <div class="wrapper-post">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-xs-12">
                                <div class="img-anons">
                                    <img src="/source/img/calendar-pic.png">
                                    <p><?= date('d.m.Y', $item['time_spending']) ?></p>
                                    <p><?= $item['count_day'] ?> дня</p>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-10 col-xs-12">
                                <div class="main-content-post">
                                    <h1><a href=""><?= $item['title'] ?></a></h1>
                                    <div class="icons-anons">
                                        <div class="anons-event">
                                            <a href="">
                                                <?= $item['event'] ?>
                                            </a>
                                        </div>
                                        <div class="anons-theme">
                                            <a href="">
                                                <?= $item['exhibition'] ?>
                                            </a>
                                        </div>
                                        <div class="anons-place">
                                            <a href="">
                                                <?= $item['address'] ?>
                                            </a>
                                        </div>
                                    </div>
                                    <p>
                                        <?= \yii\helpers\StringHelper::truncate($item['description'], 300) ?>
                                    </p>
                                    <div style="width: 15em">
                                        <a href="/calendar/preview?id=<?= $item['id'] ?>" class="main-style-button">ПОДРОБНЕЕ</a>
                                    </div>
                                </div>
                            </div>
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
        <div class="partners">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="news-header">
                            <h1 class="headline">НАШИ ПАРТНЕРЫ</h1>
                            <div class="news-header-nav">
                                <div class="slider-nav">
                                    <div class="prev-partners-button">

                                    </div>
                                    <div class="next-partners-button">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="owl-carousel partners-slider">
                        <?php foreach ($partner as $par): ?>
                            <div class=" col-xs-12">
                                <?php if ($par['general_image'] === null): ?>
                                    <img src="/uploads/news/nologo.png" style="width: 255px; height: 160px">
                                <?php else: ?>
                                    <?= yii\helpers\Html::beginTag('a',['href' => $par['site_url'], 'target' => '_blank', 'rel' => 'nofollow']) ?>
                                        <div class="img-carousel-container">
                                            <img class="carousel-img" src="/uploads/partner/<?= $par['id'] ?>/<?= $par['general_image'] ?>">
                                        </div>
                                    <?=  yii\helpers\Html::endTag('a') ?>
                                <?php endif; ?>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>