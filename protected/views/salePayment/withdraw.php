<?php
$this->breadcrumbs = array(
    Yii::t('app', sysRWithdraw()) => array('salePayment/withdraw'),
    Yii::t('app', 'Index'),
);

?>

<div id="payment_container">

    <?php $this->widget( 'ext.modaldlg.EModalDlg' ); ?>

    <?php $this->renderPartial('partial/_search', array('model' => $model, 'client_name' => $client_name)); ?>

    <?php $box = $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
        'title' => Yii::t('app', sysRWithdraw()) . ' :  ' . $client_name,
        'headerIcon' => 'ace-icon fa fa-credit-card',
        'htmlHeaderOptions' => array('class' => 'widget-header-flat widget-header-small'),
    )); ?>

    <!-- Flash message layouts.partial._flash_message -->
    <?php $this->renderPartial('//layouts/partial/_flash_message'); ?>

    <div class="row">
        <div class="sidebar-nav" id="client_cart">
            <?php
            if ($client_name == '')
            {
                $this->renderPartial('partial/_client', array('model' => $model,'view'=>'withdraw'));
                $save_button='disabled';
            } else {
                $this->renderPartial('partial/_client_selected', array('model' => $model,
                        'balance' => $balance,
                        'client_id' => $client_id,
                        'client_name' => $client_name,
                        'view'=>'withdraw'
                    )
                );

                $save_button='';
            }
            ?>
        </div>
    </div>

    <div id="sale_payment_cart">

        <?php $this->renderPartial('partial/_payment_form', array('model' => $model, 'save_button' => $save_button,
                                                                    'invoice_balance' => $invoice_balance,'type'=>'raffle_withdraw')); ?>

    </div>

    <?php $this->endWidget(); ?>

</div>