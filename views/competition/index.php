<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompetitionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Календарь соревнований организации пауэлифтинга AWPC/WPC';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competition-index">

    <h3 class="section-header"><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'emptyText' => 'Соревнований нет',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name:ntext',
            //'url:ntext',
            'date_at',
            'create_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p class="pull-right">
        <?= Html::a('Добавить соревнований', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
