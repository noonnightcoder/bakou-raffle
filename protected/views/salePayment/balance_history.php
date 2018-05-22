<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Check Balance') => array('salePayment/BalanceHistory'),
    Yii::t('app', 'Index'),
);

?>

<div id="payment_container">

    <?php $this->widget( 'ext.modaldlg.EModalDlg' ); ?>

    <?php $this->renderPartial('partial/_search', array('model' => $model, 'client_name' => $client_name)); ?>

    <?php $box = $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
        'title' => Yii::t('app', 'Check Balance') . ' :  ' . $client_name,
        'headerIcon' => 'ace-icon fa fa-credit-card',
        'htmlHeaderOptions' => array('class' => 'widget-header-flat widget-header-small'),
    )); ?>

    <!-- Flash message layouts.partial._flash_message -->
    <?php $this->renderPartial('//layouts/partial/_flash_message'); ?>

    <div class="row">
        <div class="page-header" id="client_cart">
            <?php
            if ($client_name == '')
            {
                $this->renderPartial('partial/_client', array('model' => $model,'view'=>'balance_history'));
            } else {
                $this->renderPartial('partial/_client_selected', array('model' => $model,
                        'balance' => $balance,
                        'client_id' => $client_id,
                        'client_name' => $client_name,
                        'view'=>'balance_history'
                    )
                );
                echo "<div>";
                    $this->renderPartial('partial/_invoice_payment_sub',array('model' => $model,'client_name'=>$client_name, 'client_id' => $client_id, 'balance' => $balance));
                echo "</div>";
            }
            ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>


</div>