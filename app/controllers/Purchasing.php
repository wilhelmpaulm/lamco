<?php

class Purchasing extends BaseController {

    public function getIndex() {
        return View::make('purchasing.index');
    }

    public function getMemo() {
        return View::make('purchasing.memo');
    }

    public function getReminder() {
        return View::make('purchasing.reminder');
    }

    public function getCreatePurchaseOrder() {
        $paper_types = Paper_type::all();
        $dimensions = Dimension::all();
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

    public function postCreatePurchaseOrder() {
        $po_no = 0;
        
        for ($index = 0; $index < count($paper_type); $index++) {
            
            
          $po = Purchase_order::create([
                'vendor' => Input::get("vendor"),
                'status' => Input::get("status"),
                'created_by' => Auth::user()->id,
                'paper_type' => Input::get("paper_type[$index]"),
                'dimension' => Input::get("dimension[$index]"),
                'quantity' => Input::get("quantity[$index]"),
                'weight' => Input::get("weight[$index]"),
                'calliper' => Input::get("calliper[$index]"),
                'price' => Input::get("price[$index]"),
                'total' => Input::get("subtotal[$index]")
            ]);
          if($po == 0){
//              $po_no = 
          }
          
        }

        return Redirect::to('purchasing/create-purchase-order');
//        return View::make('purchasing.createpurchaseorder', $);
    }

    public function getPurchaseOrderSummary() {
        return View::make('purchasing.reminder');
    }

    public function getApprovePurchaseOrder() {
        return View::make('purchasing.reminder');
    }

    public function getViewRolls() {
        $rolls = Roll::all();
        $data = ['rolls' => $rolls];

        return View::make('purchasing.rolls', $data);
    }
    public function getViewProducts() {
        $products = Product::all();
        $data = ['products' => $products];

        return View::make('purchasing.products', $data);
    }

}