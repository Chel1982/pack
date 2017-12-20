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
                        <li><a href="/calendar/previews">Анонсы</a></li>
                        <li>|</li>
                        <li><a href="/calendar/report">Отчеты</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="headline">КАЛЕНДАРЬ СОБЫТИЙ</h1>
        </div>
    </div>
</div>

<div class="calendar">
    <div class="container">
        <div class="row">
                <div class="col-lg-8">
                    <?php foreach ($models as $item): ?>
                    <div class="calendar-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <div class="img-anons-calendar">
                                    <img src="/source/img/calendar-pic.png">
                                    <div class="calendar-date">
                                        <p><?= date('d.m.Y', $item['time_spending']) ?></p>
                                        <p><?= $item['count_day'] ?> дня</p>
                                    </div>
                                </div>
                                <div>
                                    <?php if($item['path_img'] === null): ?>
                                        <a><img src="/uploads/news/nologo.png" style="width: 150px; height: 100px; margin: 10px 0;"></a>
                                    <?php else: ?>
                                        <a><img src="/uploads/calendarlogo/<?= $item['path_img'] ?>" style="width: 150px; height: 100px; margin: 10px 0;"></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-xs-12">
                                <div class="main-content-post">
                                    <?php if ($item['title'] != ''): ?>
                                        <h1>
                                            <a href=""><?= \yii\helpers\StringHelper::truncate($item['title'],50) ?></a>
                                        </h1>
                                    <?php endif; ?>
                                    <?php if ($item['place'] != ''): ?>
                                        <h2>
                                            <?= \yii\helpers\StringHelper::truncate($item['place'],20) ?>
                                        </h2>
                                    <?php endif; ?>
                                    <div class="icons-anons">
                                        <?php if ($item['event'] != ''): ?>
                                            <div class="anons-event">
                                                <a href="">
                                                    <?= \yii\helpers\StringHelper::truncate($item['event'],20) ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($item['exhibition'] != ''): ?>
                                            <div class="anons-theme">
                                                <a href="">
                                                    <?= \yii\helpers\StringHelper::truncate($item['exhibition'],20) ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($item['address']): ?>
                                            <div class="anons-place">
                                                <a href="">
                                                    <?= \yii\helpers\StringHelper::truncate($item['address'],20) ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($item['description'] != ''): ?>
                                        <p>
                                            <?= \yii\helpers\StringHelper::truncate(strip_tags($item['description']), 300) ?>
                                        </p>
                                    <?php endif; ?>
                                    <a href="/calendar/calendar-one?id=<?= $item['id'] ?>" class="more-button-calendar">ПОДРОБНЕЕ</a>
                                    <!--<a href="" class="calendar-button"><img src="/source/img/calendar-pic1.png"></a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            <div class="col-lg-4">
                <div>
                    <?php foreach ($events as $key => $events_month) { ?>
                        <?php
                        if ($key == 0) {
                            $date_month = date("Y-m-d");
                        } else {
                            $date_month = date("Y-m-d", strtotime('first day of -' . $key . ' month'));
                        }
                        ?>
                        <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
                            'events' => $events_month,
                            'options' => [
                                'lang' => 'ru',
                            ],
                            'clientOptions' => [
                                'eventLimit' => true,
                                'fixedWeekCount' => false,
                                'defaultDate' => $date_month,
                            ],
                            'header' => [
                                'center' => 'title',
                                'left' => 'prev',
                                'right' => 'next'
                            ],
                        )); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
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