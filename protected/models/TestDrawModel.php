<?php
//namespace app\models;

//use Framework;
//use framework\base\Model;

class TestDrawModel extends CFormModel
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

    public function generateDigit()
    {
        /*$sql = "insert into Test (d,h) values (:d,:h)";
        $parameters = array(":d"=>'Hello',":h"=>'Hi');
        Yii::app()->db->createCommand($sql)->execute($parameters);*/
        $mypurchase = Yii::app()->user->getId();
        $myaction = Yii::app()->user->getId();

        $sql = "select func_ticket_purchase(:purchase, :action)";

        $cmd = Yii::app()->db->createCommand($sql);
        $cmd->bindParam(":purchase", $mypurchase);
        $cmd->bindParam(":action", $myaction);
        return $cmd->queryScalar();
    }

    public function getTicket()
    {
        $sql = "SELECT ABS(unit_price) price,ticket_id luckyNum FROM ticket_history";

        $cmd = Yii::app()->db->createCommand($sql);
        return $cmd->queryAll();
    }
}