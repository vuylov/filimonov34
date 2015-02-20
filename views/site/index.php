<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Официальный сайт Олега Филимонова';
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
                <div class="item-title"><span class="item-title"><?=Yii::$app->formatter->asDatetime($item->create_at, "d-M-Y");?>&nbsp;&nbsp;<?=$item->title;?></span></div>
                <div class="item-description">
                    <?=$item->brief;?>
                    <?=Html::a('Подробнее', ['news/view', 'id' => $item->id], ['class' => '']);?>
                </div>
                <div class="clearfix"></div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="all-news pull-right">
        <?=Html::a('Все новости', ['news/index'], ['class' => 'btn btn-primary']);?>
    </div>
    <?php else:?>
        <div class="alert-danger">Новостей нет.</div>
    <?php endif;?>
</div>
