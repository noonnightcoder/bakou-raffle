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

        <div class="middle col-sm-5">

        <?php echo $form->radioButtonList($model,'ProfitOptions',array(
                'option1' => '<div class="inline" title="This is my tooltip 1">Option one</div>',
                'option2' => '<div class="inline" title="This is my tooltip 2">Option two</div>',
                'option3' => '<div class="inline" title="This is my tooltip 3">Option three</div>',
                'option4' => '<div class="inline" title="This is my tooltip 4">Option four</div>',
        ), array()); ?>

        </div>
        <div class="col-sm-3">
            <?php echo CHtml::activeTelField($model, 'amount_win_perc',
                array('class'=>'col-sm-12','id'=>'win_percentage','placeholder' => 'Minimum win percentage'));
            ?>
        </div>
        <div class="col-sm-3">
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
