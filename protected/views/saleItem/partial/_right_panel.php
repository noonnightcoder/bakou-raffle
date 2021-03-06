<!-- #right.panel -->
<div class="col-xs-12 col-sm-4 widget-container-col">

    <!-- #section:right.panel.header -->
    <?php $this->renderPartial('partial/_right_panel_header', array(
        'count_item' => $count_item,
    )); ?>
    <!-- #/section:right.panel.header -->

    <!-- #section:right.panel.client -->
    <?php $this->renderPartial('partial/_right_panel_client', array(
        'model' => $model,
        'customer' => $customer,
        'cust_fullname' => $cust_fullname,
        'customer_id' => $customer_id,
        'acc_balance' => $acc_balance,
        'sale_mode' => $sale_mode
    )); ?>
    <!-- #/section:right.panel.client -->

    <!-- #section:right.panel.payment -->
    <?php $this->renderPartial('partial/_right_panel_payment', array(
        'model' => $model,
        'count_item' => $count_item,
        'total' => $total,
        'sub_total' => $sub_total,
        'total_khr_round' => $total_khr_round,
        'discount_amount' => $discount_amount,
        'total_gst' => $total_gst,
        'count_payment' => $count_payment,
        'total_due' => $total_due,
        'customer' => $customer,
        'payments' => $payments,
        'amount_change' => $amount_change,
        'amount_change_whole' => $amount_change_whole,
        'amount_change_fraction_khr' => $amount_change_fraction_khr,
        'amount_change_khr_round' => $amount_change_khr_round,
        'discount_symbol' => $discount_symbol,
        'discount_amt' => $discount_amt,
        'gst_amount' => $gst_amount,
    )); ?>
    <!-- #/section:right.panel.payment -->

</div> <!-- /right.panel -->
