<div id="register_container">

    <?= invNumPrefix() ?>

    <?php $this->renderPartial('partial/_left_panel',
        array(
            'model' => $model,
            'items' => $items,
            'employee_id' => $employee_id,
            'disable_editprice' => $disable_editprice,
            'disable_discount' => $disable_discount,
            'discount_symbol' => $discount_symbol,
        )); ?>

    <?php $this->renderPartial('partial/_right_panel', array(
        'model' => $model,
        'count_item' => $count_item,
        'customer' => $customer,
        'cust_fullname' => $cust_fullname,
        'customer_id' => $customer_id,
        'acc_balance' => $acc_balance,
        'sale_mode' => $sale_mode,
        'sub_total' => $sub_total,
        'total' => $total,
        'total_khr_round' => $total_khr_round,
        'discount_amount' => $discount_amount,
        'total_gst' => $total_gst,
        'count_payment' => $count_payment,
        'total_due' => $total_due,
        'payments' => $payments,
        'amount_change' => $amount_change,
        'amount_change_whole' => $amount_change_whole,
        'amount_change_fraction_khr' => $amount_change_fraction_khr,
        'amount_change_khr_round' => $amount_change_khr_round,
        'discount_symbol' => $discount_symbol,
        'discount_amt' => $discount_amt,
        'gst_amount' => $gst_amount,
    )); ?>

    <?php $this->renderPartial('partial/_js'); ?>

</div>
