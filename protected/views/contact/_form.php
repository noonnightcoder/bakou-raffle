<h4 class="header blue bolder smaller"><i class="ace-icon fa fa-map-marker blue"></i>
    <?= Yii::t('app', sysMenuCustomer() . ' Contact Person Info') ?>
</h4>

<?= $form->textFieldControlGroup($contact, 'mobile_no', array('class' => 'span3', 'maxlength' => 15)); ?>

<?= $form->textFieldControlGroup($contact, 'first_name', array('class' => 'span3', 'maxlength' => 60)); ?>

<?= $form->textFieldControlGroup($contact, 'last_name', array('class' => 'span3', 'maxlength' => 60)); ?>

<?= $form->textFieldControlGroup($contact, 'address1', array('class' => 'span3', 'maxlength' => 60)); ?>

<?= $form->textFieldControlGroup($contact, 'address2', array('class' => 'span3', 'maxlength' => 60)); ?>
