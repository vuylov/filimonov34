<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Newstype */

$this->title = 'Изменение типа:' . ' ' . $model->name;
?>
<div class="newstype-update">

    <h3 class="section-header"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
