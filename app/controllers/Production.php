<?php

class Production extends BaseController {

    public function getIndex()
    {
        return View::make('production.index');
    }
    
    public function getMemo()
    {
        return View::make('production.memo');
    }
    public function getReminder()
    {
        return View::make('production.reminder');
    }
    public function getCreatePurchaseOrder()
    {
        return View::make('production.reminder');
    }
    public function getPurchaseOrderSummary()
    {
        return View::make('production.reminder');
    }
    public function getApprovePurchaseOrder()
    {
        return View::make('production.reminder');
    }
    
    public function getPoopHansen()
    {
        echo "mama";
    }
}