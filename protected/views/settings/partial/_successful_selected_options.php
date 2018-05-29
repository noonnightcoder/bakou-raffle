<?php $this->renderPartial('partial/_js', array()); ?>
<?php $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Raffle Setting was successful',
    'headerIcon' => 'ace-icon fa fa-plus',
    'htmlHeaderOptions' => array('class' => 'widget-header-flat widget-header-small'),
)); ?>

<?php $this->renderPartial('//layouts/admin/_grid', array(
    'model' => $TmpBetResult,
    'data_provider' => $data_provider ,
    'grid_columns' => $grid_columns,
    'grid_id'=>'',
    'page_size'=>10,
)); ?>

<?php $this->endWidget(); ?>
