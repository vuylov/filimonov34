<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Биография Олега Филимонова';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h3 class="section-header"><?= Html::encode($this->title) ?></h3>
    <div>
        <?= Html::img(Yii::$app->homeUrl.'images/static/bio-image.jpg', ['class' => 'thumbnail image-left']);?>
        <div class="biography">
            <p><strong>Филимонов Олег Александрович</strong> – коренной волгоградец. Родился 12 марта 1987 года.</p>
            <p>Спортом начал заниматься с 7 лет, придя в секцию дзюдо. Занимаясь борьбой, выполнил норматив мастера спорта в 14 лет. Это произошло на Чемпионате России (Саратов), где он стал победителем в своей весовой категории.</p>
            <p>Олег – бакалавр физической культуры, закончил в 2008 году Волгоградскую государственную академию физической культуры.</p>
            <p>Пауэрлифтингом Олег увлекся в 2010 году, что в дальнейшем и определило его профессию. С 2010 года выступает на международных соревнованиях по пауэрлифтингу по версии Федерации <a href="http://www.wpc-wpo.ru/">WPC-WPO</a> в дивизионе AWPC – жим штанги лежа без экипировки.</p>
            <p><strong>Олегу принадлежат 9 мировых рекордов!!!!!
                    Олег является
                    2-кратным чемпионом Мира и Европы,
                    чемпионом Евразии!!!!!</strong>
            </p>
            <p>В настоящее время Олег является старшим тренером в <?= Html::a('СК «Арена-Юг»', ['media/view', 'id' => 8]) ?> (Волгоград).</p>
            <p>Женат, вместе с женой Виолеттой воспитывают сына Глеба.</p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php
$this->registerMetaTag(['name' => 'keywords', 'content' => 'пауэрлифтер, powerlifting в волгограде, биография олег филимонова']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Пауэрлифтингом Олег увлекся в 2010 году, что в дальнейшем и определило его профессию. С 2010 года выступает на международных соревнованиях по пауэрлифтингу по версии Федерации WPC-WPO в дивизионе AWPC – жим штанги лежа без экипировки.']);
?>