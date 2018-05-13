<?= $form->textFieldControlGroup($model,'fax',array('class'=>'span3','maxlength'=>30)); ?>

<?= $form->textFieldControlGroup($model, 'address1', array('class' => 'span3', 'maxlength' => 60)); ?>

<?= $form->textFieldControlGroup($model, 'address2', array('class' => 'span3', 'maxlength' => 60)); ?>

<?= $form->dropDownListControlGroup($model, 'city_id', City::model()->getCity(),
    array(
        'class' => 'span3',
        'empty' => Yii::t('app', 'Select City'),
        'ajax' => array(
            'type' => 'POST', //request type
            'url' => CController::createUrl('DynamicDistrict'),
            'update'=>'#Client_district_id', //selector to update
        )
    )); ?>

<?= $form->dropDownListControlGroup($model, 'district_id', District::model()->getDistrict(),
    array(
        'class' => 'span3',
        'empty' => Yii::t('app', 'Select District'),
        'ajax' => array(
            'type' => 'POST', //request type
            'url' => CController::createUrl('DynamicCommune'),
            'update'=>'#Client_commune_id', //selector to update
        )
    )
); ?>

<?= $form->dropDownListControlGroup($model, 'commune_id', Commune::model()->getCommune(),
    array(
        'class' => 'span3',
        'empty' => Yii::t('app', 'Select Commune'),
    )
); ?>

<?= $form->dropDownListControlGroup($model, 'village_id', Village::model()->getVillage(),
    array(
        'class' => 'span3',
        'empty' => Yii::t('app', 'Select Village'),
    )
); ?>

<?= $form->textFieldControlGroup($model, 'gps_n', array('class' => 'span3', 'maxlength' => 25)); ?>

<?= $form->textFieldControlGroup($model, 'gps_e', array('class' => 'span3', 'maxlength' => 25)); ?>
