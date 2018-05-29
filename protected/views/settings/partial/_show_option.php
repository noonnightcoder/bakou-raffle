<style>
    form { display:inline }
</style>
<label class="col-xs-2 control-label required" for="SalePayment_payment_amount">  </label>
<div class="col-xs-9">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'profit_form',
        'method'=>'post',
        'action' => Yii::app()->createUrl('settings/RemoveOption?view='.$view),
        'layout'=>TbHtml::FORM_LAYOUT_INLINE,
    )); ?>

        <span style="font-size:20px;font-weight:bold;color:brown">
            You have choose: <?php echo $option; ?> with minimum winner <?php echo $win_percentage; ?>%
        </span>

        <?php echo TbHtml::linkButton(Yii::t( 'app', '' ),array(
            'color'=>TbHtml::BUTTON_COLOR_WARNING,
            'size'=>TbHtml::BUTTON_SIZE_MINI,
            'icon'=>'glyphicon-remove white',
            'class'=>'btn btn-sm detach-option',
            'title'=>'Cancel',
            //'url' => Yii::app()->createUrl('settings/RemoveOption?view='.$view),
        )); ?>
    <?php $this->endWidget(); ?>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'deal-option-form',
        'method'=>'post',
        'action' => Yii::app()->createUrl('settings/GenerateOption?view='.$view),
        'layout'=>TbHtml::FORM_LAYOUT_INLINE,
    )); ?>

    <?php echo TbHtml::linkButton(Yii::t( 'app', '' ),array(
            'color'=>TbHtml::BUTTON_COLOR_SUCCESS,
            'size'=>TbHtml::BUTTON_SIZE_MINI,
            'icon'=>'glyphicon-ok white',
            'class'=>'btn btn-sm deal-option',
            'title'=>'Ok to go!'
        )); ?>

    <?php $this->endWidget(); ?>
    <div class="row">
        <div class="col-sm-9">
            <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                'id'=>'info-form',
                'method'=>'post',
                //'action' => Yii::app()->createUrl('settings/RemoveOption?view='.$view),
                'layout'=>TbHtml::FORM_LAYOUT_VERTICAL,
            )); ?>

            <?php echo $form->textFieldControlGroup($model,'profit_got',array('class'=>'span3')); ?>
            <?php echo $form->textFieldControlGroup($model,'prize_amount',array('class'=>'span3')); ?>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
