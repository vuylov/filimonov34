<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Newstype;
use vova07\imperavi\Widget;
use kartik\file\FileInput;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin([
        'options'   => [
            'enctype'   => 'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($model, 'newstype_id')->dropDownList(ArrayHelper::map(Newstype::find()->all(), 'id', 'name'), [
        'prompt'    => 'Выберите тип новости'
    ]) ?>

    <?= $form->field($model, 'active')->checkbox([
        'checked'   => 'checked'
    ]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'brief')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'description')->widget(Widget::className(),[
        'settings'  => [
            'lang'          => 'ru',
            'minHeight'     => 200,
            'pastePlainText'=> true,
            'plugins'       => ['talbe', 'fullscreen', 'video', 'fontsize', 'fontcolor']
        ]
    ]);?>

    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_seo')->textarea(['rows' => 6]) ?>


    <?php if($model->thumb):?>
        <div class="image-item">
            <?=Html::img('@web/upload/news/'.$model->thumb, ['class' => 'thumbnail-image']);?>
            <?=Html::a('Удалить', ['news/deletetmb', 'id' => $model->id],[
                'class' => 'btn btn-danger delete-image',
                'onclick'   => "
                            $.ajax({
                                type: 'POST',
                                cache: false,
                                url: '".Url::to(['news/deletetmb', 'id' => $model->id])."',
                                success: function(response){
                                    alert(response);
                                    location.reload();
                                }
                            });return false;
                        "
            ]);?>
        </div>
    <?php else:?>
        <?php echo $form->field($model, 'file')->widget(FileInput::classname(),[
            'options'       => [
                'accept' => 'image/*',
            ],
            'pluginOptions' => [
                'showUpload'        => false,
                'browseLabel'       => 'Обзор',
                'removeLabel'       => 'Удалить',
                'overwriteInitial'  => true,
            ],
        ]);
        ?>
    <?php endif;?>
    <div class="form-group pull-right">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
