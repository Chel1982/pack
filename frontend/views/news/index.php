<?php
use yii\widgets\LinkPager;
\frontend\assets\MainAsset::register($this);
\frontend\assets\NewsAsset::register($this);
?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumbs-inner">
                    <ul>
                        <li><a href="">Главная</a></li>
                        <li>|</li>
                        <li class="active-link"><a href="/news">Новости</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="news">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                <div class="news-link">
                    <ul>
                        <?php foreach ($menu as $item): ?>
                            <li><a href="/news/menu?id=<?= $item['id'] ?>"><?= $item['name'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <h1>Подпишитесь
                        на обновления</h1>
                    <div class="news-link-form">
                        <?= \frontend\widgets\SubscribeWidget::widget() ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-7 col-xs-12">
                <div class="row">
                    <?php foreach ($models as $itemN): ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="news-small-post">
                            <?php if($itemN['general_image'] === null): ?>
                                <a href="" style="height: 140px; overflow: hidden;"><img src="/uploads/news/nologo.png"></a>
                            <?php else: ?>
                                <a href="" style="height: 140px; overflow: hidden;"><img src="/uploads/news/<?= $itemN['id'] ?>/<?= $itemN['general_image'] ?>" style="width: 262px; height: 142px">></a>
                            <?php endif; ?>
                            <div class="news-add-information-small">
                                <a href="">
                                    <div class="date-small">
                                        <?= date('y.m.d', $itemN['created_at'])  ?>
                                    </div>
                                </a>
                                <a href="">
                                    <div class="category-small">
                                        <?php foreach ($menu as $item): ?>
                                            <?php if ($item['id'] == $itemN['news_categories_id']): ?>
                                                <?= \yii\helpers\StringHelper::truncate($item['name'], 6);  ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </a>
                                <div class="watch-small">
                                    <?= $itemN['count_view'] ?>
                                </div>
                            </div>
                            <a href="/news/new?id=<?= $itemN['id'] ?>">
                                <h1>
                                    <?= \yii\helpers\StringHelper::truncate($itemN['title'], 45) ?>
                                </h1>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bottom-links">
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
            </div>
        </div>
    </div>
</div>

