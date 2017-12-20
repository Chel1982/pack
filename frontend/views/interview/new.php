<?php
\frontend\assets\MainAsset::register($this);
\frontend\assets\NewspageAsset::register($this);
?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumbs-inner">
                    <ul>
                        <li><a href="/">Мир Упаковки</a></li>
                        <li>|</li>
                        <li><a href="/interview">Интервью</a></li>
                        <li>|</li>
                        <li><a href="/interview/menu?id=<?= $catNew->id ?>"><?= $catNew->name ?></a></li>
                        <li>|</li>
                        <li class="active-link"><a
                                    href=""><?= \yii\helpers\StringHelper::truncate($new->title, 50) ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-content-inner">
                    <div class="date-link">
                        <?= $catNew->name ?>
                    </div>
                    <div class="news-add-information">
                        <a href="">
                            <div class="date">
                                <?= date('Y-m-d', $new->created_at) ?>
                            </div>
                        </a>
                        <div class="watch">
                            <?= $new->count_view ?>
                        </div>
                    </div>
                    <h1 class="page-content-header">
                        <?= $new->title ?>
                    </h1>
                    <?= $new->description ?>
                    <div class="social-links">
                        <ul>
                            <li class="facebook"><a href="#"></a></li>
                            <li class="twitter"><a href="#"></a></li>
                            <li class="google-plus"><a href="#"></a></li>
                            <li class="vk"><a href="#"></a></li>
                            <li class="print"><a href="#"></a></li>
                        </ul>
                    </div>
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
                    <h1 class="headline">ПОХОЖИЕ ИНТЕРВЬЮ</h1>
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
                <?php foreach ($likeInt as $likeNew): ?>
                    <div class=" col-xs-12">
                        <div class="news-small-post" style="width: 255px; height: 271px">
                            <?php if ($likeNew['general_image'] === null): ?>
                                <a href="/interview/new?id=<?= $likeNew['id'] ?>"
                                   style="width: 255px; height: 138px; overflow: hidden"><img
                                            src="/uploads/interview/nologo.png" style="width: 100%;"></a>
                            <?php else: ?>
                                <a href="/interview/new?id=<?= $likeNew['id'] ?>"
                                   style="width: 255px; height: 138px; overflow: hidden"><img
                                            src="/uploads/interview/<?= $likeNew['id'] ?>/<?= $likeNew['general_image'] ?>"
                                            style="width: 100%;"></a>
                            <?php endif; ?>
                            <div class="news-add-information-small">
                                <a href="">
                                    <div class="date-small">
                                        <?= date('y.m.d', $likeNew['created_at']) ?>
                                    </div>
                                </a>
                                <a href="">
                                    <div class="category-small">
                                        <?= $catNew->name ?>
                                    </div>
                                </a>
                                <div class="watch-small">
                                    <?= $likeNew['count_view'] ?>
                                </div>
                            </div>
                            <a href="">
                                <h1>
                                    <?= \yii\helpers\StringHelper::truncate($likeNew['title'], 50) ?>
                                </h1>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>