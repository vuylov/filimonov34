<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
?>
<div class="news-index">

    <h3 class="section-header"><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'user.name',
            'newstype.name',
            'active',
            'title',
            // 'description:ntext',
            // 'thumb:ntext',
            // 'visitors',
            // 'create_at',
            // 'keywords:ntext',
            // 'description_seo:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'emptyText' => 'Новостей нет.'
    ]); ?>
    <p class="pull-right">
        <?= Html::a('Добавить новость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
