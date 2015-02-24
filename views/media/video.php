<?php
use yii\helpers\Html;
?>
<h3 class="section-header">Видео</h3>
<div class="index-foto">
    <?php if(count($models) > 0):?>
        <?php foreach($models as $model):?>
            <?= Html::a($model->name, ['media/view', 'id' => $model->id]);?>
        <?php endforeach;?>
    <?php else: ?>
        <div class="alert alert-danger">Видео не загружено</div>
    <?php endif;?>
</div>