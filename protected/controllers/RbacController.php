<?php

class RbacController extends Controller
{
    public function actionIndex()
    {
        $auth = Yii::app()->authManager;

        // add "Dashboard" permission
        $auth->createOperation('dashboard.read', 'view all dashboard');

        // add "Item" permission
        $auth->createOperation('item.create', 'create an item');
        $auth->createOperation('item.read', 'read an item');
        $auth->createOperation('item.update', 'update an item');
        $auth->createOperation('item.delete', 'delete an item');

        // add "Employee" permission
        $auth->createOperation('employee.create', 'create an customer');
        $auth->createOperation('employee.read', 'read an customer');
        $auth->createOperation('employee.update', 'update an customer');
        $auth->createOperation('employee.delete', 'delete an customer');

        // add "Customer" permission
        $auth->createOperation('customer.create', 'create an customer');
        $auth->createOperation('customer.read', 'read an customer');
        $auth->createOperation('customer.update', 'update an customer');
        $auth->createOperation('customer.delete', 'delete an customer');
        $auth->createOperation('customer.deposit', 'deposit an customer account balance');

        // add "Sale" permission
        $auth->createOperation('sale.create', 'create an sale');
        $auth->createOperation('sale.read', 'read an sale');
        $auth->createOperation('sale.update', 'update an sale');
        $auth->createOperation('sale.delete', 'delete an sale');


        $role = $auth->createRole('hr','human resource role');
        $role->addChild('employee.create');
        $role->addChild('employee.read');
        $role->addChild('employee.update');
        $role->addChild('employee.delete');

        $role = $auth->createRole('operator','operator role');
        $role->addChild('item.create');
        $role->addChild('item.read');
        $role->addChild('item.update');
        $role->addChild('item.delete');
        $role->addChild('sale.create');
        $role->addChild('sale.read');
        $role->addChild('sale.update');
        $role->addChild('sale.delete');
        $role->addChild('customer.create');
        $role->addChild('customer.read');
        $role->addChild('customer.update');
        $role->addChild('customer.delete');
        $role->addChild('customer.deposit');
        $role->addChild('hr');

        $role = $auth->createRole('admin','admin role');
        $role->addChild('operator');
        $role->addChild('hr');

        $auth->assign('operator', '4');
        $auth->assign('admin', '3');

    }
}