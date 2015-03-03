<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Официальный сайт Олега Филимонова. Профессионального пауэрлифтера, многократного чемпиона и рекордсмена мира, еразии и европы';
?>
<h3 class="section-header">Новости</h3>
<div class="site-index">
    <?php if(count($news) > 0):?>
    <div class="news-container">
        <?php foreach($news as $item):?>
            <div class="new-item">
                <?php if($item->thumb):?>
                    <div class="new-thumbnail">
                        <?=Html::img(Yii::$app->homeUrl.'upload/news/'.$item->thumb, ['class' => 'thumbnail']);?>
                    </div>
                <?php endif;?>
                <div class="item-title"><span class="item-title"><?=Yii::$app->formatter->asDate($item->create_at, "dd.MM.Y");?>&nbsp;&nbsp;<?=$item->title;?></span></div>
                <div class="item-description">
                    <?=$item->brief;?>
                    <?=Html::a('Подробнее', ['news/view', 'id' => $item->id], ['class' => '']);?>
                </div>
                <div>
                    <a href="http://vk.com/share.php?url=<?= Url::to(['news/view', 'id' => $item->id], true); ?>" target="_blank"><?= Html::img('@web/images/static/vk_share.png');?></a>
                </div>
                <div class="clearfix"></div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="all-news pull-right">
        <?=Html::a('Все новости', ['news/index'], ['class' => 'btn btn-default']);?>
    </div>
    <?php else:?>
        <div class="alert-danger">Новостей нет.</div>
    <?php endif;?>
</div>
<?php
$this->registerMetaTag(['name' => 'keywords', 'content' => 'пауэрлифтер волгоград, профессиональный пауэрлифтер, powerlifting russia']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->title]);
?>
