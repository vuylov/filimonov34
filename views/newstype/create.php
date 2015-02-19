<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Newstype */

$this->title = 'Создание типа';
?>
<div class="newstype-create">

    <h3 class="section-header"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
