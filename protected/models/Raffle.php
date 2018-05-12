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
					AND created_at<DATE_ADD(CURDATE(),INTERVAL 1 DAY)";

			$cmd = Yii::app()->db->createCommand($sql);

			return Yii::app()->Common->convertArray($cmd->queryAll());
		}

		public function getResult7Day()
		{
			$sql = "SELECT DATE(created_at) date,prize_category text,ticket_number result
					FROM bet_prize_history
					-- WHERE created_at>=DATE_ADD(CURDATE(),INTERVAL -1 DAY)
					-- AND created_at<CURDATE()
					where ticket_number in (6649,995,9898,3710,5107,2630,667,16,5913,4189,2525)";

			$cmd = Yii::app()->db->createCommand($sql);

			return Yii::app()->Common->convertArray($cmd->queryAll());
		}
	}
?>