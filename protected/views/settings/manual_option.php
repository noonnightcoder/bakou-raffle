<style type="text/css">
    label{
        font-size: 12px;
    }

    label strong{
        font-size: 15px;
        color: blue;
    }
</style>

<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Manual Setting') => array('ManualSetting'),
    Yii::t('app', 'Manage'),
);
?>
<?php $this->renderPartial('partial/_js', array()); ?>
<div class="form" id="profit_container">
<?php $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Manual Raffle Setting',
    'headerIcon' => 'ace-icon fa fa-plus',
    'htmlHeaderOptions' => array('class' => 'widget-header-flat widget-header-small'),
    //'content' => $this->renderPartial('_form', array('model'=>$model,'model_search'=>$model_search,'leave_detail_wrapper'=>$leave_detail_wrapper,'employee_id'=>$employee_id), true),
)); ?>

    <div class="" id="profit_option">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'action'=>Yii::app()->createUrl('settings/ManualSelectTicket/view/manual_option'),
        'id'=>'manual-setting-form',
        'enableAjaxValidation'=>false,
        'layout'=>TbHtml::FORM_LAYOUT_HORIZONTAL,
        'htmlOptions'=> array('enctype'=>'multipart/form-data','class' =>'form-transp-input',)
    )); ?>


        <?php if($option=='') {?>
            <div class="container">
                <div class="col-sm-10">
                    <?php foreach (item::model()->findAll(array('order'=>'category_id',)) as $k=>$value){ ?>
                        <label class="control-label" for="<?php echo $value->name; ?>">
                            <strong><u><?php echo $value->name; ?></u></strong>
                        </label>
                        <?php for ($i=0; $i<$value->quantity; $i++) {?>
                            <div>
                                 <?php $this->renderPartial('partial/_select_ticket_number', array('category_id'=>$value->category_id,'myID'=>$i)); ?>
                            </div>
                            <br/>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-actions" id="manual-form-actions">
                    <?php echo TbHtml::linkButton(Yii::t('app', 'Save'), array(
                        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                        'size' => TbHtml::BUTTON_SIZE_SMALL,
                        'class' => 'save_manual_form',
                        'name' => 'Manual_setting',
                        //'disabled'=>$disabled
                        //'size'=>TbHtml::BUTTON_SIZE_SMALL,
                    )); ?>
                </div>
            </div>
        <?php } ?>


    <?php $this->endWidget(); ?>

    <?php if($option!='') {?>
        <?php $this->renderPartial('partial/_show_option',array(
            'model' => $model,
            'view'=>'manual_option',
            'option'=>$option,
            'win_percentage'=>$win_percentage,
        ));?>
        <br/><br/><br/><br/>
        <?php $this->renderPartial('//layouts/admin/_grid', array(
            'model' => $TmpBetResult,
            'data_provider' => $data_provider ,
            'grid_columns' => $grid_columns,
            'grid_id'=>'',
            'page_size'=>10,
        )); ?>
    <?php } ?>
    </div>
<?php $this->endWidget(); ?>

</div>
