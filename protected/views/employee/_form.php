<div class="row">
        <?php $this->widget('bootstrap.widgets.TbAlert', array(
                'block'=>true, // display a larger alert block?
                'fade'=>true, // use transitions?
                'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
                'alerts'=>array( // configurations per alert type
                    'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), 
                    'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'),
                ),
        )); ?>

        <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                'id'=>'employee-form',
                'enableAjaxValidation'=>false,
                'layout'=>TbHtml::FORM_LAYOUT_HORIZONTAL,
        )); ?>

        <div class="col-sm-5">
            <h4 class="header blue"><i class="ace-icon fa fa-info-circle blue"></i><?php echo Yii::t('app','Employee Basic Information') ?></h4>
                <p class="help-block"><?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?></p>

                <?php //echo $form->errorSummary($model); ?>

                <?= $form->textFieldControlGroup($model,'first_name',array('class'=>'span10','maxlength'=>50,'data-required'=>'true')); ?>

                <?= $form->textFieldControlGroup($model,'last_name',array('class'=>'span10','maxlength'=>50,'data-required'=>'true')); ?>

                <?= $form->textFieldControlGroup($model,'mobile_no',array('class'=>'span10','maxlength'=>15)); ?>

                <div class="form-group">

                    <label class="col-sm-3 control-label" for="Employee_dob"><?php echo Yii::t('app','Date of Birth') ?></label>

                    <div class="col-sm-9">

                        <?= CHtml::activeDropDownList($model, 'day', Employee::itemAlias('day'), array('prompt' => yii::t('app','Day'))); ?>

                        <?= CHtml::activeDropDownList($model, 'month', Employee::itemAlias('month'), array('prompt' => yii::t('app','Month'))); ?>

                        <?= CHtml::activeDropDownList($model, 'year', Employee::itemAlias('year'), array('prompt' => yii::t('app','Year'))); ?>

                        <span class="help-block"> <?php echo $form->error($model,'dob'); ?> </span>
                    </div>

                </div>

                <?php $this->renderPartial('_address',array(
                    'model' => $model,
                    'form' => $form,
                ));?>

        </div>

        <div class="col-sm-7"   >
                <h4 class="header blue bolder smaller"><i class="ace-icon fa fa-key blue"></i><?php echo Yii::t('app','Employee Login Info') ?></h4>

                <?php $this->renderPartial('//rbacUser/_login_form',array(
                    'model' => $model,
                    'user' => $user,
                    'form' => $form,
                    'disabled' => $disabled,
                ));?>


                <h4 class="header blue bolder"><i class="ace-icon fa fa-gavel blue"></i><?= Yii::t('app','Employee Permissions and Access'); ?></h4>

                <?php $this->renderPartial('//rbacUser/_permission_form',array(
                    'user' => $user,
                ));?>

            <div class="form-actions">
                <?php echo TbHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),array(
                   'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                   //'size'=>TbHtml::BUTTON_SIZE_SMALL,
               )); ?>
            </div>
        </div>
        <?php $this->endWidget(); ?>
</div>

<?php Yii::app()->clientScript->registerScript('setFocus',  '$("#Employee_first_name").focus();'); ?>
