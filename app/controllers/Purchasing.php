<?php

class Purchasing extends BaseController {

    public function getIndex()
    {
        return View::make('purchasing.index');
    }
    public function getMemo()
    {
        return View::make('purchasing.memo');
    }
    public function getReminder()
    {
        return View::make('purchasing.reminder');
    }
    public function getCreatePurchaseOrder()
    {
        return View::make('purchasing.createpurchaseorder');
    }
    public function getPurchaseOrderSummary()
    {
        return View::make('purchasing.reminder');
    }
    public function getApprovePurchaseOrder()
    {
        return View::make('purchasing.reminder');
    }
    public function getViewRolls()
    {
        $rolls = Roll::all();
        $data = ['rolls' => $rolls];
        return View::make('purchasing.rolls', $data);
    }
    
}