<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'select-profit-form',
    'enableAjaxValidation'=>true,
    /*'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),*/
    'method'=>'post',
    'action' => Yii::app()->createUrl('settings/SelectOption?view='.$view),
    'layout'=>TbHtml::FORM_LAYOUT_INLINE,
)); ?>
<!--<fieldset>
    <legend>Profit Generate</legend>-->
    <div class="row">

        <div class="middle col-sm-7">

        <?php echo $form->radioButtonList($model,'ProfitOptions',array(
                'Option1' => '<div class="inline" title="Give a bigger to small prize">Bigger To Smaller Prize</div>',
                'Option2' => '<div class="inline" title="Give a smaller to bigger prize">Smaller to Bigger Prize</div>',
                'Option3' => '<div class="inline" title="Give all bigger to smaller prize">All Bigger to Smaller Prize</div>',
                'Option4' => '<div class="inline" title="Give all smaller to bigger prize">All Smaller to Bigger Prize</div>',
        ), array()); ?>

        </div>
        <div class="col-sm-2">
            <?php echo CHtml::activeTelField($model, 'amount_win_perc',
                array('class'=>'col-sm-12','id'=>'win_percentage','placeholder' => 'Minimum win percentage'));
            ?>
        </div>
        <div class="col-sm-2">
        <?php echo TbHtml::linkButton(Yii::t('app', 'Submit'), array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_SMALL,
            'icon' => 'ace-icon fa fa-plus white',
            'class'=> 'choose-option',
            //'url' => $this->createUrl('settings/SelectOption?view='.$view),
        )); ?>
        </div>

    </div>
<!--</fieldset>-->
<?php $this->endWidget(); ?>
