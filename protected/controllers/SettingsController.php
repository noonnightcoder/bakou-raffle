<?php

class SettingsController extends Controller
{

    /**
     * @return array action filters
     */
    //public $layout = '//layouts/column2';

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }


    public function accessRules()
    {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view','ProfitSetting',
                                    'SelectOption','RemoveOption','GenerateOption',
                                    'ManualSetting','SelectTicket','SelectTicket',
                                    'ManualSelectTicket'),
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }


    public function actionIndex()
    {

        if (!Yii::app()->user->checkAccess('store.update')) {
            $this->redirect(array('site/ErrorException','err_no'=>403));
        }

        $settings = Yii::app()->settings;

        $model = new SettingsForm();

        if (isset($_POST['SettingsForm'])) {
            $model->setAttributes($_POST['SettingsForm']);
            $settings->deleteCache();
            foreach ($model->attributes as $category => $values) {
                $settings->set($category, $values);
            }
            Yii::app()->user->setFlash('success', '<strong>Well done!</strong> Site settings were updated..');
            $this->refresh();
        }

        foreach ($model->attributes as $category => $values) {
            $cat = $model->$category;
            foreach ($values as $key => $val) {
                $cat[$key] = $settings->get($category, $key);
            }
            $model->$category = $cat;
        }

        $this->render('index', array('model' => $model));
    }

    public function actionProfitSetting()
    {
        $this->reload('admin');
    }

    public function actionManualSetting()
    {
        $this->reload('manual_option');
    }

    public function actionManualSelectTicket($view='')
    {
        if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {
            if(isset($_POST['manual']))
            {
                if(!empty($_POST['manual']))
                {
                    $betPrizeTmp = new BetPrizeTmp;

                    $betPrizeTmp->delTblBetprizetmp();

                    Yii::app()->shoppingCart->setProfitOption('ManualOption',50);

                    foreach ($_POST['manual'] as $key =>$value)
                    {
                        foreach ($value as $val)
                        {
                            $betPrizeTmp = new BetPrizeTmp;
                            $betPrizeTmp->saveManualSetting($val,$key);
                        }
                    }

                    $mySummary=explode('|',$betPrizeTmp->getTestBetSummary());
                    $arr = array('profit_got'=>$mySummary[0],'prize_amount'=>$mySummary[1]);
                }

                $this->reload($view,$arr);
            }
        }else {
            $this->redirect(array('site/ErrorException', 'err_no' => 400));
        }
    }

    public function actionSelectTicket()
    {
        if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {
            if(!empty($_POST['manual']))
            {
                Yii::app()->shoppingCart->setManualSelected($_POST['manual']);

                //$my_str=implode(',', array_filter(Yii::app()->shoppingCart->getManualSelected()));
            }
        }
    }

    public function actionSelectOption($view='')
    {
        if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {

            $BetPrizeTmp = new BetPrizeTmp;
            //$settings = new SettingsForm;

            if(isset($_POST['SettingsForm']))
            {
                if(!empty($_POST['SettingsForm']['ProfitOptions']))
                {
                    Yii::app()->shoppingCart->setProfitOption($_POST['SettingsForm']['ProfitOptions'],$_POST['SettingsForm']['amount_win_perc']);

                    $BetPrizeTmp->getTestBetResult( $_POST['SettingsForm']['ProfitOptions'],$_POST['SettingsForm']['amount_win_perc']);

                    $mySummary=explode('|',$BetPrizeTmp->getTestBetSummary());
                    $arr = array('profit_got'=>$mySummary[0],'prize_amount'=>$mySummary[1]);
                }
            }

            $this->reload($view,$arr);

        } else {
            //throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
            $this->redirect(array('site/ErrorException', 'err_no' => 400));
        }
    }

    public function actionRemoveOption($view='')
    {
        if ( Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest ) {
            Yii::app()->shoppingCart->emptyProfitOption();
            $this->reload($view);
        } else {
            $this->redirect(array('site/ErrorException', 'err_no' => 400));
        }
    }

    public function actionGenerateOption($view='')
    {
        if ( Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest ) {
            $data = $this->sessionInfo();

            $data['TmpBetResult']->dealWithOption();

            //$this->reload($view);

            $this->renderPartial('partial/_successful_selected_options',$data);

            Yii::app()->shoppingCart->emptyProfitOption();
        }else{
            $this->redirect(array('site/ErrorException', 'err_no' => 400));
        }
    }

    private function reload($view='',$arr='')
    {

        $data = $this->sessionInfo();

        if(!empty($arr))
        {
            Yii::app()->shoppingCart->setProfitGot($arr['profit_got']);
            Yii::app()->shoppingCart->setPrizeAmount($arr['prize_amount']);
        }

        $data['model']->profit_got=Yii::app()->shoppingCart->getProfitGot();
        $data['model']->prize_amount=Yii::app()->shoppingCart->getPrizeAmount();
        $data['model']->total_amount=Yii::app()->shoppingCart->getTotalAmount();

        if (Yii::app()->request->isAjaxRequest) {

            $cs = Yii::app()->clientScript;
            $cs->scriptMap = array(
                'jquery.js' => false,
                'bootstrap.js' => false,
                'jquery.min.js' => false,
                'bootstrap.notify.js' => false,
                'bootstrap.bootbox.min.js' => false,
                'bootstrap.min.js' => false,
                'jquery-ui.min.js' => false,
                'jquery.yiigridview.js' => false,
                'jquery.ba-bbq.min.js' => false,
                'jquery.stickytableheaders.min.js'=>false,
                //'jquery.autocomplete.js' => false,
            );

            Yii::app()->clientScript->scriptMap['*.js'] = false;
            Yii::app()->clientScript->scriptMap['jquery-ui.css'] = false;
            Yii::app()->clientScript->scriptMap['box.css'] = false;

            $this->renderPartial($view, $data, false,true);
        } else {
            $this->render($view, $data);
        }

    }

    protected function sessionInfo($data=array())
    {
        $data['TmpBetResult'] = new BetPrizeTmp;

        $data['grid_columns'] = $data['TmpBetResult']->getProfitColumns();

        $data['data_provider'] = $data['TmpBetResult']->getBetTest();

        $data['model']=new SettingsForm;
        $data['profitOption']=Yii::app()->shoppingCart->getProfitOption();
        if(!empty($data['profitOption']))
        {
            $data['option']=$data['profitOption']['option'];
            $data['win_percentage']=$data['profitOption']['win_percentage'];
        }else{
            $data['option']='';
            $data['win_percentage']='';
        }

        return $data;
    }
}

?>