<?php
use yii\helpers\Html;
use yii\helpers\VarDumper;

//VarDumper::dump($competitions, 10, true);
?>
<?php if(count($competitions) > 0):?>
    <div style="margin-bottom: 10px">
        <?php foreach($competitions as $item):?>
            <div>
                <span class="competition-data"><?= Yii::$app->formatter->asDate($item->date_at, 'dd.MM');?></span>
                <div class="competition-item">
                    <a href="<?= $item->url;?>" rel="nofollow" target="_blank"><?= $item->name;?></a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
<?php endif;?>
<div class="pull-right"><a href="http://www.wpc-wpo.ru/calendar/" rel="nofollow" target="_blank" class="btn btn-default">Календарь AWPC/WPC</a></div>
