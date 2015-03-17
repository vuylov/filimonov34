<?php
use newerton\fancybox\FancyBox;
use yii\helpers\Html;
echo FancyBox::widget([
    'target' => 'a[rel=fancybox]',
    'helpers' => true,
    'mouse' => true,
    'config' => [
        'maxWidth' => '90%',
        'maxHeight' => '90%',
        //'playSpeed' => 7000,
        'arrows' => false,
        'padding' => 0,
        'fitToView' => false,
        'width' => '70%',
        'height' => '70%',
        'autoSize' => false,
        'closeClick' => false,
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
        'prevEffect' => 'elastic',
        'nextEffect' => 'elastic',
        'closeBtn' => true,
        'openOpacity' => true,
        'autoCenter'  => true,
        'helpers' => [
            'title' => ['type' => 'float'],
            'buttons' => [],
            'thumbs' => ['width' => 68, 'height' => 50],
            'overlay' => [
                'css' => [
                    'background' => 'rgba(0, 0, 0, 0.8)'
                ]
            ]
        ],
    ]]);?>
<h3 class="section-header">СМИ обо мне</h3>
<div>
    <div class="list-group">
        <a href="<?=Yii::$app->homeUrl.'images/static/santafe.jpg';?>" rel="fancybox" class="list-group-item">Выбор сильных мира. Агат. Город автомобилей. №6(1/2013). Страница 1.</a>
        <a href="<?=Yii::$app->homeUrl.'images/static/santafe2.jpg';?>" rel="fancybox" class="list-group-item">Выбор сильных мира. Агат. Город автомобилей. №6(1/2013). Страница 2.</a>
        <a href="<?=Yii::$app->homeUrl.'images/static/v102.jpg';?>" rel="fancybox" class="list-group-item">Житель Волгограда установил новые мировые рекорды в пауэрлифтинге (Высота 102: http://v102.ru/sport/38908.html)</a>
    </div>
</div>
<?php
$this->title = "Олег Филимонов в прессе";
$this->registerMetaTag(['name' => 'keywords', 'content' => 'филимонов с сми, сми о филимонове']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Выбор сильных мира. Агат. Город автомобилей. №6(1/2013)']);
?>