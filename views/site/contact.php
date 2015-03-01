<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h3 class="section-header"><?= Html::encode($this->title) ?></h3>
    <div class="row">
        <div class="col-md-5">
            <img src="<?=Yii::$app->homeUrl.'images/static/avatar.jpg';?>" width="200px" class="img-circle">
        </div>
        <div class="col-md-7">
            <p>Встретиться со мной можно в <?= Html::a('СК «Арена-Юг»', ['media/view', 'id' => 8]) ?></p>
            <p style="text-align: center">или</p>
            <p>связаться по электронной почте: <?= Html::mailto('oa.filimonov@gmail.com', 'mailto:oa.filimonov@gmail.com') ?></p>
        </div>
    </div>
</div>
