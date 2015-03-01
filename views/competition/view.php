<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Competition */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Competitions', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competition-view">

    <h3 class="section-header"><?= Html::encode($this->title) ?></h3>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name:ntext',
            'url:ntext',
            'date_at',
            'create_at',
        ],
    ]) ?>
    <p class="pull-right">
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить соревнование?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Добавить еще', ['create'], ['class' => 'btn btn-success']);?>
        <?= Html::a('Список', ['index'], ['class' => 'btn btn-default']);?>
    </p>
</div>
