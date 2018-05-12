<?php

class RaffleController extends Controller
{
	public $layout='//layouts/column_frontend';
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','login','Casino','Sport','Lottery'
									,'promotion','ButtonTest','PickupTicket'
									,'GetTicketList','GetResultToday','GetResult7day'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','AjaxRefresh'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
        $this->render('index');
	}

	public function actionLogin()
	{
		$this->render('_login');
	}

	public function actionCasino()
    {
		$this->render('_online_casino');
	}

	public function actionSport()
    {
		$this->render('_online_sport');
	}

	public function actionLottery()
    {
		$this->render('_online_lottery');
	}

	public function actionPromotion(){

		$this->render('_promotion');
	}
	
	public function actionButtonTest()
	{
		$this->render('forTest/_draw_button');
	}

	public function actionPickupTicket()
	{
		$Raffle = new Raffle();

		try {
			$myID = Yii::app()->user->getId();

			$chk_bal = Account::model()->find('client_id = :clientID',array(':clientID' => $myID)); //check balance of customer first if >0

			if(!empty($chk_bal) and $chk_bal->current_balance >0)
			{
				$my_ticket = $Raffle->pickupTicket($myID);
				if ($my_ticket==1) //check if balance enough to buy the ticket
				{
					$msg = "Successful";
				}else{
					$msg = "Cannot provide the ticket";
				}
			}else{
				$msg = "Cannot provide the ticket";
			}
		}catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}

		return $msg;
	}

	public function actionGetTicketList()
	{
		$Raffle = new Raffle();
		$userid = Yii::app()->user->getId();
		$myList = $Raffle->getTicketList($userid);

		echo json_encode($myList);
	}

	public function actionGetResultToday()
	{
		$Raffle = new Raffle();
		$myList = $Raffle->getResultToday();
		echo json_encode($myList);
	}

	public function actionGetResult7day()
	{
		$Raffle = new Raffle();
		$myList = $Raffle->getResult7Day();
		echo json_encode($myList);
	}
}