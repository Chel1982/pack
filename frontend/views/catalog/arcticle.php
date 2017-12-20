<?php
\frontend\assets\MainAsset::register($this);
?>
<div class="wrapper-tabs__post" style="width: 750px; margin-left: 150px">
    <h4 class="tabs_date"><?= date('y.m.d', $arcticle->created_at) ?></h4>
    <h2 class="tabs_heading"><a href=""><?= $arcticle->title ?></a></h2>
    <?= $arcticle->description ?>
</div>

<div class="same-company">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="news-header">
                    <h1 class="headline">Похожие компании</h1>
                    <div class="news-header-nav">

                        <div class="slider-nav">
                            <div class="prev-company-button">

                            </div>
                            <div class="next-company-button">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="owl-carousel same-slider">
                <?php foreach ($company as $comp): ?>
                    <?php if ($comp['general_image']): ?>
                        <div class=" col-xs-12">
                            <div class="img-carousel-container">
                                <a href="/catalog/pro/?id=<?= $comp['id'] ?>">
                                    <img class="carousel-img" src="/uploads/logotype/<?= $comp['general_image'] ?>"
                                         alt="" class="company-img" style="height: 205px">
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>