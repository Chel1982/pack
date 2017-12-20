<?php
\frontend\assets\MainAsset::register($this);
\frontend\assets\ContactAsset::register($this);
?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumbs-inner">
                    <ul>
                        <li><a href="/">Мир Упаковки</a></li>
                        <li>|</li>
                        <li class="active-link"><a href="">Контакты</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contacts">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="headline">
                    Сотрудники редакции журналов Мир упаковки, Мир продуктов
                </h1>
            </div>
        </div>
            <div class="row">
                <?php foreach ($model as $item): ?>
                    <div class="col-lg-4 col-md-4  col-sm-6 col-xs-12">
                        <div class="person-contacts">
                            <img src="/uploads/contacts/<?= $item['id']?>.png">
                            <h3><?= $item['description_name'] ?></h3>
                            <h1><?= $item['name_co_worker'] ?></h1>
                            <h4><?= $item['email'] ?></h4>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
    </div>
</div>


<div class="additional-information">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="additional-information-innner">
                    <?php foreach ($modelC as $itemC): ?>

                    <div class="adress">
                        <img src="/source/img/map-icon-white.png">
                        <p>
                            <?= $itemC['address']?>
                        </p>
                    </div>
                    <div class="adress">
                        <img src="/source/img/map-icon-white.png">
                        <p> <?= $itemC['phone_number']?>
                            <br>
                            <?= $itemC['fax_number']?>
                        </p>
                    </div>
                    <div class="adress">
                        <img src="/source/img/map-icon-white.png">
                        <p><?= $itemC['email']?><br>
                            <?= $itemC['site_url']?>
                        </p>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>