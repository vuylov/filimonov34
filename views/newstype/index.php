<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Типы новостей';
?>
<div class="newstype-index">

    <h3 class="section-header"><?= Html::encode($this->title) ?></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'emptyText' => 'Записей нет.'
    ]); ?>
    <p class="pull-right">
        <?= Html::a('Добавить тип', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
