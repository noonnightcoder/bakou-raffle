<?= $form->textFieldControlGroup($model, 'gps_n', array('class' => 'span3', 'maxlength' => 25)); ?>

<?= $form->textFieldControlGroup($model, 'gps_e', array('class' => 'span3', 'maxlength' => 25)); ?>

<?= $form->dropDownListControlGroup($model, 'size_biz',Common::arrayFactory('size_biz')); ?>

<?= $form->dropDownListControlGroup($model, 'main_biz',Common::arrayFactory('main_biz')); ?>