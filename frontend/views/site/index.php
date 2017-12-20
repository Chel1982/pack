<?php
\frontend\assets\MainAsset::register($this);
?>
<div class="main-banner">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="main-banner-inner">
                    <h1>УКРАИНСКИЙ ПОРТАЛ УПАКОВОЧНОЙ ОТРАСЛИ</h1>
                    <h4>Добро пожаловать в мир <span>ПЕРВОКЛАССНЫХ</span> упаковочных решений</h4>
                    <a href="/catalog" class="main-style-button">Каталог</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="news">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="news-header">
                    <h1 class="headline">Новости</h1>
                    <div class="news-header-nav">
                        <a href="/news" class="main-style-button">
                            показать все
                        </a>
                        <div class="slider-nav">
                            <div class="prev-news-button">

                            </div>
                            <div class="next-news-button">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel news-slider">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="news-big-post">
                        <?php if ($newsLast->general_image === null): ?>
                            <div style="height: 300px; overflow: hidden; display: flex; flex-direction: column; justify-content: center">
                                <a href="/news/new?id=<?= $newsLast->id ?>"><img src="/uploads/news/nologo.png"></a>
                            </div>
                        <?php else: ?>
                            <div style="height: 300px; overflow: hidden; display: flex; justify-content: center; flex-direction: column;">
                                <a href="/news/new?id=<?= $newsLast->id ?>">
                                    <img src="/uploads/news/<?= $newsLast->id ?>/<?= $newsLast->general_image ?>"
                                         style="margin: 0 auto;"></a>
                            </div>
                        <?php endif; ?>
                        <div class="news-add-information">
                            <div class="date">
                                <?= date('y.m.d', $newsLast->created_at) ?>
                            </div>
                            <?php foreach ($newCat as $nc): ?>
                                <?php if ($newsLast->news_categories_id === $nc['id']): ?>
                                    <a href="/news/menu?id=<?= $nc['id'] ?>">
                                        <div class="category">
                                            <div class="category">
                                                <?= \yii\helpers\StringHelper::truncate(strip_tags($nc['name']), 20) ?>
                                            </div>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="watch">
                                <?= $newsLast->count_view ?>
                            </div>
                        </div>
                        <a href="/news/new?id=<?= $newsLast->id ?>">
                            <h1>
                                <?= \yii\helpers\StringHelper::truncate(strip_tags($newsLast->title), 75) ?>
                            </h1>
                        </a>
                        <p>
                            <?= \yii\helpers\StringHelper::truncate(strip_tags($newsLast->description), 150) ?>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div style="display: flex; justify-content: space-around; flex-direction: column;">
                        <?php foreach ($newsL as $nL): ?>
                            <div class="news-small-post small-post-md">

                                <?php if ($nL['general_image'] === null): ?>
                                    <a href="/news/new?id=<?= $nL['id'] ?>"
                                       style="width: 262px; height: 142px; overflow: hidden"><img
                                                src="/uploads/news/nologo.png"></a>
                                <?php else: ?>
                                    <a href="/news/new?id=<?= $nL['id'] ?>"
                                       style="width: 262px; height: 142px; overflow: hidden"><img
                                                src="/uploads/news/<?= $nL['id'] ?>/<?= $nL['general_image'] ?>"></a>
                                <?php endif; ?>

                                <div class="news-add-information-small">

                                    <div class="date-small">
                                        <?= date('y.m.d', $nL['created_at']) ?>
                                    </div>

                                    <?php foreach ($newCat as $nc): ?>
                                        <?php if ($nL['news_categories_id'] === $nc['id']): ?>
                                            <a href="/news/menu?id=<?= $nc['id'] ?>">
                                                <div class="category-small">
                                                    <?= \yii\helpers\StringHelper::truncate(strip_tags($nc['name']), 20) ?>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="watch-small">
                                        <?= $nL['count_view'] ?>
                                    </div>
                                </div>
                                <a href="/news/new?id=<?= $nL['id'] ?>">
                                    <h1>
                                        <?= \yii\helpers\StringHelper::truncate(strip_tags($nL['title']), 40) ?>
                                    </h1>
                                </a>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>


                <div class="col-lg-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="news-banner" style="overflow: hidden;">
                        <?php if ($bannerGriefOne->general_image === null): ?>
                            <a href="/news/new?id=<?= $bannerGriefOne->id ?>"><img src="/uploads/news/nologo.png"></a>
                        <?php else: ?>
                            <a href="/news/new?id=<?= $bannerGriefOne->id ?>"><img
                                        src="/uploads/bannergrief/<?= $bannerGriefOne->id ?>/<?= $bannerGriefOne->general_image ?>"></a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="news-big-post">
                        <?php if ($newsFour->general_image === null): ?>
                            <div style="height: 300px; overflow: hidden; display: flex; flex-direction: column; justify-content: center">
                                <a href="/news/new?id=<?= $newsFour->id ?>"><img src="/uploads/news/nologo.png"></a>
                            </div>
                        <?php else: ?>
                            <div style="height: 300px; overflow: hidden; display: flex; justify-content: center; flex-direction: column;">
                                <a href="/news/new?id=<?= $newsFour->id ?>"><img
                                            src="/uploads/news/<?= $newsFour->id ?>/<?= $newsFour->general_image ?>"
                                            style="margin: 0 auto;"></a>
                            </div>
                        <?php endif; ?>
                        <div class="news-add-information">
                            <a href="">
                                <div class="date">
                                    <?= date('y.m.d', $newsFour->created_at) ?>
                                </div>
                            </a>
                            <a href="/news/menu?id=<?= $nc['id'] ?>">
                                <div class="category">
                                    <div class="category">
                                        <?php foreach ($newCat as $nc): ?>
                                            <?php if ($newsFour->news_categories_id === $nc['id']): ?>
                                                <?= \yii\helpers\StringHelper::truncate(strip_tags($nc['name']), 20) ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </a>
                            <div class="watch">
                                <?= $newsFour->count_view ?>
                            </div>
                        </div>
                        <a href="/news/new?id=<?= $newsFour->id ?>">
                            <h1>
                                <?= \yii\helpers\StringHelper::truncate(strip_tags($newsFour->title), 75) ?>
                            </h1>
                        </a>
                        <p>
                            <?= \yii\helpers\StringHelper::truncate(strip_tags($newsFour->description), 150) ?>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div style="display: flex; justify-content: space-around; flex-direction: column;">
                        <?php foreach ($newsF as $nF): ?>
                            <div class="news-small-post small-post-md">

                                <?php if ($nF['general_image'] === null): ?>
                                    <a href="/news/new?id=<?= $nF['id'] ?>"
                                       style="width: 262px; height: 142px; overflow: hidden"><img
                                                src="/uploads/news/nologo.png"></a>
                                <?php else: ?>
                                    <a href="/news/new?id=<?= $nF['id'] ?>"
                                       style="width: 262px; height: 142px; overflow: hidden"><img
                                                src="/uploads/news/<?= $nF['id'] ?>/<?= $nF['general_image'] ?>"></a>
                                <?php endif; ?>

                                <div class="news-add-information-small">
                                    <a href="">
                                        <div class="date-small">
                                            <?= date('y.m.d', $nF['created_at']) ?>
                                        </div>
                                    </a>
                                    <?php foreach ($newCat as $nc): ?>
                                        <?php if ($nF['news_categories_id'] === $nc['id']): ?>
                                            <a href="/news/menu?id=<?= $nc['id'] ?>">
                                                <div class="category-small">
                                                    <?= \yii\helpers\StringHelper::truncate(strip_tags($nc['name']), 20) ?>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="watch-small">
                                        <?= $nF['count_view'] ?>
                                    </div>
                                </div>
                                <a href="/news/new?id=<?= $nF['id'] ?>">
                                    <h1>
                                        <?= \yii\helpers\StringHelper::truncate(strip_tags($nF['title']), 40) ?>
                                    </h1>
                                </a>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-lg-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="news-banner" style="overflow: hidden;">
                        <?php if ($bannerGriefTwo->general_image === null): ?>
                            <a href="/news/new?id=<?= $bannerGriefTwo->id ?>"><img src="/uploads/news/nologo.png"></a>
                        <?php else: ?>
                            <a href="/news/new?id=<?= $bannerGriefTwo->id ?>"><img
                                        src="/uploads/bannergrief/<?= $bannerGriefTwo->id ?>/<?= $bannerGriefOne->general_image ?>"></a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="news-big-post">
                        <?php if ($newsSeven->general_image === null): ?>
                            <div style="height: 300px; overflow: hidden; display: flex; flex-direction: column; justify-content: center">
                                <a href="/news/new?id=<?= $newsSeven->id ?>"><img src="/uploads/news/nologo.png"></a>
                            </div>
                        <?php else: ?>
                            <div style="height: 300px; overflow: hidden; display: flex; justify-content: center; flex-direction: column;">
                                <a href="/news/new?id=<?= $newsSeven->id ?>"><img
                                            src="/uploads/news/<?= $newsSeven->id ?>/<?= $newsSeven->general_image ?>"
                                            style="margin: 0 auto;"></a>
                            </div>
                        <?php endif; ?>
                        <div class="news-add-information">
                            <a href="">
                                <div class="date">
                                    <?= date('y.m.d', $newsSeven->created_at) ?>
                                </div>
                            </a>
                            <a href="/news/menu?id=<?= $nc['id'] ?>">
                                <div class="category">
                                    <div class="category">
                                        <?php foreach ($newCat as $nc): ?>
                                            <?php if ($newsSeven->news_categories_id === $nc['id']): ?>
                                                <?= \yii\helpers\StringHelper::truncate(strip_tags($nc['name']), 20) ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </a>
                            <div class="watch">
                                <?= $newsSeven->count_view ?>
                            </div>
                        </div>
                        <a href="/news/new?id=<?= $newsSeven->id ?>">
                            <h1>
                                <?= \yii\helpers\StringHelper::truncate(strip_tags($newsSeven->title), 75) ?>
                            </h1>
                        </a>
                        <p>
                            <?= \yii\helpers\StringHelper::truncate(strip_tags($newsSeven->description), 150) ?>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div style="display: flex; justify-content: space-around; flex-direction: column;">
                        <?php foreach ($newsS as $nS): ?>
                            <div class="news-small-post small-post-md">

                                <?php if ($nS['general_image'] === null): ?>
                                    <a href="/news/new?id=<?= $nS['id'] ?>"
                                       style="width: 262px; height: 142px; overflow: hidden"><img
                                                src="/uploads/news/nologo.png"></a>
                                <?php else: ?>
                                    <a href="/news/new?id=<?= $nS['id'] ?>"
                                       style="width: 262px; height: 142px; overflow: hidden"><img
                                                src="/uploads/news/<?= $nS['id'] ?>/<?= $nS['general_image'] ?>"></a>
                                <?php endif; ?>

                                <div class="news-add-information-small">
                                    <a href="">
                                        <div class="date-small">
                                            <?= date('y.m.d', $nS['created_at']) ?>
                                        </div>
                                    </a>
                                    <?php foreach ($newCat as $nc): ?>
                                        <?php if ($nS['news_categories_id'] === $nc['id']): ?>
                                            <a href="/news/menu?id=<?= $nc['id'] ?>">
                                                <div class="category-small">
                                                    <?= \yii\helpers\StringHelper::truncate(strip_tags($nc['name']), 20) ?>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="watch-small">
                                        <?= $nS['count_view'] ?>
                                    </div>
                                </div>
                                <a href="/news/new?id=<?= $nS['id'] ?>">
                                    <h1>
                                        <?= \yii\helpers\StringHelper::truncate(strip_tags($nS['title']), 40) ?>
                                    </h1>
                                </a>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-lg-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="news-banner" style="overflow: hidden;">
                        <?php if ($bannerGriefThree->general_image === null): ?>
                            <a href="/news/new?id=<?= $bannerGriefThree->id ?>"><img src="/uploads/news/nologo.png"></a>
                        <?php else: ?>
                            <a href="/news/new?id=<?= $bannerGriefThree->id ?>"><img
                                        src="/uploads/bannergrief/<?= $bannerGriefThree->id ?>/<?= $bannerGriefOne->general_image ?>"></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="list-banner">
    <div class="container">
        <div class="row">
            <div class="owl-carousel partners-slider">
                <?php foreach ($partner as $par): ?>
                    <div class=" col-xs-12">
                        <?php if ($par['general_image'] === ''): ?>
                            <img src="/uploads/news/nologo.png" style="width: 255px; height: 160px">
                        <?php else: ?>
                            <?= yii\helpers\Html::beginTag('a', ['href' => $par['site_url'], 'target' => '_blank', 'rel' => 'nofollow']) ?>
                            <div class="img-carousel-container">
                                <img class="carousel-img"
                                     src="/uploads/partner/<?= $par['id'] ?>/<?= $par['general_image'] ?>">
                            </div>
                            <?= yii\helpers\Html::endTag('a') ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="events">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="event">
                    <h1 class="headline">события</h1>
                    <div class="wrapper-event">
                        <div>
                            <?php foreach ($calendarSite as $cal): ?>
                                <a href="/calendar/calendar-one?id=<?= $cal['id'] ?>">
                                    <div class="event-inner">
                                        <div>
                                            <?php if ($cal['path_img'] === ''): ?>
                                                <a href="/calendar/calendar-one?id=<?= $cal['id'] ?>"><img
                                                            src="/uploads/news/nologo.png"
                                                            style="width: 150px; height: 100px; margin: 10px 0;"></a>
                                            <?php else: ?>
                                                <a class="background-properties"
                                                   style="width: 100px; height: 100px; margin: 10px 0;background-image: url(../uploads/calendarlogo/<?= $cal['path_img'] ?>);"
                                                   href="/calendar/calendar-one?id=<?= $cal['id'] ?>"></a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="event-inner-text">
                                            <div>
                                                <h4 class="event-date">
                                                    Начало: <?= date('y.m.d', $cal['time_spending']) ?>
                                                </h4>
                                                <h3><?= \yii\helpers\StringHelper::truncate(strip_tags($cal['title']), 12) ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="all-inforamtion-btn">
                            <div class="all-inforamtion">
                                <a href="/calendar">все события</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="future-events">
                    <h1 class="headline">АНОНСЫ</h1>
                    <div class="wrapper-future-events">
                        <div>
                            <?php foreach ($calPreview as $prev): ?>
                                <div class="future-events-information">
                                    <a href="/calendar/preview?id=<?= $prev['id'] ?>"><h1>
                                            <?= \yii\helpers\StringHelper::truncate(strip_tags($prev['title']), 50) ?>
                                        </h1>
                                    </a>
                                    <p><?= \yii\helpers\StringHelper::truncate(strip_tags($prev['description']), 50) ?></p>
                                    <div></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="all-inforamtion-btn">
                            <div class="all-inforamtion">
                                <a href="/calendar/previews">все анонсы</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h1 class="headline">Календарь</h1>
                <div class="calenadar-container">
                    <div class="calenadar">
                        <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
                            'events' => $events,
                            'options' => [
                                'lang' => 'ru',
                            ],
                            'clientOptions' => [
                                'eventLimit' => true,
                                'fixedWeekCount' => false,
                                'editable' => true,

                            ],
                            'header' => [
                                'center' => 'title',
                                'left' => 'prev',
                                'right' => 'next'
                            ]
                        )); ?>
                    </div>
                    <div class="all-inforamtion-btn">
                        <div class="all-inforamtion" style="margin-left: 30px;">
                            <a href="/calendar">весь календарь</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="catalog">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="news-header">
                    <h1 class="headline">Каталог</h1>
                    <div class="news-header-nav">
                        <a href="/catalog" class="main-style-button">
                            весь каталог
                        </a>
                        <div class="slider-nav">
                            <div class="prev-catalog-button">

                            </div>
                            <div class="next-catalog-button">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="wrapper-catalog">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <div class="catalog-header">
                                <h1>Поиск по категориям</h1>
                                <p>
                                    Более 1 000 компаний собраны в одном месте
                                </p>
                            </div>
                        </div>
                        <?php if (\Yii::$app->user->isGuest): ?>
                            <div class="col-lg-4 col-lg-offset-3 col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                                <div class="add-company">
                                    <a href="/site/signup" class="main-style-button">ЗАРЕГИСТРИРОВАТЬ КОМПАНИЮ</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="owl-carousel catalog-slider">
                            <?php foreach ($catalog as $cat): ?>
                                <div class=" col-xs-12">
                                    <a href="/catalog/menu?idCat=<?= $cat['id'] ?>">
                                        <div class="catalog-set catalog-set-1">
                                            <figure class="catalog-set-img">
                                                <img src="/uploads/catalog/<?= $cat['general_image'] ?>">
                                                <figcaption class="catalog-set-title">
                                                    <h1><?= \yii\helpers\StringHelper::truncate(strip_tags($cat['name'], 50)) ?></h1>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="interview">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="news-header">
                        <h1 class="headline">интревью</h1>
                        <div class="news-header-nav">
                            <a href="/interview" class="main-style-button">
                                показать все
                            </a>
                            <div class="slider-nav">
                                <div class="prev-interview-button">

                                </div>
                                <div class="next-interview-button">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="wrapper-interview">
                        <div class="row">
                            <div class="owl-carousel interview-slider">
                                <?php foreach ($interview as $int): ?>
                                    <div class=" col-xs-12">
                                        <a href="interview/new?id=<?= $int['id'] ?>">
                                            <div class="person">
                                                <div style="width: 250px; max-height: 106px; overflow: hidden">
                                                    <img src="/uploads/interview/<?= $int['id'] ?>/<?= $int['general_image'] ?>"
                                                         alt="">
                                                </div>
                                                <div class="person-information">
                                                    <h1><?= \yii\helpers\StringHelper::truncate(strip_tags($int['author']), 19) ?></h1>
                                                    <p><?= \yii\helpers\StringHelper::truncate(strip_tags($int['position']), 20) ?></p>
                                                    <p style="font-family: OpenSansRegular; font-size: 14px; border-bottom-color: rgba(0, 0, 0, 0)"><?= \yii\helpers\StringHelper::truncate(strip_tags($int['title']), 35) ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="technology">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="news-header">
                        <h1 class="headline">технологии</h1>
                        <div class="news-header-nav">
                            <a href="/technologies" class="main-style-button">
                                показать все
                            </a>
                            <div class="slider-nav">
                                <div class="prev-technology-button">

                                </div>
                                <div class="next-technology-button">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel technology-slider">
                    <?php foreach ($technologies as $tech): ?>
                        <div class=" col-xs-12">
                            <a href="/technologies/technology?id=<?= $tech['id'] ?> ">
                                <div class="technology-big-post">
                                    <img src="/uploads/technologies/<?= $tech['id'] ?>/<?= $tech['general_image'] ?>">
                                    <div class="technology-add-information">
                                        <div class="date">
                                            <?= date('y.m.d', $tech['created_at']) ?>
                                        </div>
                                        <div class="watch">
                                            <?= $tech['count_view'] ?>
                                        </div>
                                    </div>
                                    <h1><?= \yii\helpers\StringHelper::truncate(strip_tags($tech['name']), 150) ?></h1>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="magazine">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="news-header">
                        <h1 class="headline">ЖУРНАЛ “МИР УПАКОВКИ“</h1>
                        <div class="news-header-nav">
                            <a href="/magazine" class="main-style-button fix-padding-magazine">
                                архив
                            </a>
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
                            <?php foreach ($magazine as $mag): ?>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="magazine-img">
                                            <img src="/uploads/magazine/<?= $mag['id'] ?>/<?= $mag['general_image'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="about-this">
                                            <h1>В этом выпуске:</h1>
                                            <p><?= \yii\helpers\StringHelper::truncate(strip_tags($mag['description']), 300) ?></p>
                                            <div class="download-button">
                                                <?= yii\helpers\Html::a('PDF-ВЕРСИЯ ЖУРНАЛА', $mag['site_url'], ['class' => 'main-style-button', 'target' => '_blank', 'rel' => 'nofollow']) ?>
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
                            <?php if ($par['general_image'] === ''): ?>
                                <img src="/uploads/news/nologo.png" style="width: 255px; height: 160px">
                            <?php else: ?>
                                <?= yii\helpers\Html::beginTag('a', ['href' => $par['site_url'], 'target' => '_blank', 'rel' => 'nofollow']) ?>
                                    <div class="img-carousel-container">
                                        <img class="carousel-img"
                                             src="/uploads/partner/<?= $par['id'] ?>/<?= $par['general_image'] ?>">
                                    </div>
                                <?= yii\helpers\Html::endTag('a') ?>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>