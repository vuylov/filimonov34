<?php
use Faker\Factory;
/* @var $this yii\web\View */
$this->title = 'Официальный сайт Олега Филимонова';
?>
<h3 class="page-caption">Новости</h3>
<hr>
<div class="site-index">
    <?php $faker = Factory::create();
    echo $faker->sentence(500, true);?>
</div>
