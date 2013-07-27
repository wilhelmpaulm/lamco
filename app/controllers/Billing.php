<?php

class Billing extends BaseController {
    
    
    

    public function getIndex()
    {
        return View::make('billing.index');
    }
    
    public function getMemo()
    {
        return View::make('billing.memo');
    }
   
    
    public function getViewRolls() {
        $lamco_rolls = Roll::where('owner', '=', 'lamco')->get();
        $low_rolls = Roll::where('quantity','<',50)->where('owner', '=', 'lamco')->get();
        $client_rolls = Roll::where('owner', '!=', 'lamco')->get();
        $data = [
            'lamco_rolls' => $lamco_rolls,
            'low_rolls' => $low_rolls,
            'client_rolls' => $client_rolls
        ];
        return View::make('billing.viewrolls', $data);
    }
    public function getViewProducts() {
        $lamco_products = Product::where('owner', '=', 'lamco')->get();
        $low_products = Product::where('quantity','<',50)->where('owner', '=', 'lamco')->get();
        $client_products = Product::where('owner', '!=', 'lamco')->get();
        $data = [
            'lamco_products' => $lamco_products,
            'low_products' => $low_products,
            'client_products' => $client_products
        ];
        return View::make('billing.viewproducts', $data);
    }
}