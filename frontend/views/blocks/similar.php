<?php
    use yii\helpers\Html;
    use yii\helpers\StringHelper;
?>
<?php if($similas) { ?>
<?php $count = count($similas); ?>
    <div class="partners">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="news-header">
                        <h1 class="headline"><?=$headline;?></h1>
                        <?php if($count > 4){ ?>
                            <div class="news-header-nav">
                                <div class="slider-nav">
                                    <div class="prev-partners-button">

                                    </div>
                                    <div class="next-partners-button">

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="<?=($count > 4?'owl-carousel partners-slider':'partners-no-slider');?>">
                    <?php foreach($similas as $similar) { ?>
                        <div class="<?=($count > 4?'col-xs-12':'col-xs-3');?>">
                            <div class="news-small-post">
                                <?php if($similar->general_image){ ?>
                                    <a href="<?=Yii::$app->getUrlManager()->createUrl([$url_block, 'id' => $similar->id])?>"><?= Html::img('/uploads/'.$folder.'/'.$similar->id.'/'.$similar->general_image, ['alt' => '', 'style' => "width: 262px; height: 142px" ]);?></a>
                                <?php } else { ?>
                                    <a href="<?=Yii::$app->getUrlManager()->createUrl([$url_block, 'id' => $similar->id])?>"><?= Html::img('/uploads/'.$folder.'/nologo.png', ['alt' => '', 'style' => "width: 262px; height: 142px"]);?></a>
                                <?php } ?>
                                <div class="news-add-information-small">
                                    <a href="">
                                        <div class="date-small">
                                            <?= date('y.m.d', $similar->created_at);?>
                                        </div>
                                    </a>
                                    <a href="<?=Yii::$app->getUrlManager()->createUrl([$url_cat, 'id' => $cat->id])?>">
                                        <div class="category-small">
                                            <?= StringHelper::truncate($cat->name, 6);  ?>
                                        </div>
                                    </a>
                                    <div class="watch-small">
                                        1254
                                    </div>
                                </div>
                                <a href="<?=Yii::$app->getUrlManager()->createUrl([$url_block, 'id' => $similar->id])?>">
                                    <h1>
                                        <?php if(isset($similar->title) || isset($similar->name)) { ?>
                                            <?= StringHelper::truncate((isset($similar->title)?$similar->title:$similar->name), 45) ?>
                                        <?php } ?>
                                    </h1>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>