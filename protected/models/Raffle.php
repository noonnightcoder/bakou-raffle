<?php
	class Raffle extends CFormModel
	{
		public $name;
		public $email;

		public function rules()
		{
			return [
				[['name', 'email'], 'required'],
				['email', 'email'],
			];
		}

		public function pickupTicket($myID)
		{
			$mypurchase = $myID;
			$myaction = $myID;

			$sql = "select func_ticket_purchase(:purchase, :action)";
			$cmd = Yii::app()->db->createCommand($sql);
			$cmd->bindParam(":purchase", $mypurchase);
			$cmd->bindParam(":action", $myaction);
			return $cmd->queryScalar();
		}

		public function getTicketList($userid)
		{
			$sql = "SELECT ABS(unit_price) price,ticket_id luckyNum 
					FROM ticket_history 
					where purchased_by=:userid
					and ticket_id in (SELECT id FROM ticket_number WHERE occupied=1)";
			$cmd = Yii::app()->db->createCommand($sql);
			$cmd->bindParam(":userid", $userid);
			return $cmd->queryAll();
		}

		public function getResultToday()
		{
			$sql = "SELECT DATE(created_at) date,prize_category text,ticket_number result
					FROM bet_prize_history
					WHERE created_at>=CURDATE()
					AND created_at<DATE_ADD(CURDATE(),INTERVAL 1 DAY)
					order by prize_category";

			$cmd = Yii::app()->db->createCommand($sql);

			return Yii::app()->Common->convertArray($cmd->queryAll());
		}

		public function getResult7Day()
		{
			$sql = "SELECT DATE(created_at) date,prize_category text,ticket_number result
					FROM bet_prize_history
					WHERE created_at>=DATE_ADD(CURDATE(),INTERVAL -7 DAY)
					order by prize_category,DATE(created_at) DESC";

			$cmd = Yii::app()->db->createCommand($sql);

			return Yii::app()->Common->convertArray($cmd->queryAll());
		}

		public function suggest($keyword,$limit=7)
		{
			$arr=Yii::app()->shoppingCart->getManualSelected();
			if(!empty($arr))
			{
				$my_str=implode(',', array_filter($arr));
				$cond = "and ticket_number not in ($my_str)";
			}else {
				$cond="";
			}

			$sql="SELECT ticket_number,CONCAT(IFNULL(last_name,''),' ',IFNULL(first_name,'')) client_name
				FROM ticket_history t1
				LEFT JOIN client t2 ON t1.purchased_by=t2.login_id
				where (first_name LIKE :keyword or last_name=:keyword or ticket_number like :keyword)
				$cond
				order by RAND() limit $limit";

			$cmd = Yii::app()->db->createCommand($sql);

			$models = $cmd->queryAll(true,array(':keyword'=>"%$keyword%"));

			/*$models=$this->findAll(array(
				'condition'=>'(first_name LIKE :keyword or last_name=:keyword or mobile_no like :keyword) and status=:status',
				'order'=>'first_name',
				'limit'=>$limit,
				'params'=>array(':keyword'=>"%$keyword%",':status'=>Yii::app()->params['active_status'])
			));*/

			$suggest=array();
			foreach($models as $model) {
				$suggest[] = array(
					'label'=>$model['client_name'].' - '.$model['ticket_number'],  // label for dropdown list
					'value'=>$model['client_name'],  // value for input field
					'id'=>$model['ticket_number'],       // return values from autocomplete
				);
			}
			return $suggest;
		}

		public function getPrizeCategory()
		{
			$sql="SELECT NAME prize_name,unit_price 
				FROM item
				WHERE STATUS='1'
				ORDER BY category_id";

			return Yii::app()->db->createCommand($sql)->queryAll();
		}

		public function getClientRaffleResult($userid,$sdate,$edate)
		{
			$sql="SELECT t1.created_at purchasted_date,CONCAT(IFNULL(last_name,''),' ',IFNULL(first_name,'')) client_name,
				ticket_number,prize_category
				FROM bet_prize_history t1
				INNER JOIN client t2 ON t1.client_id=t2.login_id
				where t1.client_id=:userid
				and t1.created_at>=STR_TO_DATE(:from_date,'%d-%m-%Y')
                and t1.created_at<DATE_ADD(STR_TO_DATE(:to_date,'%d-%m-%Y'),INTERVAL 1 DAY)";

			$cmd = Yii::app()->db->createCommand($sql);
			$cmd->bindParam(":userid", $userid);
			$cmd->bindParam(":from_date", $sdate);
			$cmd->bindParam(":to_date", $edate);
			return $cmd->queryAll();
		}

		public function getClientRaffleHistory($userid,$sdate,$edate)
		{
			$sql="SELECT t1.purchased_at purchasted_date,CONCAT(IFNULL(last_name,''),' ',IFNULL(first_name,'')) client_name,
				ticket_number
				FROM ticket_history t1
				INNER JOIN client t2 ON t1.purchased_by=t2.login_id
				where t1.purchased_by=:userid
				and t1.purchased_at>=STR_TO_DATE(:from_date,'%d-%m-%Y')
                and t1.purchased_at<DATE_ADD(STR_TO_DATE(:to_date,'%d-%m-%Y'),INTERVAL 1 DAY)";

			$cmd = Yii::app()->db->createCommand($sql);
			$cmd->bindParam(":userid", $userid);
			$cmd->bindParam(":from_date", $sdate);
			$cmd->bindParam(":to_date", $edate);
			return $cmd->queryAll();
		}
	}
?>