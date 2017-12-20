<?php
use yii\widgets\LinkPager;
\frontend\assets\MainAsset::register($this);
\frontend\assets\NewsAsset::register($this);
?>
<?php if(!$modelNews && !$modelInter && !$modelTech): ?>
    <p>Извените, ничего не найдено</p>
<?php endif; ?>

<?php if($modelNews): ?>
    <div class="news">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <?php foreach ($modelNews as $itemN): ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-10">
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
                                            <?php foreach ($menuNews as $item): ?>
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
                                'pagination' => $pagesNews,
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
<?php endif; ?>

<?php if ($modelInter): ?>
    <div class="news">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <?php foreach ($modelInter as $itemN): ?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-10">
                                <div class="news-small-post" style="min-height: 288px;">
                                    <?php if($itemN['general_image'] === null): ?>
                                        <a href="/interview/new?id=<?= $itemN['id'] ?>"><img src="/uploads/interview/nologo.png" style="width: 262px; height: 142px"></a>
                                    <?php else: ?>
                                        <a href="/interview/new?id=<?= $itemN['id'] ?>" style="height: 140px; overflow: hidden"><img src="/uploads/interview/<?= $itemN['id'] ?>/<?= $itemN['general_image'] ?>" ></a>
                                    <?php endif; ?>
                                    <div class="news-add-information-small">
                                        <a href="">
                                            <div class="date-small">
                                                <?= date('y.m.d', $itemN['created_at'])  ?>
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="category-small">
                                                <?php foreach ($menuInter as $item): ?>
                                                    <?php if ($item['id'] == $itemN['interview_categories_id']): ?>
                                                        <?= \yii\helpers\StringHelper::truncate($item['name'], 6);  ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </a>
                                        <div class="watch-small">
                                            <?= $itemN['count_view'] ?>
                                        </div>
                                    </div>
                                    <a href="/interview/new?id=<?= $itemN['id'] ?>">
                                        <h1><?= \yii\helpers\StringHelper::truncate($itemN['title'], 65) ?>
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
                                    'pagination' => $pagesInter,
                                    'nextPageLabel' => 'СЛЕДУЮЩАЯ',
                                    'prevPageLabel' => 'ПРЕДЫДУЩАЯ',
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
<?php endif; ?>

<?php if($modelTech): ?>
    <div class="news">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <?php foreach ($modelTech as $itemN): ?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-10">
                                <div class="news-small-post" style="min-height: 288px;">
                                    <?php if($itemN['general_image'] === null): ?>
                                        <a href=""><img src="/uploads/technologies/nologo.png" style="width: 262px; height: 142px"></a>
                                    <?php else: ?>
                                        <a href=""><img src="/uploads/technologies/<?= $itemN['id'] ?>/<?= $itemN['general_image'] ?>" ></a>
                                    <?php endif; ?>
                                    <div class="news-add-information-small">
                                        <a href="">
                                            <div class="date-small">
                                                <?= date('y.m.d', $itemN['created_at'])  ?>
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="category-small">
                                                <?php foreach ($menuTech as $item): ?>
                                                    <?php if ($item['id'] == $itemN['technologies_categories_id']): ?>
                                                        <?= \yii\helpers\StringHelper::truncate($item['name'], 6);  ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </a>
                                        <div class="watch-small">
                                            <?= $itemN['count_view'] ?>
                                        </div>
                                    </div>
                                    <a href="/technologies/technology?id=<?= $itemN['id'] ?>">
                                        <h1>
                                            <?= \yii\helpers\StringHelper::truncate($itemN['name'], 45) ?>
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
                                    'pagination' => $pagesTech,
                                    'nextPageLabel' => 'СЛЕДУЮЩАЯ',
                                    'prevPageLabel' => 'ПРЕДЫДУЩАЯ',
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
<?php endif; ?>

