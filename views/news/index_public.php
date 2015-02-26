<?php
use yii\helpers\Html;
?>
<h3 class="section-header">Все новости</h3>
<div class="list-group">
    <?php foreach($news as $item):?>
        <?=Html::a('<span class="item-title">'.Yii::$app->formatter->asDate($item->create_at, "dd-mm-Y").'&nbsp;&nbsp;'.$item->title.'</span>', ['news/view', 'id' => $item->id], ['class' => 'list-group-item']);?>
    <?php endforeach;?>
</div>
<p class="pull-right"><?=Html::a('Вернуться на главную', ['site/index'], ['class' => 'btn btn-default']);?></p>