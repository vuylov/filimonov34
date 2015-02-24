<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use newerton\fancybox\FancyBox;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Media */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
echo FancyBox::widget([
    'target' => 'a[rel=fancybox]',
    'helpers' => true,
    'mouse' => true,
    'config' => [
        'maxWidth' => '90%',
        'maxHeight' => '90%',
        //'playSpeed' => 7000,
        'arrows' => false,
        'padding' => 0,
        'fitToView' => false,
        'width' => '70%',
        'height' => '70%',
        'autoSize' => false,
        'closeClick' => false,
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
        'prevEffect' => 'elastic',
        'nextEffect' => 'elastic',
        'closeBtn' => true,
        'openOpacity' => true,
        'autoCenter'  => true,
        'helpers' => [
            'title' => ['type' => 'float'],
            'buttons' => [],
            'thumbs' => ['width' => 68, 'height' => 50],
            'overlay' => [
                'css' => [
                    'background' => 'rgba(0, 0, 0, 0.8)'
                ]
            ]
    ],
    ]]);?>
<div class="media-view">

    <h3 class="section-header"><?= Html::encode($this->title) ?></h3>
    <div>
        <?php if($model->description):?>
            <p class="media-description"><?=$model->description;?></p>
        <?php endif;?>
        <?php if($model->code):?>
            <div>
                <?=$model->code;?>
            </div>
        <?php else:?>
            <?php if(count($model->files) > 0):?>
                <?php foreach($model->files as $image):?>
                    <div>
                        <a href="<?=Url::to(Yii::$app->homeUrl.$image->path);?>" rel="fancybox" class="img-container img-project-index" style="background-image: url('<?= Yii::$app->homeUrl.$image->path;?>')">
                        </a>
                    </div>
                <?php endforeach;?>
            <?php else:?>
                <div class="alert alert-danger">Фотографии не добавлены в альбом</div>
            <?php endif;?>
        <?php endif;?>
    </div>
    <div class="clearfix"></div>
    <?php if(Yii::$app->request->referrer):?>
        <div class="pull-right">
            <a href="<?= Yii::$app->request->referrer?>" class="btn btn-default">Назад</a>
        </div>
    <?php endif;?>
    <div class="pull-right"></div>
    <?php if(!Yii::$app->user->isGuest):?>
        <p class="pull-right">
            <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены, что хотите удалить?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif;?>
</div>
