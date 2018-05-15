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
        <?php $this->renderPartial('_address',array(
            'model' => $model,
            'form' => $form,
        ));?>
        <?= $form->textAreaControlGroup($model, 'notes',
            array('rows' => 2, 'cols' => 20, 'class' => 'span3')); ?>
    </div>
    <div class="col-sm-7">
        <h4 class="header blue bolder smaller"><i class="ace-icon fa fa-key blue"></i><?php echo Yii::t('app','Login Info') ?></h4>
        <?php
            $this->renderPartial('//rbacUser/_login_form',array(
                'model' => $model,
                'user' => $user,
                'form' => $form,
                'disabled' => $disabled,
            ));
        ?>
        <!--<h4 class="header blue bolder"><i class="ace-icon fa fa-gavel blue"></i><?php //Yii::t('app','Permissions and Access'); ?></h4>-->
        <?php
            /*$this->renderPartial('//rbacUser/_permission_form',array(
            'user' => $user,
            ));*/
        ?>
        <div class="form-actions">
            <?= TbHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'),
                array(
                    'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                    'name'=>'Submit-btn',
                    'value'=>$model->isNewRecord ?'Create':'Save'
                    //'size'=>TbHtml::BUTTON_SIZE_SMALL,
                )); ?>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>
<?php Yii::app()->clientScript->registerScript('setFocus',  '$("#Client_mobile_no").focus();'); ?>
<?php Yii::app()->clientScript->registerScript('alertTimeout', '$(".alert").fadeTo(5000, 0).slideUp(1000, function() { $(this).remove(); });'); ?>

