<?php
class SettingsForm extends CFormModel
{

    public $archived_attr;
    public $amount_win_perc;
    public $profit_option;
    public $ProfitOptions;
    public $profit_got;
    public $prize_amount;
    public $total_amount;

    /*public function rules()
    {
        return array(
            array('amount_win_perc, ProfitOptions', 'required'),
        );
    }*/


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'profit_got' => 'Profit Got',
            'prize_amount' => 'Amount for Customer',
            'total_amount'=> 'Total Amount'
        );
    }

    public $exchange_rate = array(
        'USD2KHR' => '',
        //'USD2THB' => '',
        //'THB2KHR' =>'',
    );
    public $site = array(
        'companyNameNative' => '',
        'companyName' => '',
        'companyAddress' => '',
        'companyAddress1' => '',
        'companyAddressNative' =>'',
        'companyAddress1Native' =>'',
        'companyPhone' => '',
        'currencySymbol' => '',
        'altcurrencySymbol' => '', //Alternative , secondary currency
        'priceTax' => '',
        'tax1Rate' => '',
        'email' => '',
        'returnPolicy' => '',
        'invoicePrefix' => '',
        'vatIn' => '',
    );
    public $system = array(
        'language' => '',
        'decimalPlace'=>'',
        'invoiceNumInterval' => '',
    );
    public $sale = array(
        'saleCookie'=>'',
        'receiptPrint' => '',
        'receiptPrintDraftSale'=>'',
        //'touchScreen'=>'',
        'discount'=>'',
        'disableConfirmation'=>'',
    );
    public $receipt = array(
        'printcompanyLogo' => '',
        'printcompanyName'=>'',
        'printcompanyAddress'=>'',
        'printcompanyAddress1'=>'',
        'printcompanyPhone'=>'',
        'printtransactionTime'=>'',
        'printSignature'=>'',
        'printSaleRep' => '',
    );
    public $item = array(
        'itemNumberPerPage' => '',
        'itemExpireDate'=> ''
    );
   
    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function getAttributesLabels($key)
    {
        $keys = array(
            'companyNameNative' => Yii::t('app','Company Name Native'),
            'companyName' => Yii::t('app','Company Name'),
            'companyAddress' => Yii::t('app','Company Address (House, Street)'),
            'companyAddress' => Yii::t('app','Company Address1 (State, City)'),
            'companyAddressNative' => Yii::t('app','Company Address Native (House, Street)'),
            'companyAddress1Native' => Yii::t('app','Company Address1 Native (State, City)'),
            'companyPhone' => Yii::t('app','Company Phone'),
            'currencySymbol' => Yii::t('app','Currency Symbol'),
            'altcurrencySymbol' => Yii::t('app','Secondary Currency Symbol'),
            'priceTax' => Yii::t('app','Price include Tax'),
            'tax1Rate' => Yii::t('app','Tax 1 Rate'),
            'email' => Yii::t('app','E-Mail'),
            'returnPolicy' => Yii::t('app','Return Policy'),
            'invoicePrefix' => Yii::t('app','Invoice Number Prefix'),
            'vatIn' => 'លេខអត្តសញ្ញាណកម្ម(VAT TIN)',
            'invoiceNumInterval' => 'Invoice Number Reset Interval',
            'language'=> Yii::t('app','Language'),
            'receiptPrint' => Yii::t('app','Print receipt after Sale'),
            'receiptPrintDraftSale'=> Yii::t('app','Print receipt after suspended sale'),
            'USD2KHR' => 'Primary ['. Yii::app()->settings->get('site', 'currencySymbol') . '] ' . 'to Secondary' . ' [' . Yii::app()->settings->get('site', 'altcurrencySymbol') .']',
            'decimalPlace' => Yii::t('app','Number of Decimal Place'),
            //'touchScreen' => Yii::t('app','Touch Screen Sale'),
            'saleCookie' => Yii::t('app','Do you want to remember customer\'s item on sale ?'),
            'discount' => Yii::t('app','Show discount?'),
            'disableConfirmation'=> Yii::t('app','Disable confirmation for complete sale'),
            'printcompanyLogo' => Yii::t('app','Show Company Logo'),
            'printcompanyName'=> Yii::t('app','Show Company Name'),
            'printcompanyAddress'=> Yii::t('app','Show Company Address'),
            'printcompanyAddress1'=> Yii::t('app','Show Company Address1'),
            'printcompanyPhone'=> Yii::t('app','Show Company Phone'),
            'printtransactionTime'=> Yii::t('app','Show Transaction Time'),
            'printSignature' => Yii::t('app','Show Signature (Customer & Chashier)'),
            'printSaleRep' => Yii::t('app','Show Sale Representative Info'),
            'itemNumberPerPage' => Yii::t('app','Number of Items Per Page'),
            'itemExpireDate' => Yii::t('app','Track Item Expire Date'),
        );
 
        if(array_key_exists($key, $keys)) {
            return $keys[$key];
        }    
 
        $label = trim(strtolower(str_replace(array('-', '_'), ' ', preg_replace('/(?<![A-Z])[A-Z]/', ' \0', $key))));
        $label = preg_replace('/\s+/', ' ', $label);
 
        if (strcasecmp(substr($label, -3), ' id') === 0)
            $label = substr($label, 0, -3);
 
        return ucwords($label);
    }
 
    /**
     * Sets attribues values
     * @param array $values
     * @param boolean $safeOnly
     */
    public function setAttributes($values,$safeOnly=true) 
    { 
        if(!is_array($values)) {
            return; 
        }    
            
        foreach($values as $category=>$values) 
        { 
            if(isset($this->$category)) {
                $cat = $this->$category;
                foreach ($values as $key => $value) {
                    if(isset($cat[$key])){
                        $cat[$key] = $value;
                    }
                }
                $this->$category = $cat;
            }
        } 
    }
}
?>
