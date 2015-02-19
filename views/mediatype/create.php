<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mediatype */

$this->title = 'Create Mediatype';
$this->params['breadcrumbs'][] = ['label' => 'Mediatypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mediatype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
