<?php
\frontend\assets\MainAsset::register($this);
\frontend\assets\EventAsset::register($this); 
?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumbs-inner">
                    <ul>
                        <li><a href="/">Мир Упаковки</a></li>
                        <li>|</li>
                        <li><a href="/calendar">Календарь событий</a></li>
                        <li>|</li>
                        <li class="active-link"><a href=""><?= $preview->title ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="event">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="headline"><?= $preview->title ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="event-wrapper">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="img-event">
                                <?php if($preview->path_img === null): ?>
                                    <a><img src="/uploads/news/nologo.png" style="width: 340px; height: 240px;"></a>
                                <?php else: ?>
                                    <a><img src="/uploads/calendarlogo/<?= $preview->path_img ?>" style="width: 340px; height: 240px;"></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <ul class="first-event-list">
                                <li class="time-icon"><a href=""><?= date('Y-m-d', $preview->time_spending) ?></a></li>
                                <?php if ($preview->organization): ?>
                                    <li class="company-icon"><a href=""><?= $preview->organization ?></a></li>
                                <?php endif; ?>
                                <?php if($preview->address): ?>
                                    <li class="map-icon"><a href=""><?= $preview->address ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <ul class="second-event-list">
                                <?php if ($preview->phone_number): ?>
                                    <li class="tel-icon"><a href=""><?= $preview->phone_number ?></a></li>
                                <?php endif; ?>
                                <?php if ($preview->web_site): ?>
                                    <li class="envelope-icon"><a href=""><?= $preview->web_site ?></a></li>
                                <?php endif; ?>
                                <?php if ($preview->email): ?>
                                    <li class="email-icon"><a href=""><?= $preview->email ?></a></li>
                                <?php endif; ?>
                                <?php if ($preview->exhibition): ?>
                                    <li class="place-icon"><a href=""><?= $preview->exhibition ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin: 20px">
                            <?= $preview->description ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>