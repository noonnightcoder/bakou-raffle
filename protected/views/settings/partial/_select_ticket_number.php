<div class="">
    <div class="col-sm-9">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name'=>"manual[$category_id][]",
            'id'=>"r_".$myID."_".$category_id,
            'source'=>$this->createUrl('request/suggestTicket'),
            'htmlOptions'=>array(
                'size'=>'60',
                'placeholder'=>Yii::t('app','Type Name or Ticket Number'),
            ),
            'options'=>array(
                'showAnim'=>'fold',
                'minLength'=>'1',
                'delay' => 10,
                'autoFocus'=> false,
                'select'=>'js:function(event, ui) {
                                    event.preventDefault();
                                    $("#r_'.$myID.'_'.$category_id.'").val(ui.item.id);
                                    $("#manual-setting-form").ajaxSubmit
                                    ({
                                        url:"SelectTicket",
                                        type:"post",
                                        //target: "#manual_container", 
                                        //beforeSubmit: optionBeforeSubmit
                                    });
                                }',
            ),
        ));
        ?>
    </div>
</div>
<br /> <br />


