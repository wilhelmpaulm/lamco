<?php

class Sales extends BaseController {

    public function getIndex()
    {
        return View::make('sales.index');
    }
    
    public function getMemo()
    {
        return View::make('sales.memo');
    }
    public function getReminder()
    {
        return View::make('sales.reminder');
    }
    public function getCreatePurchaseOrder()
    {
        return View::make('sales.reminder');
    }
    public function getPurchaseOrderSummary()
    {
        return View::make('sales.reminder');
    }
    public function getApprovePurchaseOrder()
    {
        return View::make('sales.reminder');
    }
    
    public function getPoopHansen()
    {
        echo "mama";
    }
}