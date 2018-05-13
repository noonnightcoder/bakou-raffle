<?= $form->textFieldControlGroup($model,'adddress1',array('class'=>'span10','maxlength'=>60)); ?>

<?= $form->textFieldControlGroup($model,'address2',array('class'=>'span10','maxlength'=>60)); ?>

<?php //echo $form->textFieldControlGroup($model,'city_id',array('class'=>'span10')); ?>

<?= $form->textFieldControlGroup($model,'country_code',array('class'=>'span10','maxlength'=>2)); ?>

<?= $form->textFieldControlGroup($model,'email',array('class'=>'span10','maxlength'=>30,'data-type'=>'email')); ?>

<?= $form->textAreaControlGroup($model,'notes',array('rows'=>2, 'cols'=>20, 'class'=>'span10')); ?>