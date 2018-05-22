<?php

/**
 * This is the model class for table "bet_prize_tmp".
 *
 * The followings are the available columns in table 'bet_prize_tmp':
 * @property string $ticket_number
 * @property integer $prize_category
 * @property double $raffle_price
 * @property integer $client_id
 * @property integer $employee_id
 */
class BetPrizeTmp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bet_prize_tmp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('prize_category, client_id, employee_id', 'numerical', 'integerOnly'=>true),
			array('raffle_price', 'numerical'),
			array('ticket_number', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ticket_number, prize_category, raffle_price, client_id, employee_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ticket_number' => 'Ticket Number',
			'prize_category' => 'Prize Category',
			'raffle_price' => 'Raffle Price',
			'client_id' => 'Client',
			'employee_id' => 'Employee',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ticket_number',$this->ticket_number,true);
		//$criteria->compare('prize_category',$this->prize_category);
		//$criteria->compare('raffle_price',$this->raffle_price);
		//$criteria->compare('client_id',$this->client_id);
		//$criteria->compare('employee_id',$this->employee_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getBetTest()
	{
		$sql="select ticket_number,prize_category,raffle_price from bet_prize_tmp";

		$rawData = Yii::app()->db->createCommand($sql)->queryAll();

		$dataProvider = new CArrayDataProvider($rawData, array(
			'keyField' => 'ticket_number',
			/*
            'sort' => array(
                'attributes' => array(
                    'date_paid',
                ),
             ),
             *
            */
			'pagination' => false,
		));

		return $dataProvider; // Return as array object
	}

	public function getProfitColumns()
	{
		return array(
			array('name'=>'ticket_number',
				'header'=>'Ticket Number',
				//'type'  => 'raw',
			),
			array('name'=>'prize_category',
				'header'=>'Prize Category',
			),

			array('name' => 'raffle_price',
				'header'=>'Raffle Price',
			),
			/*array(
				'name' => 'Qty',
				'value' => '$data->status=="1" ? $data->quantity : "<s class=\"red\">  $data->quantity <span>"',
				'type' => 'raw',
				'filter' => '',
			),*/
			/*array(
				'class' => 'bootstrap.widgets.TbButtonColumn',
				'header' => Yii::t('app','Action'),
				'template' => '<div class="hidden-sm hidden-xs btn-group">{detail}{price}{delete}{undeleted}</div>',
				'buttons' => array(
					'detail' => array(
						'click' => 'updateDialogOpen',
						'label' => Yii::t('app', 'Reward History'),
						'url' => 'Yii::app()->createUrl("Inventory/admin", array("item_id"=>$data->id))',
						'options' => array(
							'data-toggle' => 'tooltip',
							'data-update-dialog-title' => 'History',
							'class' => 'btn btn-xs btn-pink',
							'title' => 'Stock History',
						),
						'visible' => '$data->status=="1" && Yii::app()->user->checkAccess("item.index") ',
					),
				),
			),*/
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BetPrizeTmp the static model class
	 */
}
