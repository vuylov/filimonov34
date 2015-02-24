<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\BxSliderAsset;

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
                    ['label' => 'Мой тренер', 'url' => ['/site/coach']],
                    ['label' => 'Галерея', 'url' => ['/media/photo']],
                    ['label' => 'Видео', 'url' => ['/media/video']],
                    ['label' => 'СК &laquo;Арена Юг&raquo;', 'url' => ['/site/arena']],
                    ['label' => 'В СМИ', 'url' => ['/site/press']],
                    ['label' => 'Советы мастера', 'url' => ['/site/faq']],
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
                    <div class="slide-image"><img src="<?=Yii::$app->homeUrl.'/../images/slides/slide1_1.jpg'?>"></div>
                    <div class="slide-caption">Финальная чемпиаонская попытка - попытка</div>
                </li>
                <li>
                    <div class="slide-image"><img src="<?=Yii::$app->homeUrl.'/../images/slides/slide2_1.jpg'?>"></div>
                    <div class="slide-caption">Реклама для хундая!!!!!</div>
                </li>
                <li>
                    <div class="slide-image">
                        ssdsd
                    </div>
                    <div class="slide-caption">Видео последнего выступления</div>
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
                   <div>Rfkt</div>
               </div>
           </div>

        </div>
        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; Олег Филимонов <?= date('Y') ?></p>
                <p class="pull-right"><?= Html::mailto('Написать письмо', 'mailto:oa.filimonov@gmail.com') ?></p>
            </div>
        </footer>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
