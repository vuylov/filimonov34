<?php
use yii\helpers\Html;
?>
<h3 class="section-header">Фотогалерея</h3>
<div class="index-foto">
    <div class="row">
    <?php if(count($models) > 0):?>

            <?php foreach($models as $model):?>
                <div class="col-md-4 item">
                    <?php if($model->thumb):?>
                        <?php $img = Yii::$app->homeUrl.$model->thumb;?>
                    <?php else:?>
                        <?php $img = Yii::$app->homeUrl.$model->files[0]->path;?>
                    <?php endif;?>
                    <?= Html::a($model->name, ['media/view', 'id' => $model->id], ['class' => 'item-link', 'style' => 'background-image:url('.$img.')']);?>
                    <div class="caption item-caption"><?=$model->name;?></div>
                </div>
            <?php endforeach;?>
    <?php else: ?>
            <div class="alert alert-danger">Фотографии не загружены</div>
    <?php endif;?>
    </div>
</div>