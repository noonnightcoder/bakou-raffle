<?php

    function bizName() {
        return param('biz_name');
    }

    function bizNameFirstUpper() {
        return ucfirst(param('biz_name'));
    }

    function bizWebsite()
    {
        return 'http://peedor.com';
    }

    function bizVision()
    {
        return "To bring new exciting experience and creative innovation to all parent business";
    }

    function companyName() {
        return param('company_name');
    }

    function companyNameUpper() {
        return strtoupper(param('company_name'));
    }

    function companyNameFirstUpper() {
        return ucfirst(param('company_name'));
    }

    function companySlogan() {
        return param('company_slogan');
    }

    function companySloganUcwords() {
        return ucwords(param('company_slogan'));
    }

    function ddmonyyyy() {
        return date('d M Y');
    }

    function freeTrialText()
    {
        return 'Start Free Trail';
    }

    function invFolderPath()
    {
        return Yii::app()->shoppingCart->getInvoiceFormat();
    }

    function invIfSaleRep(){

        if (Yii::app()->settings->get('receipt', 'printSaleRep')=='1'){
            return true;
        }

        return false;
    }

    function invIfCompanyLogo(){

        if (Yii::app()->settings->get('receipt', 'printcompanyLogo')=='1'){
            return true;
        }

        return false;
    }

    function invIfCompanyName(){

        if (Yii::app()->settings->get('receipt', 'printcompanyName')=='1'){
            return true;
        }

        return false;
    }

    function invIfCompanyPhone(){

        if (Yii::app()->settings->get('receipt', 'printcompanyPhone')=='1'){
            return true;
        }

        return false;
    }

    function invIfCompanyAdd(){

        if (Yii::app()->settings->get('receipt', 'printcompanyAddress')=='1'){
            return true;
        }

        return false;
    }

    function invIfCompanyAdd1(){

        if (Yii::app()->settings->get('receipt', 'printcompanyAddress1')=='1'){
            return true;
        }

        return false;
    }

    function invIfTransTime(){

        if (Yii::app()->settings->get('receipt', 'printtransactionTime')=='1'){
            return true;
        }

        return false;
    }

    function curcurrencySympbol() {
        return Yii::app()->settings->get('site', 'currencySymbol');
    }

    function invNumInterval() {
        return Yii::app()->settings->get('system', 'invoiceNumInterval');
    }

    function invNumPrefix() {
        return Yii::app()->settings->get('site', 'invoicePrefix') . date('y') . '-00000';
    }

    function sysMenuCustomer() {
        return 'Player';
    }

    function sysMenuItem() {
        return 'Reward';
    }

    function sysMenuPayment() {
        return 'Deposit';
    }

    function sysRWithdraw()
    {
        return 'Withdraw';
    }



