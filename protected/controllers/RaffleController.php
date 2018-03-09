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
				'actions'=>array('index','view','login','Casino','Sport','Lottery','promotion'),
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
}