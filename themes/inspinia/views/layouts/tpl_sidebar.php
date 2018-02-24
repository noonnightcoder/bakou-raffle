<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">

        <?php
        $this->widget('bootstrap.widgets.TbNav', array(
            'type' => TbHtml::NAV_TYPE_LIST,
            'htmlOptions' => array(
                'class' => 'metismenu',
                'id' => 'side-menu'
            ),
            'submenuHtmlOptions'=>array('class'=>'nav nav-second-level'),
            'encodeLabel' => false,
            'items' => array(
                array('label'=> '<i class="fa fa-bar-chart-o"></i><span class="nav-label">' . strtoupper(Yii::t('app', 'Dashboard')) . '</span>',
                    //'icon'=>'fa fa-bar-chart-o',
                    'url'=>url('dashboard/view'),
                    'active'=>$this->id .'/'. $this->action->id=='dashboard/view'?true:false,
                    'visible'=> chk('report.index')
                ),
                array('label'=>'<i class="fa fa-coffee"></i><span class="nav-label">' . strtoupper(Yii::t('app', 'Item')) . '</span>',
                    //'icon'=>'fa fa-coffee',
                    'url'=>url('item/admin'),
                    'active'=> $this->id == 'item' ,
                    'visible'=> chk('item.index') || chk('item.create') || chk('item.update') || chk('item.delete')),
                array('label'=> '<i class="fa fa-desktop"></i><span class="nav-label">' . strtoupper(Yii::t('app','Transaction')) . '</span><span class="fa arrow"></span>',
                    //'icon'=>'fa fa-desktop',
                    'url'=>url('receivingItem/index'),
                    'active'=>$this->id .'/'. $this->action->id=='receivingItem/index',
                    'visible'=> chk('transaction.receive') || chk('transaction.return') || chk('transaction.adjustin') || chk('transaction.adjustout') || chk('transaction.count') ,
                    'items'=>array(
                        array('label'=> Yii::t('app','Receive from Supplier'),'icon'=> 'fa fa-caret-right', 'url'=>url('receivingItem/index',array('trans_mode'=>'receive')), 'active'=>$this->id .'/'. $this->action->id .'/'.Yii::app()->request->getQuery('trans_mode')=='receivingItem/index/receive','visible'=>chk('transaction.receive')),
                        array('label'=> Yii::t('app','Return to Supplier'), 'icon'=> 'fa fa-caret-right', 'url'=>url('receivingItem/index',array('trans_mode'=>'return')),'active'=>$this->id .'/'. $this->action->id .'/'.Yii::app()->request->getQuery('trans_mode')=='receivingItem/index/return','visible'=>chk('transaction.return')),
                        //array('label'=> Yii::t('app','Adjustment In'),'icon'=> 'fa fa-caret-right', 'url'=>url('receivingItem/index',array('trans_mode'=>'adjustment_in')),'active'=>$this->id .'/'. $this->action->id.'/'.Yii::app()->request->getQuery('trans_mode')=='receivingItem/index/adjustment_in','visible'=>chk('transaction.adjustin')),
                        //array('label'=> Yii::t('app','Adjustment Out'),'icon'=> 'fa fa-caret-right', 'url'=>url('receivingItem/index',array('trans_mode'=>'adjustment_out')),'active'=>$this->id .'/'. $this->action->id.'/'.Yii::app()->request->getQuery('trans_mode')=='receivingItem/index/adjustment_out','visible'=>chk('transaction.adjustout')),
                        array('label'=> Yii::t('app','Physical Count'),'icon'=> 'fa fa-caret-right', 'url'=>url('receivingItem/index',array('trans_mode'=>'physical_count')),'active'=>$this->id .'/'. $this->action->id.'/'.Yii::app()->request->getQuery('trans_mode')=='receivingItem/index/physical_count','visible'=>chk('transaction.count')),
                    )),
                array('label'=>'<i class="fa fa-shopping-cart"></i><span class="nav-label">' . strtoupper(Yii::t('app', 'Sale')). '</span>',
                    //'icon'=>'fa fa-shopping-cart',
                    'url'=>url('saleItem/index'),
                    'active'=>$this->id .'/'. $this->action->id=='saleItem/index',
                    'visible'=> chk('sale.edit') || chk('sale.discount') || chk('sale.editprice') ),
                array('label'=>'<i class="fa fa-heart"></i><span class="nav-label">' . strtoupper(Yii::t('app', 'Payment')) . '</span>',
                    //'icon'=>'fa fa-heart',
                    'url'=>url('salePayment/index'),
                    'active'=>$this->id .'/'. $this->action->id=='salePayment/index',
                    'visible'=>chk('payment.index')),
                array('label'=>'<i class="fa fa-credit-card"></i><span class="nav-label">' . strtoupper(Yii::t('app', 'Supplier Payment')) . '</span>',
                    //'icon'=>'fa fa-credit-card',
                    'url'=>url('receivingPayment/index'),
                    'active'=>$this->id .'/'. $this->action->id=='receivingPayment/index',
                    'visible'=>chk('payment.index')),
                array('label'=>'<i class="fa fa-signal"></i><span class="nav-label">' . strtoupper(Yii::t('app', 'Report')) .'</span><span class="fa arrow">',
                    //'icon'=>'fa fa-signal',
                    'url'=>url('report/reporttab'),
                    'active'=>$this->id =='report',
                    'visible'=> chk('report.index') || chk('invoice.index') || chk('invoice.print') || chk('invoice.delete') || chk('invoice.update') ,
                    'items'=>array(
                        array('label'=> Yii::t('app','Sale Invoice'),'icon'=> 'fa fa-caret-right', 'url'=>url('report/SaleInvoice'),
                            'active'=>$this->id .'/'. $this->action->id =='report/SaleInvoice',
                            'visible'=> chk('invoice.index') || chk('invoice.print') || chk('invoice.delete') || chk('invoice.update')
                        ),
                        array('label'=> Yii::t('app','Sale Daily'), 'icon'=> 'fa fa-caret-right', 'url'=>url('report/SaleDaily'),
                            'active'=>$this->id .'/'. $this->action->id =='report/SaleDaily',
                            'visible'=> chk('report.index')
                        ),
                        array('label'=> Yii::t('app','Sale Hourly'), 'icon'=> 'fa fa-caret-right', 'url'=>url('report/SaleHourly'),
                            'active'=>$this->id .'/'. $this->action->id =='report/SaleHourly',
                            'visible'=> chk('report.index')
                        ),
                        array('label'=> Yii::t('app','Sale Summary'), 'icon'=> 'fa fa-caret-right', 'url'=>url('report/SaleSummary'),
                            'active'=>$this->id .'/'. $this->action->id =='report/SaleSummary',
                            'visible'=> chk('report.index')
                        ),
                        array('label'=> Yii::t('app','Sale By Sale Rep'), 'icon'=> 'fa fa-caret-right', 'url'=>url('report/SaleSumBySaleRep'),
                            'active'=>$this->id .'/'. $this->action->id =='report/SaleSumBySaleRep',
                            'visible'=> chk('report.index')
                        ),
                        array('label'=> Yii::t('app','Sale Weekly By Customer'), 'icon'=> 'fa fa-caret-right', 'url'=>url('report/SaleWeeklyByCustomer'),
                            'active'=>$this->id .'/'. $this->action->id =='report/SaleWeeklyByCustomer',
                            'visible'=> chk('report.index')
                        ),
                        array('label'=> Yii::t('app','Outstanding Balance'), 'icon'=> 'fa fa-caret-right', 'url'=>url('report/outstandingInvoice'),
                            'active'=>$this->id .'/'. $this->action->id =='report/outstandingInvoice',
                            'visible'=> chk('report.index')
                        ),
                        array('label'=> Yii::t('app','Profit Daily Sum'),'icon'=> 'fa fa-caret-right', 'url'=>url('report/ProfitDailySum'),
                            'active'=>$this->id .'/'. $this->action->id =='report/ProfitDailySum',
                            'visible'=> chk('report.profit')
                        ),
                        array('label'=> Yii::t('app','Payment Receive'),'icon'=> 'fa fa-caret-right', 'url'=>url('report/PaymentReceiveByEmployee'),
                            'active'=>$this->id .'/'. $this->action->id =='report/PaymentReceiveByEmployee',
                            'visible'=> chk('report.index')
                        ),
                        array('label'=> Yii::t('app','Best Selling Item'),'icon'=> 'fa fa-caret-right', 'url'=>url('report/TopItem'),
                            'active'=>$this->id .'/'. $this->action->id =='report/TopItem',
                            'visible'=> chk('report.index')
                        ),
                        array('label'=> Yii::t('app','Sale Item Summary'),'icon'=> 'fa fa-caret-right', 'url'=>url('report/SaleItemSummary'),
                            'active'=>$this->id .'/'. $this->action->id =='report/SaleItemSummary',
                            'visible'=> chk('report.index')
                        ),
                        array('label'=> Yii::t('app','Item Expiry'), 'icon'=> 'fa fa-caret-right', 'url'=>url('report/itemExpiry'),
                            'active'=>$this->id .'/'. $this->action->id =='report/itemExpiry',
                            'visible'=> chk('report.index')  || Yii::app()->settings->get('item', 'itemExpireDate')=='1'
                        ),
                        array('label'=> Yii::t('app','Inventory'), 'icon'=> 'fa fa-caret-right', 'url'=>url('report/Inventory'),
                            'active'=>$this->id .'/'. $this->action->id =='report/Inventory',
                            'visible'=> chk('report.index')
                        ),
                        array('label'=>Yii::t('app','Transaction'), 'icon'=> 'fa fa-caret-right', 'url'=>url('report/Transaction'),
                            'active'=>$this->id .'/'. $this->action->id =='report/Transaction',
                            'visible'=> chk('report.index')
                        ),
                        /*array('label'=>Yii::t('app','Total Asset'), 'icon'=> 'fa fa-caret-right', 'url'=>url('report/ItemAsset'),
                            'active'=>$this->id .'/'. $this->action->id =='report/ItemAsset',
                            'visible'=> chk('report.index'),
                        ),*/
                        array('label'=>Yii::t('app','User Log Summary'),'icon'=> 'fa fa-caret-right', 'url'=>url('report/UserLogSummary'),
                            'active'=>$this->id .'/'. $this->action->id =='report/UserLogSummary',
                            'visible'=> Yii::app()->user->isAdmin,
                        ),
                    )),
                array('label'=>'<i class="fa fa-group"></i><span class="nav-label">'. strtoupper(Yii::t('app','PIM')) . '</span>',
                    //'icon'=>'fa fa-group',
                    'url'=>url('client/admin'),
                    'active'=>$this->id=='employee' || $this->id=='supplier' || $this->id=='client' || $this->id=='publisher',
                    'visible'=> chk('store.update') || chk('employee.index') || chk('client.index'),
                    'items'=>array(
                        array('label'=>Yii::t('app', 'Customer') , 'icon'=> TbHtml::ICON_USER, 'url'=>url('client/admin'),
                            'active'=>$this->id =='client',
                            'visible'=> chk('client.index') || chk('client.create') || chk('client.update') || chk('client.delete')
                        ),
                        array('label'=>Yii::t('app', 'Employee'), 'icon'=> TbHtml::ICON_USER, 'url'=>url('employee/admin'),
                            'active'=>$this->id =='employee', //'active'=>$this->id .'/'. $this->action->id=='employee/admin',
                            'visible'=> chk('employee.index') || chk('employee.create') || chk('employee.update') || chk('employee.delete')
                        ),
                        //array('label'=>Yii::t('app', 'Publisher'), 'icon'=> TbHtml::ICON_USER, 'url'=>url('publisher/admin'), 'active'=>$this->id .'/'. $this->action->id=='publisher/admin','visible'=>chk('supplier.index')),
                        array('label'=>Yii::t('app','Supplier'), 'icon'=> TbHtml::ICON_USER, 'url'=>url('supplier/admin'),
                            'active'=>$this->id == 'supplier',
                            'visible'=> chk('supplier.index') || chk('supplier.create') || chk('supplier.update') || chk('supplier.delete')
                        ),
                    )),
                array('label'=>'<i class="fa fa-cogs"></i><span class="nav-label">'. strtoupper(Yii::t('app','Setting')) . '</span>',
                    //'icon'=>'fa fa-cogs',
                    'url'=>url('settings/index'),
                    'active'=>$this->id=='priceTier' || strtolower($this->id)=='default' || $this->id=='store' || $this->id=='settings' || $this->id=='location' || $this->id=='category',
                    'visible'=>chk('store.update'),
                    'items'=>array(
                        array('label'=>Yii::t('app', 'Category'), 'icon'=> TbHtml::ICON_LIST, 'url'=>url('category/admin'),
                            'active'=>$this->id =='category',
                            'visible'=> chk('item.index') || chk('item.create') || chk('item.update') || chk('item.delete')),
                        array('label'=>Yii::t('app','Price Tier'),'icon'=> TbHtml::ICON_ADJUST, 'url'=>url('priceTier/admin'),
                            'active'=>$this->id .'/'. $this->action->id=='priceTier/admin',
                            'visible'=>chk('store.update')),
                        //array('label'=>Yii::t('app','Location'),'icon'=> TbHtml::ICON_MAP_MARKER, 'url'=>url('location/admin'), 'active'=>$this->id .'/'. $this->action->id=='location/admin','visible'=>chk('store.update')),
                        array('label'=>Yii::t('app','Shop Setting'),'icon'=> TbHtml::ICON_COG, 'url'=>url('settings/index'),
                            'active'=>$this->id=='settings',
                            //'visible'=> Yii::app()->user->isAdmin
                        ),
                        //'visible'=>chk('store.update')),
                        //array('label'=>Yii::t('app','Branch'),'icon'=> TbHtml::ICON_HOME, 'url'=>url('store/admin'), 'active'=>$this->id .'/'. $this->action->id=='store/admin','visible'=>chk('store.update')),
                        //array('label'=>Yii::t('app','Database Backup'),'icon'=> TbHtml::ICON_HDD, 'url'=>url('backup/default/index'),'active'=> $this->id =='default'),
                    )),
                array('label'=>'<i class="fa fa-info-circle"></i><span class="nav-label">' . strtoupper(Yii::t('app', 'About US')) . '</span>',
                    //'icon'=>'fa fa-info-circle',
                    'url'=>url('site/about'),
                    'active'=>$this->id .'/'. $this->action->id=='site/about'),
            ),
        ));
        ?>
    </div>
</nav>