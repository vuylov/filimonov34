<?php
?>
<h3 class="section-header">Фотогалерея</h3>
<div class="index-foto">
    <?php if(count($models) > 0):?>
        <?= $this->render('_media', ['models' => $models]);?>
    <?php else: ?>
        <div class="alert alert-danger">Фотографии не загружены</div>
    <?php endif;?>
</div>