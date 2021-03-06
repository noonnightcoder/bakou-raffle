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
									,'GetTicketList','GetResultToday','GetResult7day'
									,'GetPrizeCategory','GetClientResult','GetClientHistory','History','Result','GetClientRaffleHistory'),
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


	public function actionHistory()
	{
		$this->render('history');
	}


	public function actionResult()
  {
		$this->render('raffle_result');
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

	public function actionPickupTicket($act)
	{
		$Raffle = new Raffle();
		$status=false;
		$msg='';
		$balance = 0;
		//$act = $_GET['act'];
		try {
			$myID = Yii::app()->user->getId();

			$chk_bal = Account::model()->find('client_id = :clientID',array(':clientID' => $myID)); //check balance of customer first if >0

			if($act==1)
			{
				if(!empty($chk_bal) and $chk_bal->current_balance >0)
				{
					$my_ticket = $Raffle->pickupTicket($myID);
					$arr = explode('|', $my_ticket); //convert return back from sql to array
					if ($arr[0]==1 and !empty($arr)) //check if balance enough to buy the ticket
					{
						Yii::app()->shoppingCart->addTicket2List($arr[1],$arr[2]);
						$msg = "Successful";
						$status=true;
					}else{
						$msg = "Cannot provide the ticket, not enough balance!";
						$status=false;
					}
					$balance = $chk_bal->current_balance;
				}else{
					$msg = "Cannot provide the ticket, not enough balance!";
					$status=false;
				}
			}else{
				$msg = "Please press button to pick-up the ticket!";
				if(!empty($chk_bal)) $balance = $chk_bal->current_balance; //to prevent when no object found
				$status=false;
			}
		}catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}

		$myResult=Yii::app()->shoppingCart->getTicketList();
		echo json_encode(
			array(
				'status'=>$status,
				'message'=>$msg,
				'balance'=>$balance,
				'result'=>$myResult
			)
		);
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
		echo CJSON::encode($myList);
	}

	public function actionGetPrizeCategory()
	{
		$Raffle = new Raffle();
		$myList = $Raffle->getPrizeCategory();
		echo CJSON::encode($myList);
	}

	public function actionGetClientResult($sdate,$edate)
	{
		$Raffle = new Raffle();
		$userid = Yii::app()->user->getId();

		$myList = $Raffle->getClientRaffleResult($userid,$sdate,$edate);
		echo CJSON::encode($myList);
	}

	public function actionGetClientHistory($sdate = null,$edate = null)
	{
		$Raffle = new Raffle();
		$userid = Yii::app()->user->getId();
		$sdate = $sdate !== null || $sdate !== ''  ? date('d-m-Y', strtotime($sdate)) : date('d-m-Y');
		$edate = $edate !== null || $edate !== '' ? date('d-m-Y', strtotime($edate)) : date('d-m-Y');
		$myList = $Raffle->getClientRaffleHistory($userid,$sdate,$edate);
		echo CJSON::encode($myList);
	}

	public function actionGetClientRaffleHistory()
	{
		$Raffle = new Raffle();
		$userid = Yii::app()->user->getId();

		$sdate=date_create(date('d-m-Y'));
		date_add($sdate,date_interval_create_from_date_string("-15 days"));
		$sdate = date_format($sdate,"d-m-Y'");

		$edate=date_create(date('d-m-Y'));
		date_add($edate,date_interval_create_from_date_string("1 days"));
		$edate = date_format($edate,"d-m-Y'");

		$myList = $Raffle->getClientRaffleHistory($userid,$sdate,$edate);
		echo CJSON::encode($myList);

	}
}
