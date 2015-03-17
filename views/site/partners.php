<?php
use yii\helpers\Html;
?>
<h3 class="section-header">Партнеры</h3>
<div>
    <a href="http://mspit.ru" target="_blank">
        <?= Html::img('@web/images/static/mspit-logo.png');?>
    </a>
</div>
<?php
$this->title = "Наши партнеры";
$this->registerMetaTag(['name' => 'keywords', 'content' => 'партнеры филимонова, наши друзься']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Парнтеры сайта Олега Филимонова']);
?>