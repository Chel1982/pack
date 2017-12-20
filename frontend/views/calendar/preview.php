<?php
\frontend\assets\MainAsset::register($this);
\frontend\assets\PreviewpageAsset::register($this);
?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumbs-inner">
                    <ul>
                        <li><a href="/">Мир Упаковки</a></li>
                        <li>|</li>
                        <li><a href="/calendar/previews">Анонсы</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                    <div class="page-content-inner">
                        <div class="date-link">
                            <?= date('y.m.d', $preview->time_spending) ?>
                        </div>
                        <h1 class="page-content-header">
                            <?= $preview->title ?>
                        </h1>

                        <p>
                            <?= $preview->description ?>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
