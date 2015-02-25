<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Медиа';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-index">

    <h3 class="section-header"><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'emptyText'     => 'Ничег не добавлено',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'mediatype.name',
            'user.name',
            'name',
            //'description:ntext',
            // 'thumb:ntext',
            // 'code:ntext',
            // 'active',
            // 'create_at',
            // 'keywords:ntext',
            // 'description_seo:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p class="pull-right">
        <?= Html::a('Добавить фото/видео', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
