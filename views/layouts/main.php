<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
use app\assets\BxSliderAsset;
use app\components\Calendar;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
BxSliderAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="Nbif12N6jCozwQEyBJARk7jhaF9hXoqAgmJEgf0mKOo" />
    <meta name='yandex-verification' content='505c6424550ffab3' />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div class="container">
        <?php
            NavBar::begin([
                //'brandLabel' => 'My Company',
                //'brandUrl' => Yii::$app->homeUrl,
                'renderInnerContainer' => false,
                'options' => [
                    'class' => 'top-menu',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav nav-justified'],
                'encodeLabels' => false,
                'items' => [
                    ['label' => 'Главная', 'url' => ['/site/index']],
                    ['label' => 'Биография', 'url' => ['/site/about']],
                    ['label' => 'Достижения', 'url' => ['/site/achivements']],
                    ['label' => 'Мой тренер', 'url' => ['/site/mycoach']],
                    ['label' => 'Галерея', 'url' => ['/media/photo']],
                    ['label' => 'Видео', 'url' => ['/media/video']],
                    ['label' => 'СК &laquo;Арена-Юг&raquo;', 'url' => ['/media/view', 'id' => 8]],
                    ['label' => 'В СМИ', 'url' => ['/site/press']],
                    ['label' => 'Партнеры', 'url' => ['/site/partners']],
                    //['label' => 'Советы мастера', 'url' => ['/site/faq']],
                    ['label' => 'Контакты', 'url' => ['/site/contact']],
                ],
            ]);
            NavBar::end();
        ?>
        <div class="header center-block">
            <h1 class="central-h1"><span class="blue">Олег</span><br><span class="red">Филимонов</span></h1>
            <h2><span class="shadow">Профессиональный пауэрлифтер,<br>многократный чемпион и рекордсмен<br>мира, евразии и европы</span></h2>
        </div>
        <div id="slider-wrapper" class="hidden-xs hidden-sm hidden-print">
            <ul class="bxslider">
                <li>
                    <div class="slide-image"><?= Html::img('@web/images/slides/slide1_1.jpg');?></div>
                    <div class="slide-caption">
                        <div class="slide-caption-title">2014. август. Москва. Чемпионат мира</div>
                        <div>Чемпионская попытка</div>
                        <div class="slide-caption-button">
                            <?= Html::a('Еще фото', ['media/view', 'id' => 7], ['class' => 'btn btn-danger']);?>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="slide-image">
                        <?= Html::img('@web/images/slides/slide3.jpg');?>
                    </div>
                    <div class="slide-caption">
                        <div class="slide-caption-title">Жим штанги 270 кг в слингшоте</div>
                        <div>Хотите увидеть?</div>
                        <div class="slide-caption-button">
                            <?= Html::a('Просмотр', ['news/view', 'id' => 24], ['class' => 'btn btn-danger']);?>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="slide-image"><?= Html::img('@web/images/slides/slide2_1.jpg');?></div>
                    <div class="slide-caption">
                        <div class="slide-caption-title">ВЫБОР СИЛЬНЫХ МИРА</div>
                        <div>Статья для журнала "Агат. Город автомобилей" №6(1/2013)</div>
                        <div class="slide-caption-button">
                            <?= Html::a('Просмотр', ['press'], ['class' => 'btn btn-danger']);?>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="content-area">
           <div class="row">
               <div class="col-md-8">
                   <?= $content ?>
               </div>
               <div class="col-md-4">
                   <h3 class="section-header">Календарь соревнований</h3>
                   <div class="sidebar-item">
                       <?= Calendar::getItems();?>
                       <div class="clearfix"></div>
                   </div>
                   <div class="sidebar-item">
                       <script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>
                       <!-- VK Widget -->
                       <div id="vk_groups"></div>
                       <script type="text/javascript">
                           VK.Widgets.Group("vk_groups", {mode: 0, width: "auto", height: "250", color1: 'FFFFFF', color2: '2B587A', color3: '002448'}, 88709816);
                       </script>
                   </div>
               </div>
           </div>

        </div>
        <footer class="footer">
            <div class="container">
                <p>Все права защищены и охраняются законом. Использование материалов сайта разрешено только с письменного разрешения владельца сайта.</p>
                <p class="pull-left"><?= Html::mailto('&copy; Олег Филимонов '.date('Y'), 'mailto:oa.filimonov@gmail.com') ?></p>
                <div class="clearfix"></div>
                <p>
                    <!-- Yandex.Metrika informer -->
                    <a href="https://metrika.yandex.ru/stat/?id=28797476&amp;from=informer"
                       target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/28797476/3_0_FFFFFFFF_FFFFFFFF_0_pageviews"
                                                           style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:28797476,lang:'ru'});return false}catch(e){}"/></a>
                    <!-- /Yandex.Metrika informer -->

                    <!-- Yandex.Metrika counter -->
                    <script type="text/javascript">
                        (function (d, w, c) {
                            (w[c] = w[c] || []).push(function() {
                                try {
                                    w.yaCounter28797476 = new Ya.Metrika({id:28797476,
                                        clickmap:true,
                                        trackLinks:true,
                                        accurateTrackBounce:true});
                                } catch(e) { }
                            });

                            var n = d.getElementsByTagName("script")[0],
                                s = d.createElement("script"),
                                f = function () { n.parentNode.insertBefore(s, n); };
                            s.type = "text/javascript";
                            s.async = true;
                            s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

                            if (w.opera == "[object Opera]") {
                                d.addEventListener("DOMContentLoaded", f, false);
                            } else { f(); }
                        })(document, window, "yandex_metrika_callbacks");
                    </script>
                <noscript><div><img src="//mc.yandex.ru/watch/28797476" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
                <!-- /Yandex.Metrika counter -->
                </p>
            </div>
        </footer>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
