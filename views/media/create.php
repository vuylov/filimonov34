<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Media */

$this->title = 'Добавление медиа/фото';
//$this->params['breadcrumbs'][] = ['label' => 'Media', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-create">

    <h3 class="section-header"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
