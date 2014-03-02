<?php if ($uploaded): ?>
<p>Файл успешно загружен. Проверьте <?php echo $dir?></p>
<?php endif ?>
<?php echo CHtml::beginForm('','post',array('enctype' => 'multipart/form-data')) ?>
<?php echo CHtml::error($model,'file') ?>
<?php echo CHtml::activeFileField($model,'file') ?>
<?php echo CHtml::submitButton('upload') ?>
<?php echo CHtml::endForm() ?>
<img src="/images/"
     <?php echo $file->getName; ?>
