<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Newstype */

$this->title = $model->name;
?>
<div class="newstype-view">

    <h3 class="section-header"><?= Html::encode($this->title) ?></h3>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
        ],
    ]) ?>
    <p class="pull-right">
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот типа? Удаление типа приведет к удалению всех связанных новостей с этим типом',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
