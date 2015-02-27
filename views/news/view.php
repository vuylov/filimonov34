<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */
$this->title = $model->title;
?>
<div class="news-view">
    <h3 class="section-header"><?= Html::encode($this->title) ?></h3>
    <?php if(!Yii::$app->user->isGuest):?>
        <p>
            <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены, что хотите удалить новость?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif;?>
    <div  class="news-view">
        <?=$model->description;?>
        <div class="clearfix"></div>
        <div class="pull-right">
            <?=Html::a('Вернуться назад', ['site/index'], ['class' => 'btn btn-default']);?>
        </div>
    </div>
</div>
