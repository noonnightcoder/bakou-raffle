<style>
    form { display:inline }
</style>
<label class="col-xs-3 control-label required" for="SalePayment_payment_amount">  </label>
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
        'id'=>'profit_form',
        'method'=>'post',
        //'action' => Yii::app()->createUrl('settings/RemoveOption?view='.$view),
        'layout'=>TbHtml::FORM_LAYOUT_INLINE,
    )); ?>

    <?php echo TbHtml::linkButton(Yii::t( 'app', '' ),array(
            'color'=>TbHtml::BUTTON_COLOR_SUCCESS,
            'size'=>TbHtml::BUTTON_SIZE_MINI,
            'icon'=>'glyphicon-ok white',
            'class'=>'btn btn-sm detach-customer',
            'title'=>'Ok to go!'
        )); ?>

    <?php $this->endWidget(); ?>

</div>
