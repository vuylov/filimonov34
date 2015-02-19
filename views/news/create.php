<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = 'Добавление новости';
//$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">

    <h3 class="section-header"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
