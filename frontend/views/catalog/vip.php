<?php
\frontend\assets\MainAsset::register($this);
\frontend\assets\VipAsset::register($this);
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
                            <?php if ($catSub['id']): ?>
                            <li>|</li>
                            <li><a href="/catalog/menu?idSub=<?= $catSub['id'] ?>"><?= $catSub['name'] ?></a></li>
                            <?php endif; ?>
                            <li>|</li>
                            <li class="active-link"><?= \yii\helpers\StringHelper::truncate($companyVip->company_name, 100) ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="vip">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="wrapper-pro">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="catalog-content-post">
                                    <div class="img">
                                        <?php if ($companyVip->general_image == ''): ?>
                                            <div class="img-container">
                                                <img src="/uploads/logotype/nologo.png" alt="">
                                            </div>
                                        <?php else: ?>
                                            <div class="img-container">
                                                <img src="/uploads/logotype/<?= $companyVip->general_image ?>" alt="">
                                            </div>
                                        <?php endif; ?>
                                        <div class="top-button-pro"><a href="">VIP</a>
                                        </div>
                                        <div class="triangle"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                                <div class="text">
                                    <h1><?= $companyVip->company_name ?></h1>
                                    <div>
                                        <?= StarRating::widget([
                                            'name' => 'rating_1',
                                            //'model' => $models,
                                            'attribute' => 'rating',
                                            'value' => $companyVip->rating,
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
                                        'company_id' : '" . $companyVip->id . "'                                    
                                    
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
                                    <p>Работая в тесном контакте с клиентами, мы стремимся максимально полно
                                        удоволетворять их сегодняшние требования</p>
                                    <ul class="contacts-pro">
                                        <?php if ($companyVip->number_phone != null): ?>
                                            <li><a href="#" class="phone"><?= $companyVip->number_phone ?></a></li>
                                        <?php endif; ?>
                                        <?php if ($companyVip->mobile_phone != ''): ?>
                                            <li><a href="" class="smartphone"><?= $companyVip->mobile_phone ?></a></li>
                                        <?php endif; ?>
                                        <?php if ($companyVip->address != null): ?>
                                            <li><a href="" class="map"><?= $companyVip->address ?></a></li>
                                        <?php endif; ?>
                                        <?php if ($companyVip->web_site != null): ?>
                                            <li><a href="" class="envelope"><?= $companyVip->web_site ?></a></li>
                                        <?php endif; ?>
                                        <?php if ($companyVip->email != ''): ?>
                                            <li><a href="" class="world"><?= $companyVip->email ?></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <div class="pro-side-panel">
                                    <ul>
                                        <?php if ($companyVip->speed_work == 1): ?>
                                            <li class="speed">
                                                <a href="#">СКОРОСТЬ РАБОТЫ</a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($companyVip->quality_control == 1): ?>
                                            <li class="enginner">
                                                <a href="#">КОНТРОЛЬ КАЧЕСТВА</a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($companyVip->service == 1): ?>
                                            <li class="growth">
                                                <a href="#">ОТЗЫВЧИВЫЙ СЕРВИС</a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($companyVip->recommend == 1): ?>
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
    <div class="company-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="wrapper-comapny-info">
                        <ul class="tabs-list">
                            <li class="tabs-list__tab" dataId="0"><a href="">О КОМПАНИИ</a></li>
                            <li class="tabs-list__tab" dataId="1"><a href="">СТАТЬИ</a></li>
                            <li class="tabs-list__tab" dataId="2"><a href="">ПРОДУКЦИЯ И УСЛУГИ</a></li>
                        </ul>
                        <div class="wrapper-tabs">
                            <p>
                                <?= $companyVip->about_company ?>
                            </p>
                        </div>
                        <div class="wrapper-tabs">
                            <div class="row">
                                <?php if (isset($arcticleVip)): ?>
                                    <?php foreach ($arcticleVip as $aV): ?>
                                        <div class="wrapper-tabs__post">
                                            <h4 class="tabs_date"><?= date('y.m.d', $aV['created_at']) ?></h4>
                                            <h2 class="tabs_heading"><a
                                                        href="/catalog/article?id=<?= $aV['id'] ?>"><?= \yii\helpers\StringHelper::truncate($aV['title'], 50) ?></a>
                                            </h2>
                                            <?= \yii\helpers\StringHelper::truncate($aV['description'], 300) ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="wrapper-tabs">
                            <div class="row">
                                <?php if (isset($prodComp)): ?>
                                    <?php foreach ($prodComp as $pC): ?>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <?php if ($pC['general_image'] === null): ?>
                                                <a href=""><img src="/uploads/news/nologo.png"
                                                                style="width: 262px; height: 142px"></a>
                                            <?php else: ?>
                                                <a href=""><img
                                                            src="/uploads/prodcomp/<?= $pC['id'] ?>/<?= $pC['general_image'] ?>"
                                                            style="width: 200px; height: 120px"></a>
                                            <?php endif; ?>
                                            <p class="wrapper-tabs__product_p"><?= \yii\helpers\StringHelper::truncate($pC['title'], 50) ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="wrapper-company-news">
                        <a class="company-news-title" href="">Новости</a>
                        <ul>
                            <?php foreach ($news as $new): ?>
                                <li>
                                    <div class="news-post">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-4">
                                                    <?php if ($new['general_image'] == null): ?>
                                                        <a class="background-properties"
                                                           href="/news/new?id=<?= $new['id'] ?>"
                                                           style="width: 90px; height: 108px; background-image: url(../uploads/news/nologo.png);">

                                                        </a>
                                                    <?php else: ?>
                                                        <a class="background-properties"
                                                           href="/news/new?id=<?= $new['id'] ?>"
                                                           style="width: 90px; height: 110px; background-image: url(../uploads/news/<?= $new['id'] ?>/<?= $new['general_image'] ?>);">
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="text-information">
                                                        <?php if ($new['created_at'] != ''): ?>
                                                            <h4><?= date('y.m.d', $new['created_at']) ?></h4>
                                                        <?php endif; ?>
                                                        <?php if ($new['title'] != ''): ?>
                                                            <h2><?= \yii\helpers\StringHelper::truncate($new['title'], 20) ?></h2>
                                                        <?php endif; ?>
                                                        <?php if ($new['description'] != null): ?>
                                                            <h3><?= strip_tags(\yii\helpers\StringHelper::truncate($new['description'], 50)) ?></h3>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
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
                            <?php if ($gp['title'] != ''): ?>
                                <p style="margin-left: 15px; font-weight:bold; margin-bottom: 5px">
                                    <b><?= \yii\helpers\StringHelper::truncate($gp['title'], 27) ?></b>
                                </p>
                            <?php endif; ?>
                            <?php if ($gp['image'] != ''): ?>
                                <div class="col-xs-12">
                                    <img src="/uploads/galprod/<?= $gp['id'] ?>/<?= $gp['image'] ?>" alt=""
                                         class="gallery-img" style="width: 255px; height: 150px">
                                </div>
                            <?php else: ?>
                                <div class="col-xs-12">
                                    <img src="/uploads/news/nologo.png class=" gallery-img" style="width: 255px; height:
                                    150px">
                                </div>
                            <?php endif; ?>
                            <?php if ($gp['description'] != ''): ?>
                                <p style="margin-left: 15px; padding-top: 165px">
                                    <b><?= \yii\helpers\StringHelper::truncate($gp['description'], 50) ?></b>
                                </p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
    <!--
    --><?php
/*$ds = 'sdfsf <img src="/source/img/company-news-pic.png" alt=""> fdaffa';

$rep = preg_replace('/^[<img src="]>$/', '', $ds);

//echo  $rep;

$qaz =

$rew = strip_tags(\yii\helpers\StringHelper::truncate($rep, 500));

echo $rew;

*/ ?>