<?php

class Sales extends BaseController {
    
    public function getCreateSalesOrder(){
        $clients = Client::all();
        $terms = Term::all();
        $paper_types = Paper_type::all();
        $dimensions = Dimension::all();
        $weights = Weight::all();
        $callipers = Calliper::all();
        $products = Product::all();
        $rolls = Roll::all();
        
        $data = [
            'clients' => $clients,
            'terms' => $terms,
            'paper_types' => $paper_types,
            'dimensions' => $dimensions,
            'weights' => $weights,
            'callipers' => $callipers,
            'products' => $products,
            'rolls' => $rolls
        ];
        
        return View::make('sales.createsalesorder', $data);
    }
    
    public function postAddSalesOrder(){
        $so = Sales_order::create([
            'client' => Input::get('client'),
            'terms' => Input::get('term'),
            'created_by' => Auth::user()->id,
            'status' => 'pending'
        ]);
        
        for ($index = 0; $index < count(Input::get('subtotal')); $index++) {
            So_detail::create([
                'so_no' => $so->id,
                'transaction_type' => Input::get('transaction_type')[$index],
                'quantity' => Input::get('quantity')[$index],
                'paper_type' => Input::get('paper_type')[$index],
                'dimension' => Input::get('dimension')[$index],
                'weight' => Input::get('weight')[$index],
                'calliper' => Input::get('calliper')[$index],
                'total' => Input::get('subtotal')[$index],
                'price' => Input::get('price')[$index],
                'product' => Input::get('product')[$index],
                'roll' => Input::get('roll')[$index]
            ]);
        }
        return Redirect::to('sales/view-sales-order');
    }
    public function postApplyEditSalesOrder(){
        $id = Input::get('id');
        $so = Sales_order::find($id);
       
        $so->client = Input::get('client');
        $so->terms = Input::get('terms');
        $so->created_by = Auth::user()->id;
        $so->save();
        
        $so_d = So_d::where('so_no', '=', $id)->delete();
        for ($index = 0; $index < count(Input::get('paper_type')); $index++) {
            So_detail::create([
                'so_no' => $so->id,
                'transaction_type' => Input::get('transaction_type')[$index],
                'quantity' => Input::get('quantity')[$index],
                'paper_type' => Input::get('paper_type')[$index],
                'dimension' => Input::get('dimension')[$index],
                'weight' => Input::get('weight')[$index],
                'calliper' => Input::get('calliper')[$index],
                'total' => Input::get('total')[$index],
                'price' => Input::get('price')[$index],
                'product' => Input::get('product')[$index],
                'roll' => Input::get('roll')[$index]
            ]);
        }
        
        return Redirect::to('sales/view-sales-order');
    }
    
    public function postEditSalesOrder(){
        $id =  Input::get('id');
        $clients = Client::all();
        $terms = Term::all();
        $paper_types = Paper_type::all();
        $dimensions = Diemnsion::all();
        $weights = Weight::all();
        $callipers = Calliper::all();
        $products = Product::all();
        $rolls = Roll::all();
        $so = Sales_order::find($id)->delete();
        $so_d = So_detail::where('so_no','=','$id')->delete();
        
        $data = [
            'clients' => $clients,
            'terms' => $terms,
            'paper_types' => $paper_types,
            'dimensions' => $dimensions,
            'weights' => $weights,
            'callipers' => $callipers,
            'products' => $products,
            'rolls' => $rolls,
            'so' => $so,
            'so_d' => $so_d
        ];
        return View::make('sales.editsalesorder', $data);
    }
    
    public function postDeleteSalesOrder(){
        $id =  Input::get('id');
        Sales_order::find($id)->delete();
        So_detail::where('so_no','=','$id')->delete();
        return Redirect::to('sales/view-sales-orders');
    }
    

    public function getIndex()
    {
        return View::make('sales.index');
    }
    
    public function getMemo()
    {
        return View::make('sales.memo');
    }
    public function getViewSalesOrder()
    {
        dd(So_detail::all());
//        return View::make('sales.reminder');
    }
    
    public function getViewRolls() {
        $lamco_rolls = Roll::where('owner', '=', 'lamco')->get();
        $low_rolls = Roll::where('quantity','<',50)->get();
        $client_rolls = Roll::where('owner', '!=', 'lamco')->get();
        $data = [
            'lamco_rolls' => $lamco_rolls,
            'low_rolls' => $low_rolls,
            'client_rolls' => $client_rolls
        ];

//        print_r($low_rolls);
        
        return View::make('sales.viewrolls', $data);
    }
    public function getViewProducts() {
        $lamco_products = Product::where('owner', '=', 'lamco')->get();
        $low_products = Product::where('quantity','<',50)->get();
        $client_products = Product::where('owner', '!=', 'lamco')->get();
        $data = [
            'lamco_products' => $lamco_products,
            'low_products' => $low_products,
            'client_products' => $client_products
        ];

//        print_r($low_rolls);
        
        return View::make('sales.viewproducts', $data);
    }
}