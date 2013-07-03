<?php

class Delivery extends BaseController {

    public function getIndex()
    {
        return View::make('delivery.index');
    }
    
    public function getMemo()
    {
        return View::make('delivery.memo');
    }
    public function getReminder()
    {
        return View::make('delivery.reminder');
    }
    public function getCreatePurchaseOrder()
    {
        return View::make('delivery.reminder');
    }
    public function getPurchaseOrderSummary()
    {
        return View::make('delivery.reminder');
    }
    public function getApprovePurchaseOrder()
    {
        return View::make('delivery.reminder');
    }
    
    public function getPoopHansen()
    {
        echo "mama";
    }
}