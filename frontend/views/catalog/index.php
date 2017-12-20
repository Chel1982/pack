<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;

\frontend\assets\MainAsset::register($this);
\frontend\assets\CatalogAsset::register($this);
use kartik\rating\StarRating;

?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumbs-inner">
                    <ul>
                        <li><a href="/">Мир Упаковки</a></li>
                        <li>|</li>
                        <li><a href="/catalog">Каталог</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="news">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                <div class="news-link">
                    <div class="search-field-catalog">
                        <h2>Поиск по каталогу</h2>
                        <?= Html::beginForm(\yii\helpers\Url::to('/catalog/find'), 'get') ?>
                            <?= Html::textInput('company', '', ['placeholder' => 'Введите необходимое название']) ?>
                        <?= Html::endForm() ?>
                    </div>
                    <?php if (isset($cat)): ?>
                        <?php foreach ($cat as $c): ?>
                            <div class="accordion-cat-container">
                                <a class="accordion-cat"
                                   href="/catalog/menu?idCat=<?= $c['id'] ?>"><?= $c['name'] ?></a>
                                <button class="accordion"></button>
                                <div class="panel">
                                    <ul>
                                        <?php foreach ($sub as $s): ?>
                                            <?php if ($c['id'] === $s['catalog_id']): ?>
                                                <li>
                                                    <a href="/catalog/menu?idSub=<?= $s['id'] ?> "><?= $s['name'] ?></a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <!--<div class="panel">
                                <ul>
                                    <?php /*foreach ($sub as $s): */?>
                                        <?php /*if ($c['id'] === $s['catalog_id']): */?>
                                            <li>
                                                <a href="/catalog/menu?idSub=<?/*= $s['id'] */?> "><?/*= $s['name'] */?></a>
                                            </li>
                                        <?php /*endif; */?>
                                    <?php /*endforeach; */?>
                                </ul>
                            </div>-->
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if ($guest = Yii::$app->user->isGuest): ?>
                        <h1>Добавить сюда компанию</h1>
                        <h2 class="more-client">Хотите получать больше клиентов?
                            Оставьте заявку</h2>
                        <div class="news-link-form">
                            <a href="/site/signup" class="main-style-button">ДОБАВИТЬ КОМПАНИЮ</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                <div class="catalog-content">
                    <div class="top">
                        <h1>Найдено <span><?= $countCompany ?></span> компаний</h1>
                        <?php if ($guest = Yii::$app->user->isGuest): ?>
                            <a href="/site/signup" class="main-style-button">Добавить компанию</a>
                        <?php endif; ?>
                    </div>

                    <?php foreach ($models as $model): ?>

                        <div class="catalog-content-post">
                            <div class="img">
                                <?php if ($model['general_image'] == ''): ?>
                                    <div class="img-container">
                                        <img src="/uploads/logotype/nologo.png" alt="">
                                    </div>
                                <?php elseif ($model['status'] == 2): ?>
                                    <div class="img-container"
                                         style="width: 70%; min-height: 100px; height: 60%; margin: 0 auto;">
                                        <img style="width: 60%;" src="/uploads/logotype/<?= $model['general_image'] ?>"
                                             alt="">
                                    </div>
                                <?php elseif ($model['status'] == 3): ?>
                                    <div class="img-container">
                                        <img src="/uploads/logotype/<?= $model['general_image'] ?>" alt="">
                                    </div>
                                <?php elseif ($model['status'] == 1): ?>
                                    <div class="img-container">
                                        <img src="/uploads/logotype/nologo.png" alt="">
                                    </div>
                                <?php endif; ?>
                                <?php if ($model['status'] == 3): ?>
                                    <div class="top-button">
                                        <a href="">VIP</a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($model['status'] == 2): ?>
                                    <div class="top-button pro">
                                        <a href="">PRO</a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($model['status'] == 1): ?>
                                    <div class="top-button start">
                                        <a href="">start</a>
                                    </div>
                                <?php endif; ?>
                                <div class="triangle"></div>
                            </div>
                            <div class="text">
                                <h1><a href="/catalog/pro?id=<?= $model['id'] ?>"
                                       style="color: inherit;"><?= \yii\helpers\StringHelper::truncate($model['company_name'], 200) ?></a>
                                </h1>
                                <div>
                                    <?= StarRating::widget([
                                        'name' => 'rating_1',
                                        //'model' => $models,
                                        'attribute' => 'rating',
                                        'value' => $model['rating'],
                                        'pluginOptions' => [
                                            //'disabled'=>true,

                                            //'displayOnly' => true,//звезды только для показа, но не активны
                                            'theme' => 'krajee-svg',
                                            'stars' => 5,
                                            'step' => 1,
                                            'min' => 0,
                                            'max' => 5,
                                            'disabled' => Yii::$app->user->isGuest ? true : false,//для гостя блокируем кнопки
                                            'showClear' => false,// (знак "кирпич")
                                            'showCaption' => false,//без подписи количества выбранных
                                            'size' => 'xs',//mili
                                            'defaultCaption' => ' оценка {rating}',
                                            'starCaptions' => [
                                                0 => 'Extremely Poor',
                                                1 => 'оценка 1',
                                                2 => 'оценка 2',
                                                3 => 'оценка 3',
                                                4 => 'оценка 4',
                                                5 => 'оценка 5',
                                            ],
                                        ],
                                        'pluginEvents' => [
                                            //когда кликаем на звезды всплывает это событие, которое и обробатываем
                                            'rating.change' => "function(event, value, caption) {
                                

                                $.ajax({
                                    type: 'POST',
                                    url: '" . \yii\helpers\Url::to('/rating/index') . "',//адрес контроллера и экшена. Так как вид вызван из того же экшена, что и обработка этого запроса, тооставляем пустым или пишем - controller/action
                                    data: {
                                        'rait': value,
                                        'company_id' : '" . $model['id'] . "'                                    
                                    
                                    },// value - число выбранных звезд
                                    cache: false,
                                    success: function(data) {
                                        var data = jQuery.parseJSON(data);//конвертируем json обьект, что передаем из php  в обьект jquery
                                        var inputRating = $('#geoinstitutions-rating');

                                        if (typeof data.message !== 'undefined') {
                                            console.log(data.message);
                                            inputRating.rating('reset');//очищает рейтинг до значения в бд

                                            //$('#myModal-geo .modal-body strong').text(data.message);//забиваем сообщение в модальное окно
                                            //$('#myModal-geo').modal();//вызываем виджет модального окна

                                        }else{

                                            $('#numRait').text(data.rating);//обновляем цыфры рейтинга в тегах на странице
                                            $('#numVotes').text(data.ratingVotes);//обновляем цыфры кол-ва голосов в тегах на странице
                                            inputRating.rating('refresh', {disabled: true, showClear: false, showCaption: true});//добавляет рейтинг и блокирует повторное нажатие
                                        }

                                    }
                                });

                            }",

                                        ],
                                    ]); ?>
                                </div>

                                <?php if ($model['status'] == 3): ?>
                                    <p>
                                        <span><?= \yii\helpers\StringHelper::truncate(strip_tags($model['about_company']), 50) ?></span>
                                    </p>
                                <?php endif; ?>
                                <?php if ($model['status'] == 2): ?>
                                    <p></p>
                                <?php endif; ?>
                                <?php if ($model['status'] == 1): ?>
                                    <p></p>
                                <?php endif; ?>
                                <div class="contacts-catalog">
                                    <div class="telephones">
                                        <?php if ($model['status'] == 3): ?>
                                            <p><?php if ($model['number_phone'] != '') {
                                                    echo $model['number_phone'];
                                                    echo ', ';
                                                } ?><?= $model['mobile_phone'] ?></p>
                                            <p><?= $model['address'] ?></p>
                                        <?php endif; ?>
                                        <?php if ($model['status'] == 2): ?>
                                            <p><?php if ($model['number_phone'] != '') {
                                                    echo $model['number_phone'];
                                                    echo ', ';
                                                } ?><?= $model['mobile_phone'] ?></p>
                                            <p><?= $model['address'] ?></p>
                                        <?php endif; ?>
                                        <?php if ($model['status'] == 1): ?>

                                        <?php endif; ?>

                                    </div>
                                    <?php if ($model['status'] == 3): ?>
                                        <a href="/catalog/vip?id=<?= $model['id'] ?>" class="main-style-button">ПОДРОБНЕЕ</a>
                                    <?php endif; ?>
                                    <?php if ($model['status'] == 2): ?>
                                        <a href="/catalog/pro?id=<?= $model['id'] ?>" class="main-style-button">ПОДРОБНЕЕ</a>
                                    <?php endif; ?>
                                    <?php if ($model['status'] == 1): ?>
                                        <a href="/catalog/start?id=<?= $model['id'] ?>" class="main-style-button">ПОДРОБНЕЕ</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
                <div class="col-xs-12">
                    <div class="bottom-links">
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