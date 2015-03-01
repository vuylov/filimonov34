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
                    //['label' => 'Мой тренер', 'url' => ['/site/coach']],
                    ['label' => 'Галерея', 'url' => ['/media/photo']],
                    ['label' => 'Видео', 'url' => ['/media/video']],
                    ['label' => 'СК &laquo;Арена-Юг&raquo;', 'url' => ['/media/view', 'id' => 8]],
                    ['label' => 'В СМИ', 'url' => ['/site/press']],
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
        <div id="slider-wrapper">
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
                            <?= Html::a('Просмотр', ['press'], ['class' => 'btn btn-danger']);?>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="slide-image"><?= Html::img('@web/images/slides/slide2_1.jpg');?></div>
                    <div class="slide-caption">
                        <div class="slide-caption-title">ВЫБОР СИЛЬНЫХ МИРА</div>
                        <div>Статья для журнала "Ага. Город автомобилей" №6(1/2013)</div>
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
               <div class="col-xs-9 col-md-8">
                   <?= $content ?>
               </div>
               <div class="col-xs-3 col-md-4">
                   <h3 class="section-header">Календарь соревнований</h3>
                   <div>
                       <?= Calendar::getItems();?>
                   </div>
               </div>
           </div>

        </div>
        <footer class="footer">
            <div class="container">
                <p>Все права защищены и охраняются законом. Использование материалов сайта разрешено только с письменного разрешения владельца сайта.</p>
                <p class="pull-left"><?= Html::mailto('&copy; Олег Филимонов '.date('Y'), 'mailto:oa.filimonov@gmail.com') ?></p>
            </div>
        </footer>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
