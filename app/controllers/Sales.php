<?php

class Sales extends BaseController {
//    
//    The body of this shit
//    
//    createsalesorder - done
//    addsalesorder - done
//    editsalesorder - done
//    applyeditsalesorder - done
//    
    
    
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
    
    public function getViewSalesOrders(){
        $so_p = Sales_order::where('status','=','pending')->get();
        $so_a = Sales_order::where('status','=','approved')->get();
        $so_f = Sales_order::where('status','=','finished')->get();
        
        $data = [
            'so_p' => $so_p,
            'so_a' => $so_a,
            'so_f' => $so_f
        ];
        
        return View::make('sales.viewsalesorders', $data);
    }
    
    public function postAddSalesOrder(){
        $so = Sales_order::create([
            'client' => Input::get('client'),
            'terms' => Input::get('terms'),
            'created_by' => Auth::user()->id,
            'status' => 'pending'
        ]);
        
        for ($index = 0; $index < count(Input::get('transaction_type')); $index++) {
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
        return Redirect::to('sales/view-sales-orders');
    }
    public function postApplyEditSalesOrder(){
        $id = Input::get('id');
        
        $so = Sales_order::find("$id");
        $so->client = Input::get('client');
        $so->terms = Input::get('terms');
        $so->created_by = Auth::user()->id;
        $so->save();
        
        $so_d = So_detail::where('so_no', '=', $id)->delete();
        for ($index = 0; $index < count(Input::get('transaction_type')); $index++) {
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
        
        return Redirect::to('sales/view-sales-orders');
    }
    
    public function postEditSalesOrder(){
        $id =  Input::get('id');
        $clients = Client::all();
        $terms = Term::all();
        $paper_types = Paper_type::all();
        $dimensions = Dimension::all();
        $weights = Weight::all();
        $callipers = Calliper::all();
        $products = Product::all();
        $rolls = Roll::all();
        $so = Sales_order::find($id);
        $so_d = So_detail::where('so_no','=',$id)->get();
        
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
    
    public function postApproveSalesOrder(){
        $id =  Input::get('id');
        $so = Sales_order::find($id);
        $so->status = "approved";
        $so->approved_by = Auth::user()->id;
        $so->save();
        
        $so_ds = So_detail::where('so_no','=',$id)->get();
        foreach($so_ds as $so_d){
            if($so_d->transaction_type == 'reserve'){
                Roll::where('id','=',$so_d->roll )->decrement('quantity', $so_d->quantity);
                $r =  Roll::find($so_d->roll);
                Roll::create([
                   'quantity' => $so_d->quantity,
                    'paper_type' => $r->paper_type,
                    'weight' => $r->weight,
                    'calliper' => $r->calliper,
                    'dimension' => $r->dimension,
                    'supplier' => $r->supplier,
                    'unit' => $r->unit,
                    'warehouse' => $r->warehouse,
                    'location' => $r->location,
                    'owner' => $so->client
                ]);
            }
            elseif($so_d->transaction_type == 'ordinary'){
                Product::where('id','=',$so_d->product )->decrement('quantity', $so_d->quantity);
                $p =  Product::find($so_d->product);
                Product::create([
                   'quantity' => $so_d->quantity,
                    'paper_type' => $p->paper_type,
                    'weight' => $p->weight,
                    'calliper' => $p->calliper,
                    'dimension' => $p->dimension,
                    'warehouse' => $p->warehouse,
                    'price' => $so_d->price,
                    'location' => $p->location,
                    'owner' => $so->client
                ]);
            }
            elseif($so_d->transaction_type == 'special'){
//                
            }
           
            
        }
        
        
        
        return Redirect::to('sales/view-sales-orders');
    }
    
    public function postDeleteSalesOrder(){
        $id =  Input::get('id');
        Sales_order::find($id)->delete();
        So_detail::where('so_no','=',$id)->delete();
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