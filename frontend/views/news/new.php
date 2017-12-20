<?php
\frontend\assets\MainAsset::register($this);
\frontend\assets\NewspageAsset::register($this);
use kartik\social\FacebookPlugin;
?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumbs-inner">
                    <ul>
                        <li><a href="/">Мир Упаковки</a></li>
                        <li>|</li>
                        <li><a href="/news">Новости</a></li>
                        <li>|</li>
                        <li><a href="/news/menu?id=<?= $catNew->id ?>"><?= $catNew->name ?></a></li>
                        <li>|</li>
                        <li class="active-link"><a href=""><?= \yii\helpers\StringHelper::truncate($new->title, 50) ?></a></li>
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
                        <a href=""><div class="date">
                               <?= date('y.m.d', $new->created_at) ?>
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
                            <?php echo FacebookPlugin::widget(['type'=>FacebookPlugin::SHARE, 'settings' => ['size'=>'small', 'layout'=>'button_count', 'mobile_iframe'=>'false']]);?>
                            <!--<li class="facebook"><a href="#"></a></li>
                            <li class="twitter"><a href="#"></a></li>
                            <li class="google-plus"><a href="#"></a></li>-->
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
                    <h1 class="headline">ПОХОЖИЕ НОВОСТИ</h1>
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
                <?php foreach ($likeNews as $likeNew): ?>
                    <div class=" col-xs-12">
                        <div class="news-small-post" style="width: 255px; height: 271px">
                            <?php if($likeNew['general_image'] === null): ?>
                                <a href="/news/new?id=<?= $likeNew['id'] ?>"><img src="/uploads/news/nologo.png" style="width: 255px; height: 138px"></a>
                            <?php else: ?>
                                <a href="/news/new?id=<?= $likeNew['id'] ?>"><img src="/uploads/news/<?= $likeNew['id'] ?>/<?= $likeNew['general_image'] ?>" style="width: 255px; height: 138px"></a>
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
                                    <?= \yii\helpers\StringHelper::truncate($likeNew['title'],50) ?>
                                </h1>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>