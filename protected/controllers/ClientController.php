<?php

class ClientController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column1';

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
            array(
                'allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('@'),
            ),
            array(
                'allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array(
                    'create',
                    'update',
                    'admin',
                    'GetClient',
                    'AddCustomer',
                    'delete',
                    'undodelete',
                    'payment',
                    'CopyClientInfo',
                    'DynamicDistrict',
                    'DynamicCommune',
                ),
                'users' => array('@'),
            ),
            array(
                'allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array(
                'deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        if (Yii::app()->request->isAjaxRequest) {

            Yii::app()->clientScript->scriptMap['*.js'] = false;

            echo CJSON::encode(array(
                'status' => 'render',
                'div' => $this->renderPartial('view', array('model' => $this->loadModel($id)), true, false),
            ));

            Yii::app()->end();
        } else {
            $this->render('view', array(
                'model' => $this->loadModel($id),
            ));
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($sale_mode = 'N')
    {
        $data['model'] = new Client;
        $data['contact'] = new Contact;
        $data['user'] = new RbacUser;
        $data['has_error'] = "";
        $data['disabled'] = "";

        if (Yii::app()->user->checkAccess('client.create'))
        {
            if (isset($_POST['Client']))
            {
                $data['model']->attributes = $_POST['Client'];
                //$data['contact']->attributes = $_POST['Contact'];

                if ($_POST['Client']['year'] !== "" || $_POST['Client']['month'] !== "" || $_POST['Client']['day'] !== "") {
                    $dob = $_POST['Client']['year'] . '-' . $_POST['Client']['month'] . '-' . $_POST['Client']['day'];
                    $data['model']->dob = $dob;
                }

                // validate BOTH $a and $b
                $valid = $data['model']->validate();
                //$valid = $data['contact']->validate() && $valid;

                //if ($model->validate()) {
                if ($valid) {
                    $transaction = Yii::app()->db->beginTransaction();
                    try {

                        /*if (isset($_POST['Contact'])) {
                            $data['contact']->save();
                            $data['model']->contact_id = $data['contact']->id;
                        }*/

                        if(isset($_POST['RbacUser']) && !empty($_POST['RbacUser']))
                        {
                            if(isset($_POST['Submit-btn']) && $_POST['Submit-btn']=='Create') //just wan to make sure it is created only new client only
                            {
                                $data['user']->attributes = $_POST['RbacUser'];
                                $data['user']->employee_id=0;
                                if($data['user']->validate())
                                {
                                    $data['user']->save();
                                    $myLoginID = $data['user']->id;

                                    $data['model']->login_id=$myLoginID;
                                    if ($data['model']->save())
                                    {
                                        $client_id = $data['model']->id;
                                        $client_fname = $data['model']->first_name . ' ' . $data['model']->last_name;
                                        $price_tier_id = $data['model']->price_tier_id;

                                        Account::model()->saveAccount($myLoginID, $client_fname);
                                        $transaction->commit();

                                        if ($sale_mode == 'Y') {
                                            Yii::app()->shoppingCart->setCustomer($client_id);
                                            Yii::app()->shoppingCart->setPriceTier($price_tier_id);
                                            $this->redirect(array('saleItem/index'));
                                        } else {
                                            Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,
                                                '<strong>' . ucfirst($data['model']->first_name) . '</strong> have been saved successfully!');
                                            $this->redirect(array('create'));
                                        }
                                    }
                                }
                            }
                        }

                    } catch (CDbException $e) {
                        $transaction->rollback();
                        Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_WARNING,'Oop something wrong : <strong>' . $e->getMessage());
                    }
                } else {
                    $has_error = "has-error";
                }
            }
        } else {
            throw new CHttpException(403, 'You are not authorized to perform this action');
        }

        if (Yii::app()->request->isAjaxRequest) {
            $cs = Yii::app()->clientScript;
            $cs->scriptMap = array(
                'jquery.js' => false,
                'bootstrap.js' => false,
                'jquery.min.js' => false,
                'bootstrap.notify.js' => false,
                'bootstrap.bootbox.min.js' => false,
            );

            echo CJSON::encode(array(
                'status' => 'render',
                'div' => $this->renderPartial('_form',
                    array('model' => $data['model'],
                            'contact' => $data['contact'],
                            'user'=>$data['user'],'disabled'=>$data['disabled'],
                            'has_error' => $has_error), true, false),
            ));

            Yii::app()->end();
        } else {
            $this->render('create', $data);
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionAddCustomer()
    {
        $model = new Client;

        if (Yii::app()->user->checkAccess('client.create')) {
            if (isset($_POST['Client'])) {
                $model->attributes = $_POST['Client'];
                if ($model->validate()) {
                    if ($model->save()) {
                        if (!empty($_POST['Client']['debter_id'])) {
                            $debter_id = $_POST['Client']['debter_id'];

                            $mod_debter_ref = new DebterClientRef;
                            $mod_debter_ref->client_id = $model->id;
                            $mod_debter_ref->debter_id = (int)$debter_id;
                            $mod_debter_ref->save();
                        }

                        Yii::app()->clientScript->scriptMap['jquery.js'] = false;

                        Yii::app()->shoppingCart->setCustomer($model->id);
                        $this->redirect(array('saleItem/index'));

                    }
                }
            }
        } else {
            throw new CHttpException(403, 'You are not authorized to perform this action');
        }


        if (Yii::app()->request->isAjaxRequest) {
            Yii::app()->clientScript->scriptMap['*.js'] = false;
            //Yii::app()->clientScript->scriptMap['*.cs'] = false;

            if (Yii::app()->settings->get('system', 'touchScreen') == '1') {
                echo CJSON::encode(array(
                    'status' => 'render',
                    'div' => $this->renderPartial('_form_touchscreen', array('model' => $model), true, false),
                ));
            } else {
                echo CJSON::encode(array(
                    'status' => 'render',
                    'div' => $this->renderPartial('_form', array('model' => $model), true, false),
                ));
            }

            Yii::app()->end();
        } else {
            $this->render('_form', array('model' => $model));
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id, $sale_mode = 'N')
    {
        $model = $this->loadModel($id);
        //$contact = Contact::model()->conatctByID($model->contact_id);
        $contact = new Contact();

        $user = RbacUser::model()->findByPk($model->login_id);

        $has_error = "";
        $disabled = "";

        /*if (!$contact) {
            $contact = New Contact;
        }*/

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (Yii::app()->user->checkAccess('client.update')) {
            if (isset($_POST['Client'])) {
                //print_r($_POST);
                //die();
                $model->attributes = $_POST['Client'];
                //$contact->attributes = $_POST['Contact'];

                if ($_POST['Client']['year'] !== "" || $_POST['Client']['month'] !== "" || $_POST['Client']['day'] !== "") {
                    $dob = $_POST['Client']['year'] . '-' . $_POST['Client']['month'] . '-' . $_POST['Client']['day'];
                    $model->dob = $dob;
                }

                // validate BOTH $a and $b
                $valid = $model->validate();
                //$valid = $contact->validate() && $valid;

                //if ($model->validate())
                if ($valid) {
                    $transaction = $model->dbConnection->beginTransaction();
                    try {

                        /*if (isset($_POST['Contact'])) {
                            $contact->save();
                            $model->contact_id = $contact->id;
                        }*/

                        if(isset($_POST['RbacUser']) && !empty($_POST['RbacUser']))
                        {
                            if (isset($_POST['Submit-btn']) && $_POST['Submit-btn'] == 'Save') //just wan to make sure it is created only new client only
                            {
                                $user->attributes = $_POST['RbacUser'];
                                if($user->validate())
                                {
                                    $user->save();
                                }
                            }
                        }

                        if ($model->save())
                        {
                            $client_fname = $model->first_name . ' ' . $model->last_name;
                            //$getLoginID = Client::model()->findByPk($model->id);
                            Account::model()->saveAccount($model->login_id, $client_fname);
                            $price_tier_id = $model->price_tier_id;

                            $transaction->commit();

                            if ($sale_mode == 'Y') {
                                Yii::app()->shoppingCart->setCustomer($id);
                                Yii::app()->shoppingCart->setPriceTier($price_tier_id);
                                $this->redirect(array('saleItem/index'));
                            } else {
                                Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,
                                    '<strong>' . ucfirst($model->first_name) . '</strong> have been saved successfully!');
                                $this->redirect(array('admin'));
                            }
                        }
                    } catch (Exception $e) {
                        $transaction->rollback();
                        //print_r($e);
                    }
                } else {
                    $has_error = "has-error";
                }
            }
        } else {
            throw new CHttpException(403, 'You are not authorized to perform this action');
        }

        if (Yii::app()->request->isAjaxRequest) {
            $cs = Yii::app()->clientScript;
            $cs->scriptMap = array(
                'jquery.js' => false,
                'bootstrap.js' => false,
                'jquery.min.js' => false,
                'bootstrap.notify.js' => false,
                'bootstrap.bootbox.min.js' => false,
            );

            echo CJSON::encode(array(
                'status' => 'render',
                'div' => $this->renderPartial('_form', array('model' => $model), true, false),
            ));

            Yii::app()->end();
        } else {
            $this->render('update', array('model' => $model,'user'=>$user, 'contact' => $contact, 'has_error' => $has_error));
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if (Yii::app()->user->checkAccess('client.delete')) {
            if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {
                Client::model()->deleteClient($id);
                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if (!isset($_GET['ajax'])) {
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                }
            } else {
                throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
            }
        } else {
            throw new CHttpException(403, 'You are not authorized to perform this action');
        }
    }

    public function actionUndoDelete($id)
    {
        if (Yii::app()->user->checkAccess('client.delete')) {
            if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {
                Client::model()->undodeleteClient($id);

                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if (!isset($_GET['ajax'])) {
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                }
            } else {
                throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
            }
        } else {
            throw new CHttpException(403, 'You are not authorized to perform this action');
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin($client_id = null)
    {
        $model = new Client('search');

        if (!Yii::app()->user->checkAccess(strtolower(get_class($model)) . '.index') || !Yii::app()->user->checkAccess(strtolower(get_class($model)) . '.create') || !Yii::app()->user->checkAccess(strtolower(get_class($model)) . '.update') || !Yii::app()->user->checkAccess(strtolower(get_class($model)) . '.delete')) {
            $this->redirect(array('site/ErrorException','err_no'=>403));
        }

        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Item'])) {
            $model->attributes = $_GET['Item'];
        }

        if (isset($_GET['pageSize'])) {
            Yii::app()->user->setState(strtolower(get_class($model)) . '_page_size', (int)$_GET['pageSize']);
            unset($_GET['pageSize']);
        }

        if (isset($_GET['archived'])) {
            Yii::app()->user->setState(strtolower(get_class($model)) . '_archived', $_GET['archived']);
            unset($_GET['archived']);
        }

        $model->client_archived = Yii::app()->user->getState(strtolower(get_class($model)) . '_archived', Yii::app()->params['defaultArchived']);

        $page_size = CHtml::dropDownList(
            'pageSize',
            Yii::app()->user->getState('employee_page_size', Common::defaultPageSize()),
            Common::arrayFactory('page_size'),
            array('class' => 'change-pagesize')
        );


        $data['model'] = $model;
        $data['grid_id'] = strtolower(get_class($model)) . '-grid';
        $data['main_div_id'] = strtolower(get_class($model)) . '_cart';
        $data['page_size'] = $page_size;

        $data['grid_columns'] = array(
            array(
                'name' => 'first_name',
                'value' => '$data->status=="1" ? CHtml::link($data->first_name, Yii::app()->createUrl("client/update",array("id"=>$data->primaryKey))) : "<span class=\"text-muted\">  $data->first_name <span>" ',
                'type' => 'raw',
            ),
            array(
                'name' => 'last_name',
                'value' => '$data->status=="1" ? CHtml::link($data->last_name, Yii::app()->createUrl("client/update",array("id"=>$data->primaryKey))) : "<span class=\"text-muted\">  $data->last_name <span>" ',
                'type' => 'raw',
            ),
            array(
                'name' => 'last_name',
                'value' => '$data->status=="1" ? $data->mobile_no : "<span class=\"text-muted\">  $data->mobile_no <span>"',
                'type' => 'raw',
            ),
            array(
                'name' => 'address1',
                'value' => '$data->status=="1" ? $data->address1 : "<span class=\"text-muted\">  $data->address1 <span>"',
                'type' => 'raw',
            ),
            array(
                'name' => 'balance',
                'header' => 'Balance',
                'value' => array($this, "gridBalance"),
                'visible' => Yii::app()->user->checkAccess("payment.index"),
                'type' => 'raw',
            )
        );

        $data['data_provider'] = $model->search();

        $this->render('admin', $data);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = Client::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'client-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /** Lookup Client for autocomplete
     *
     * @throws CHttpException
     */
    public function actionGetClient()
    {
        if (isset($_GET['term'])) {
            $term = trim($_GET['term']);
            $ret['results'] = Client::model()->select2Client($term); //PHP Example · ivaynberg/select2  http://bit.ly/10FNaXD got stuck serveral hoursss :|
            echo CJSON::encode($ret);
            Yii::app()->end();

        }
    }

    public function gridBalance($data, $row)
    {
        $account = Account::model()->getAccountInfo($data->id);
        if ($account) {
            echo $account->current_balance;
        } else {
            echo CHtml::encode('0.00');
        }
    }

    public function actionPayment($client_id)
    {
        if (!Yii::app()->user->checkAccess('payment.index')) {
            throw new CHttpException(403, 'You are not authorized to perform this action');
        }

        Yii::app()->paymentCart->setClientId($client_id);
        $this->redirect(array('salePayment/index'));

    }

    public function actionCopyClientInfo()
    {
        if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {

            $param = (int)$_POST['Client']['employee_id'];
            $employee = Employee::model()->findByPk($param);

            echo CJSON::encode(array(
                'status' => 'success',
                'mobile_no' => $employee->mobile_no,
                'first_name' => $employee->first_name,
                'last_name' => $employee->last_name,
                'address1' => $employee->adddress1,
                'address2' => $employee->address2,
                'notes' => $employee->notes,
            ));
        }
    }

    public function actionDynamicDistrict()
    {
        $data= District::model()->findAll('city_id=:parent_id',
            array(':parent_id' => (int) $_POST['Client']['city_id']));

        $data=CHtml::listData($data,'id','district_name');
        foreach($data as $value=>$name)
        {
            echo CHtml::tag('option',
                array('value'=>$value),CHtml::encode($name),true);
        }
    }

    public function actionDynamicCommune()
    {
        $data= Commune::model()->findAll('district_id=:parent_id',
            array(':parent_id' => (int) $_POST['Client']['district_id']));

        $data=CHtml::listData($data,'id','commune_name');
        foreach($data as $value=>$name)
        {
            echo CHtml::tag('option',
                array('value'=>$value),CHtml::encode($name),true);
        }
    }


}
