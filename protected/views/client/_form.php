<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'client-form',
	'enableAjaxValidation'=>false,
        'layout'=>TbHtml::FORM_LAYOUT_HORIZONTAL,
        'htmlOptions'=>array('data-validate'=>'parsley'),
)); ?>

<div id="client_info">

    <div class="col-sm-5">
        <h4 class="header blue"><i class="ace-icon fa fa-info-circle blue"></i><?php echo Yii::t('app',
                sysMenuCustomer() . ' Basic Information') ?></h4>

        <p class="help-block"><?= Yii::t('app', 'Fields with'); ?> <span
                class="required">*</span> <?= Yii::t('app', 'are required'); ?></p>

        <?= $form->textFieldControlGroup($model, 'mobile_no', array('class' => 'span3', 'maxlength' => 15)); ?>

        <?= $form->textFieldControlGroup($model, 'first_name', array('class' => 'span3', 'maxlength' => 60)); ?>

        <?= $form->textFieldControlGroup($model, 'last_name', array('class' => 'span3', 'maxlength' => 60)); ?>

        <div class="form-group">

            <label class="col-sm-3 control-label" for="Client_dob"><?= Yii::t('app','Date of Birth') ?></label>

            <div class="<?= $has_error; ?> col-sm-9">

                <?= CHtml::activeDropDownList($model, 'day', Employee::itemAlias('day'), array('prompt' => yii::t('app','Day'))); ?>

                <?= CHtml::activeDropDownList($model, 'month', Employee::itemAlias('month'), array('prompt' => yii::t('app','Month'))); ?>

                <?= CHtml::activeDropDownList($model, 'year', Employee::itemAlias('year'), array('prompt' => yii::t('app','Year'))); ?>

                <span class="help-block"> <?= $form->error($model,'dob'); ?> </span>
            </div>

        </div>

        <?php //echo $form->dropDownListRow($model,'debter_id', DebtCollector::model()->getDebterInfo(), array('class'=>'span3','prompt'=>'Select Debt Colletor')); ?>

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

        <?php /*echo CHtml::dropDownList('Client_district_id','', array()); */?>


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

        <?= $form->textAreaControlGroup($model, 'notes',
            array('rows' => 2, 'cols' => 20, 'class' => 'span3')); ?>

    </div>

    <div class="col-sm-7">

        <h4 class="header blue bolder smaller"><i class="ace-icon fa fa-key blue"></i><?php echo Yii::t('app','Login Info') ?></h4>

        <?php $this->renderPartial('//rbacUser/_login_form',array(
            'model' => $model,
            'user' => $user,
            'form' => $form,
            'disabled' => true,
        ));?>

        <?php $this->renderPartial('//contact/_form',array(
            'contact' => $contact,
            'form' => $form
        ));?>

        <div class="form-actions">
            <?= TbHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'),
                array(
                    'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                    //'size'=>TbHtml::BUTTON_SIZE_SMALL,
                )); ?>
        </div>

    </div>

</div>



<?php $this->endWidget(); ?>

<?php Yii::app()->clientScript->registerScript('setFocus',  '$("#Client_mobile_no").focus();'); ?>

<?php Yii::app()->clientScript->registerScript('alertTimeout', '$(".alert").fadeTo(5000, 0).slideUp(1000, function() { $(this).remove(); });'); ?>

