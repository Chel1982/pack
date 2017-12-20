<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2 col-sm-12 col-xs-12">
                <ul class="footer-links">
                    <li><a>Интернет-проект</a></li>
                    <li><a href="/site/about">О проекте</a></li>
                    <li><a href="/site/redaction">Редакция</a></li>
                    <li><a href="/contacts">Контакты</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-12 col-xs-12">
                <ul class="footer-links">
                    <li><a>Пользоваетелю</a></li>
                    <li><a href="/site/signup">Регистрация</a></li>
                    <?php if (Yii::$app->user->isGuest): ?>
                        <li><a href="/site/login">Личный кабинет</a></li>
                    <?php elseif(Yii::$app->user->getId() === 37): ?>
                        <li><a href="/admin/news">Личный кабинет</a></li>
                    <?php elseif(!Yii::$app->user->isGuest):?>
                        <li><a href="/cabinet/company">Личный кабинет</a></li>
                    <?php endif; ?>
                    <li><a href="/site/map">Карта сайта</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-12 col-xs-12">
                <ul class="footer-links">
                    <li><a href="">Мы в Фейсбуке</a></li>
                    <li class="facebook-link"><a href=""><img src="/source/img/facebook-link.png"></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-12 col-xs-12">
                <ul class="footer-links">
                    <?= \frontend\widgets\ContactsWidget::widget() ?>
                </ul>
            </div>
        </div>
    </div>
</footer>

<div class="under-footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="under-footer-inner">
                    <a href="#">Мир Упаковки 2012 - <?= date('Y') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>