<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Competition */

$this->title = 'Добавить соревнования';
/*$this->params['breadcrumbs'][] = ['label' => 'Competitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="competition-create">

    <h3 class="section-header"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
