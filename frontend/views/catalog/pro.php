<?php
\frontend\assets\MainAsset::register($this);
\frontend\assets\ProAsset::register($this);
use kartik\rating\StarRating;

?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumbs-inner">
                    <ul>
                        <li><a href="/">Главная</a></li>
                        <li>|</li>
                        <li><a href="/catalog">Каталог</a></li>
                        <?php if($catSub['id']): ?>
                        <li>|</li>
                        <li><a href="/catalog/menu?idSub=<?= $catSub['id'] ?>"><?= $catSub['name'] ?></a></li>
                        <?php endif; ?>
                        <li>|</li>
                        <li class="active-link"><a
                                    href=""><?= \yii\helpers\StringHelper::truncate($companyPro->company_name, 100) ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pro">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="wrapper-pro">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="catalog-content-post">
                                <div class="img">
                                    <?php if ($companyPro->general_image == ''): ?>
                                        <div class="img-container">
                                            <img src="/uploads/logotype/nologo.png" alt="">
                                        </div>
                                    <?php else: ?>
                                        <div class="img-container">
                                            <img src="/uploads/logotype/<?= $companyPro->general_image ?>" alt="">
                                        </div>
                                    <?php endif; ?>
                                    <div class="top-button-pro"><a href="">PRO</a>
                                    </div>
                                    <div class="triangle"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                            <div class="text">
                                <h1><?= \yii\helpers\StringHelper::truncate(strip_tags($companyPro->company_name, 50)) ?></h1>
                                <div>
                                    <?= StarRating::widget([
                                        'name' => 'rating_1',
                                        //'model' => $models,
                                        'attribute' => 'rating',
                                        'value' => $companyPro->rating,
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
                                        'company_id' : '" . $companyPro->id . "'                                    
                                    
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
                                <p></p>
                                <ul class="contacts-pro">
                                    <?php if ($companyPro->number_phone != ''): ?>
                                        <li><a href="#"
                                               class="phone"><?= \yii\helpers\StringHelper::truncate(strip_tags($companyPro->number_phone), 50) ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($companyPro->mobile_phone != ''): ?>
                                        <li><a href=""
                                               class="smartphone"><?= \yii\helpers\StringHelper::truncate(strip_tags($companyPro->mobile_phone), 50) ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($companyPro->address != ''): ?>
                                        <li><a href=""
                                               class="map"><?= \yii\helpers\StringHelper::truncate(strip_tags($companyPro->address), 50) ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($companyPro->web_site != ''): ?>
                                        <li><a href=""
                                               class="envelope"><?= \yii\helpers\StringHelper::truncate(strip_tags($companyPro->web_site), 50) ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($companyPro->email != ''): ?>
                                        <li><a href=""
                                               class="world"><?= \yii\helpers\StringHelper::truncate(strip_tags($companyPro->email), 50) ?></a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <div class="pro-side-panel">
                                <ul>
                                    <?php if ($companyPro->speed_work == 1): ?>
                                        <li class="speed">
                                            <a href="#">СКОРОСТЬ РАБОТЫ</a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($companyPro->quality_control == 1): ?>
                                        <li class="enginner">
                                            <a href="#">КОНТРОЛЬ КАЧЕСТВА</a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($companyPro->service == 1): ?>
                                        <li class="growth">
                                            <a href="#">ОТЗЫВЧИВЫЙ СЕРВИС</a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($companyPro->recommend == 1): ?>
                                        <li class="ok"><a href="#">„МИР УПАКОВКИ“
                                                РЕКОМЕНДУЕТ</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-company">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="about-company-content">
                    <a href="#">О компании</a>
                    <?php if ($companyPro->about_company != ''): ?>
                        <?= $companyPro->about_company ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($galProd): ?>
    <div class="gallery">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="news-header">
                        <h1 class="headline">Галерея продукции</h1>
                        <div class="news-header-nav">

                            <div class="slider-nav">
                                <div class="prev-gallery-button">

                                </div>
                                <div class="next-gallery-button">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel gallery-slider">
                    <?php foreach ($galProd as $gp): ?>
                        <div style="width: 255px; height: 230px">
                            <p style="margin-left: 15px; font-weight:bold; margin-bottom: 5px">
                                <b><?= \yii\helpers\StringHelper::truncate(strip_tags($gp['title']), 27) ?></b>
                            </p>
                            <div class="col-xs-12">
                                <img src="/uploads/galprod/<?= $gp['id'] ?>/<?= $gp['image'] ?>" alt=""
                                     class="gallery-img" style="width: 255px; height: 150px">
                            </div>
                            <p style="margin-left: 15px; padding-top: 165px">
                                <b><?= \yii\helpers\StringHelper::truncate(strip_tags($gp['description']), 50) ?></b>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
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
                                <a href="/catalog/pro?id=<?= $comp['id'] ?>">
                                    <?php if ($comp['general_image'] == ''): ?>
                                        <img src="/uploads/logotype/nologo.png" alt="">
                                    <?php else: ?>
                                        <img class="carousel-img" src="/uploads/logotype/<?= $comp['general_image'] ?>"
                                             alt="">
                                    <?php endif; ?>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>