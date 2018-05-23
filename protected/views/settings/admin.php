<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Profit Setting') => array('ProfitSetting'),
    Yii::t('app', 'Manage'),
);
?>
<div class="row" id="profit_container">
    <?php $this->renderPartial('partial/_js', array()); ?>
    <div class="col-xs-12 widget-container-col ui-sortable">

        <?php $box = $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
            'title' => Yii::t('app', 'Profit Setting'),
            'headerIcon' => 'ace-icon fa fa-list',
            'htmlHeaderOptions' => array('class' => 'widget-header-flat widget-header-small'),
        )); ?>

            <div class="" id="profit_option">
                <?php if($option=='') {?>
                    <!-- Admin Header layouts.admin._header -->
                        <?php $this->renderPartial('partial/_header',array(
                            'model' => $model,
                            'view'=>'admin',
                        ));?>

                <?php }else{ ?>
                    <?php $this->renderPartial('partial/_show_option',array(
                        'model' => $model,
                        'view'=>'admin',
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
        <!-- Flash message layouts.partial._flash_message -->
        <?php $this->renderPartial('//layouts/partial/_flash_message'); ?>

        <?php $this->endWidget(); ?>

    </div>
</div>
