<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Mediatype;
use kartik\file\FileInput;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model app\models\Media */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="media-form">

    <?php $form = ActiveForm::begin([
        'options'   => [
            'enctype'   => 'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($model, 'mediatype_id')->dropDownList(ArrayHelper::map(Mediatype::find()->all(), 'id', 'name'), [
        'prompt'    => 'Выберите тип'
    ])?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'description')->widget(Widget::className(),[
        'settings'  => [
            'lang'          => 'ru',
            'minHeight'     => 200,
            'pastePlainText'=> true,
            'plugins'       => ['talbe', 'fullscreen', 'video', 'fontsize', 'fontcolor']
        ]
    ]);?>

    <?= $form->field($model, 'code')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_seo')->textarea(['rows' => 6]) ?>

    <?php if(!$model->isNewRecord):?>

        <?php if(count($model->files) > 0):?>
            <?php foreach($model->files as $file):?>

                <div class="img-container img-project-index" style="background-image: url('<?= Yii::$app->homeUrl.$file->path; ?>')">
                    <?= Html::a('Удалить', ['file/delete', 'id' => $file->id], ['class' => 'delete-link',
                        'onclick'   => "
                            $.ajax({
                                type: 'POST',
                                cache: false,
                                url: '".Url::to(['file/delete', 'id' => $file->id])."',
                                success: function(response){
                                    alert('Изображение удалено');
                                    location.reload();
                                }
                            });return false;"
                    ]);?>
                </div>

            <?php endforeach;?>
                <div class="clearfix"></div>
        <?php endif;?>

    <?php endif;?>

    <?php echo $form->field($model, 'file[]')->widget(FileInput::classname(),[
        'options'       => [
            'accept' => 'image/*',
            'multiple' => true
        ],
        'pluginOptions' => [
            'showUpload'        => false,
            'browseLabel'       => 'Обзор',
            'removeLabel'       => 'Удалить',
            'overwriteInitial'  => true,
        ],
    ]);
    ?>
    <div class="form-group pull-right">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
