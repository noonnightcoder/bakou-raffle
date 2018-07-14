<?php
Class Common extends CApplicationComponent
{
    public static function Discount($discount) {
        if (substr($discount, 0, 1) == '$') {
            $discount_amount = substr($discount, 1);
            $discount_type = '$';
        } else {
            $discount_amount = $discount;
            $discount_type = '%';
        }
        
        return array($discount_amount, $discount_type);
    }

    /*
   * To Calculate Total Amount after discount
   */
    public static function calTotalAfterDiscount($discount,$price,$qty=1) {
        $total = 0;
        if (substr($discount, 0, 1) == '$') {
            $total+=round($price * $qty - substr($discount, 1), Common::getDecimalPlace(), PHP_ROUND_HALF_DOWN);
        } else {
            $total+=round($price * $qty - $price * $qty * $discount / 100, Common::getDecimalPlace(), PHP_ROUND_HALF_DOWN);
        }
        return $total;
    }

    /*
     * To Calculate actual discount amount comparing to Total Value
     */
    public static function calDiscountAmount($discount,$price) {
        //$total = 0;
        if (substr($discount, 0, 1) == '$') {
            $total=round(substr($discount, 1), Common::getDecimalPlace(), PHP_ROUND_HALF_DOWN);
        } else {
            $total=round($price * $discount / 100, Common::getDecimalPlace(), PHP_ROUND_HALF_DOWN);
        }
        return $total;
    }

    public static function arrayFactory($type, $code = null)
    {

        $_items = array(
            'day' => array(
                '01' => '01',
                '02' => '02',
                '03' => '03',
                '04' => '04',
                '05' => '05',
                '06' => '06',
                '07' => '07',
                '08' => '08',
                '09' => '09',
                '10' => '10',
                '11' => '11',
                '12' => '12',
                '13' => '13',
                '14' => '14',
                '15' => '15',
                '16' => '16',
                '17' => '17',
                '18' => '18',
                '19' => '19',
                '20' => '20',
                '21' => '21',
                '22' => '22',
                '23' => '23',
                '24' => '24',
                '25' => '25',
                '26' => '26',
                '27' => '27',
                '28' => '28',
                '29' => '29',
                '30' => '30',
                '31' => '31',
            ),
            'month' => array(
                '01' => Yii::t('app','January'),
                '02' => Yii::t('app','February'),
                '03' => Yii::t('app','March'),
                '04' => Yii::t('app','April'),
                '05' => Yii::t('app','May'),
                '06' => Yii::t('app','June'),
                '07' => Yii::t('app','July'),
                '08' => Yii::t('app','August'),
                '09' => Yii::t('app','September'),
                '10' => Yii::t('app','October'),
                '11' => Yii::t('app','November'),
                '12' => Yii::t('app','December'),
            ),
            'year' => array_combine(range(date("Y"), 1910), range(date("Y"), 1910)),  //http://stackoverflow.com/questions/2807394/php-years-array
            'page_size' => array(
                10 => 10,
                20 => 20,
                50 => 50,
                100 => 100,
                200 => 200,
                300 => 300,
                500 => 500,
                1000 => 1000,
            ),
            'size_biz' => array(
                'big wholesale' => 'លក់ដុំធំ',
                'medium wholesale' => 'លក់ដុំមធ្យម',
                'medium retail' => 'លក់រាយមធ្យម',
                'small retail' => 'លក់រាយតូច'
            ),
            'main_biz' => array(
                'beverage no alcohol' => 'ភេសជ្ជៈអាកុល',
                'beverage with alcohol' => 'ភេសជ្ជៈមិនមានអាកុល',
                'grocery' => 'នំចំណី',
                'cosmetic' => 'គ្រឿងសំអាង'
            ),
            'invoice_format' => array(
                'format1' => 'No logo no VAT',
                'format2' => 'Logo no VAT',
                'format3' => 'Logo & VAT',
            ), //https://goo.gl/tkYZR1
            'payment_term' => array(
                'COD' => t('Cash on delivery','app'),
                'CONSIGN' => t('Consignment','app'),
                'NET3' => t('Payment 3 days after invoice date','app'),
                'NET5' => t('Payment 5 days after invoice date','app'),
                'NE7' => t('Payment 7 days after invoice date','app'),
                'NET30' => t('Payment 30 days after invoice date','app'),
                'NET60' => t('Payment 60 days after invoice date','app'),
                'PID' => t('Payment in advance','app'),
                'EOM' => t('End of month','app'),
                'CND' => t('Cash next delivery','app'),
                'CBS' => t('Cash before shipment','app'),
                'CIA' => t('Cash in advance','app'),
                'Contra' => t('Payment from the customer offset against the value of supplies purchased from the customer','app'),
                'Stage' => t('Payment of agreed amounts at stage','app'),
            ), //Y-m-d H:i:s
            'inv_number_interval' => array(
                'i' => 'Every Minute',
                'H' => 'Every Hour',
                'd' => 'Every day',
                'm' => 'Every month',
                'Y' => 'Every Year'
            ),
        );

        if (isset($code)) {
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        } else {
            return isset($_items[$type]) ? $_items[$type] : false;
        }
    }

    public static function defaultPageSize()
    {
        return Yii::app()->user->getState('pageSize', Yii::app()->settings->get('item', 'itemNumberPerPage'));
    }

    // Convention over configuration principle
    public static function getDecimalPlace()
    {
        return Yii::app()->settings->get('system', 'decimalPlace') == '' ? 2 : Yii::app()->settings->get('system', 'decimalPlace');
    }

    // Invoice Prefixing
    public static function getInvoicePrefix()
    {
        return Yii::app()->settings->get('site', 'invoicePrefix') == '' ? '' : Yii::app()->settings->get('site', 'invoicePrefix');
    }

    public function convertArray($array)
    {
        $array_3dimension = array();
        $rst_array = array();
        $prize_no = array();

        //Convert to 3 multidimensional array without key
        foreach ($array as $rows)
        {
            $array_3dimension[$rows['date']][$rows['text']][]=$rows['result'];
        }

        //Add the key to 3 multidimensional array
        foreach ($array_3dimension as $date_key=>$date)
        {
            foreach ($date as $text_key=>$text)
            {
                $prize_no[]=array('text'=>$text_key,'result'=>$text);
            }
            $rst_array[]=array('date'=>$date_key,'priceNo'=>$prize_no);
            unset($prize_no); //reset array to assign another value in next loop
        }

        return $rst_array;
    }

    public static function arrayFilter($type, $code = null)
    {
        $_items = array(
            'weekly' => array(
                '01'=>'201801',
                '02'=>'201802',
                '03'=>'201803',
                '04'=>'201804',
                '05'=>'201805',
                '06'=>'201806',
                '07'=>'201807',
                '08'=>'201808',
                '09'=>'201809',
                '10'=>'201810',
                '11'=>'201811',
                '12'=>'201812',
                '13'=>'201813',
                '14'=>'201814',
                '15'=>'201815',
                '16'=>'201816',
                '17'=>'201817',
                '18'=>'201818',
                '19'=>'201819',
                '20'=>'201820',
                '21'=>'201821',
                '22'=>'201822',
                '23'=>'201823',
                '24'=>'201824',
                '25'=>'201825',
                '26'=>'201826',
                '27'=>'201827',
                '28'=>'201828',
                '29'=>'201829',
                '30'=>'201830',
                '31'=>'201831',
                '32'=>'201832',
                '33'=>'201833',
                '34'=>'201834',
                '35'=>'201835',
                '36'=>'201836',
                '37'=>'201837',
                '38'=>'201838',
                '39'=>'201839',
                '40'=>'201840',
                '41'=>'201841',
                '42'=>'201842',
                '43'=>'201843',
                '44'=>'201844',
                '45'=>'201845',
                '46'=>'201846',
                '47'=>'201847',
                '48'=>'201848',
                '49'=>'201849',
                '50'=>'201850',
                '51'=>'201851',
                '52'=>'201852',
            ),
            'monthly' => array(
                '01' => Yii::t('app','January'),
                '02' => Yii::t('app','February'),
                '03' => Yii::t('app','March'),
                '04' => Yii::t('app','April'),
                '05' => Yii::t('app','May'),
                '06' => Yii::t('app','June'),
                '07' => Yii::t('app','July'),
                '08' => Yii::t('app','August'),
                '09' => Yii::t('app','September'),
                '10' => Yii::t('app','October'),
                '11' => Yii::t('app','November'),
                '12' => Yii::t('app','December'),
            )
        );

        if (isset($code)) {
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        } else {
            return isset($_items[$type]) ? $_items[$type] : false;
        }
    }
}