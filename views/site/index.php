<?php
use Faker\Factory;
/* @var $this yii\web\View */
$this->title = 'Официальный сайт Олега Филимонова';
?>
<h3 class="section-header">Новости</h3>
<div class="site-index">

    <?php $faker = Factory::create();
    echo $faker->sentence(500, true);
    echo Yii::$app->user->id;
    ?>
</div>
