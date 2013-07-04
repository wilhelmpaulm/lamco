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
        $paper_types = Paper_type::all();
        $dimensions  = Dimension::all();
        $weights = Weight::all();
        $caliipers = Calliper::all();
        $statuses = Status::all();
        $vendors = Vendor::all();
//        $t = Vendor::all();
        
        $data = [
            'paper_types' => $paper_types,
            'dimensions' => $dimensions,
            'weights' => $weights,
            'callipers' => $caliipers,
            'statuses' => $statuses,
            'vendors' => $vendors
        ];
        
        return View::make('purchasing.createpurchaseorder', $data);
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