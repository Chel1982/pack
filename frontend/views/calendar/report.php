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
                        <li><a href="/calendar/previews">Анонсы</a></li>
                    </ul>
                </div>
            </div>
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
                                        <p><?= date('d.m.Y',$item['created_at']) ?></p>
                                    </div>
                                </div>
                                <div>
                                    <?php if($item['general_image'] === ''): ?>
                                        <a><img src="/uploads/news/nologo.png" style="width: 150px; height: 100px; margin: 10px 0;"></a>
                                    <?php else: ?>
                                        <a><img src="/uploads/calendarreports/<?= $item['general_image'] ?>" style="width: 150px; height: 100px; margin: 10px 0;"></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-xs-12">
                                <div class="main-content-post">
                                    <h1><a href=""><?= $item['title'] ?></a></h1>
                                    <p>
                                        <?= \yii\helpers\StringHelper::truncate(strip_tags($item['description']),600) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-4"></div>
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