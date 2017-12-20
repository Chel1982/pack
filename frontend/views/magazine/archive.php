<?php
use yii\widgets\LinkPager;

\frontend\assets\MainAsset::register($this);
\frontend\assets\MagazineAsset::register($this);
?>
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
                        <a href="/magazine/magazine-one?id=<?= $m['id'] ?>"><img
                                    src="/uploads/magazine/<?= $m['id'] ?>/<?= $m['general_image'] ?>"
                                    style="width: 260px; height: 355px"></a>
                        <p><?= date('m/Y', $m['created_at']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="bottom-links" style="text-align: center">
                    <?php echo LinkPager::widget([
                        'pagination' => $pages,
                        'nextPageLabel' => '<div class="pagination-next"><span>СЛЕДУЮЩАЯ</span></div>',
                        'prevPageLabel' => '<div class="pagination-prev"><span>ПРЕДЫДУЩАЯ</span></div>',
                        'maxButtonCount' => 5,
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