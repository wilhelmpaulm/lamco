<?php

class Purchasing extends BaseController {

    public function getNotif(){
        return Roll::where('quantity','<','50')->get()->toJson();
    }
    
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
        $vendors = Supplier::all();
        $units = Unit::all();

        $data = [
            'paper_types' => $paper_types,
            'dimensions' => $dimensions,
            'weights' => $weights,
            'callipers' => $caliipers,
            'statuses' => $statuses,
            'units' => $units,
            'vendors' => $vendors
        ];

        return View::make('purchasing.createpurchaseorder', $data);
    }

    public function postEditPurchaseOrder() {
        $id = Input::get('id');

        $paper_types = Paper_type::all();
        $dimensions = Dimension::all();
        $weights = Weight::all();
        $caliipers = Calliper::all();
        $statuses = Status::all();
        $vendors = Supplier::all();
        $units = Unit::all();

        $po = Purchase_order::find($id);
        $po_d = Po_detail::where('po_no', '=', "$id")->get();


        $data = [
            'po' => $po,
            'po_d' => $po_d,
            'paper_types' => $paper_types,
            'dimensions' => $dimensions,
            'weights' => $weights,
            'callipers' => $caliipers,
            'statuses' => $statuses,
            'units' => $units,
            'vendors' => $vendors
        ];

        return View::make('purchasing.editpurchaseorder', $data);
    }

    public function postEditReceivingReport() {
        $id = Input::get('id');

        $paper_types = Paper_type::all();
        $dimensions = Dimension::all();
        $weights = Weight::all();
        $caliipers = Calliper::all();
        $statuses = Status::all();
        $vendors = Supplier::all();
        $units = Unit::all();
        $warehouses = warehouse::all();
        $locations = Location::all();

        $rr = Receiving_report::find($id);
        $rr_d = Rr_detail::where('rr_no', '=', "$id")->get();


        $data = [
            'rr' => $rr,
            'rr_d' => $rr_d,
            'paper_types' => $paper_types,
            'dimensions' => $dimensions,
            'weights' => $weights,
            'callipers' => $caliipers,
            'statuses' => $statuses,
            'units' => $units,
            'warehouses' => $warehouses,
            'locations' => $locations,
            'vendors' => $vendors
        ];

        return View::make('purchasing.editreceivingreport', $data);
    }

    public function postViewPurchaseOrder() {
        $id = Input::get('id');
        $po = Purchase_order::find($id);
        $po_d = Po_detail::where('po_no', '=', "$id")->get();
        $data = [
            'po' => $po,
            'po_d' => $po_d,
        ];

        return View::make('purchasing.viewpurchaseorder', $data);
    }

    public function postViewReceivingReport() {
        $id = Input::get('id');
        $rr = Receiving_report::find($id);
        $rr_d = Rr_detail::where('rr_no', '=', "$id")->get();
        $data = [
            'rr' => $rr,
            'rr_d' => $rr_d,
        ];

        return View::make('purchasing.viewreceivingreport', $data);
    }

    public function postApplyEditPurchaseOrder() {
        $id = Input::get('id');
//        return $id;
        $po = Purchase_order::find($id);
        $po->supplier = Input::get('vendor');
        $po->created_by = Auth::user()->id;
        $po->save();

        Po_detail::where('po_no', '=', $po->id)->delete();

        for ($index = 0; $index < count(Input::get('paper_type')); $index++) {
            $po_d = Po_detail::create([
                        'po_no' => $po->id,
                        'quantity' => Input::get("quantity")[$index],
                        'paper_type' => Input::get("paper_type")[$index],
                        'dimension' => Input::get("dimension")[$index],
                        'weight' => Input::get("weight")[$index],
                        'calliper' => Input::get("calliper")[$index],
                        'instructions' => Input::get("instructions")[$index],
                        'price' => Input::get("price")[$index],
                        'unit' => Input::get("unit")[$index],
                        'total' => Input::get("subtotal")[$index]
            ]);
        }

        return Redirect::to('purchasing/view-purchase-orders');
    }

    public function postApplyEditReceivingReport() {
        $id = Input::get('id');
//        return $id;
        $rr = Receiving_report::find($id);
        $rr->supplier = Input::get('vendor');
        $rr->created_by = Auth::user()->id;
        $rr->save();

        Rr_detail::where('rr_no', '=', $rr->id)->delete();

        for ($index = 0; $index < count(Input::get('paper_type')); $index++) {
            $rr_d = Rr_detail::create([
                        'rr_no' => $rr->id,
                        'quantity' => Input::get("quantity")[$index],
                        'paper_type' => Input::get("paper_type")[$index],
                        'dimension' => Input::get("dimension")[$index],
                        'weight' => Input::get("weight")[$index],
                        'calliper' => Input::get("calliper")[$index],
                        'instructions' => Input::get("instructions")[$index],
                        'warehouse' => Input::get("warehouse")[$index],
                        'location' => Input::get("location")[$index],
                        'unit' => Input::get("unit")[$index]
            ]);
        }

        return Redirect::to('purchasing/view-receiving-reports');
    }

    public function postAddPurchaseOrder() {
        $po = Purchase_order::create([
                    'supplier' => Input::get('vendor'),
                    'created_by' => Auth::user()->id,
                    'status' => 'Pending'
        ]);
        for ($index = 0; $index < count(Input::get('paper_type')); $index++) {
            $po_d = Po_detail::create([
                        'po_no' => $po->id,
                        'quantity' => Input::get("quantity")[$index],
                        'paper_type' => Input::get("paper_type")[$index],
                        'dimension' => Input::get("dimension")[$index],
                        'weight' => Input::get("weight")[$index],
                        'calliper' => Input::get("calliper")[$index],
                        'instructions' => Input::get("instructions")[$index],
                        'price' => Input::get("price")[$index],
                        'unit' => Input::get("unit")[$index],
                        'total' => Input::get("subtotal")[$index]
            ]);
        }

        return Redirect::to('purchasing/view-purchase-orders');
    }

    public function postDeletePurchaseOrder() {
        $id = Input::get('id');
        Purchase_order::find($id)->delete();
        Po_detail::where('po_no', '=', $id)->delete();
        return Redirect::to('purchasing/view-purchase-orders');
    }

    public function postDeleteReceivingReport() {
        $id = Input::get('id');
        Receiving_report::find($id)->delete();
        Rr_detail::where('rr_no', '=', $id)->delete();
        return Redirect::to('purchasing/view-receiving-reports');
    }

    public function postApprovePurchaseOrder() {
        $id = Input::get('id');
        $po = Purchase_order::find($id);
        $po->status = "Approved";
        $po->approved_by = Auth::user()->id;
        $po->save();
        $rr = Receiving_report::create([
                    'po_no' => $id,
                    'supplier' => $po->supplier,
                    'created_by' => Auth::user()->id,
                    'status' => 'Pending'
        ]);
        $po_d = Po_detail::where('po_no', '=', $id)->get();
        foreach ($po_d as $po_d) {
            Rr_detail::create([
                'rr_no' => $rr->id,
                'quantity' => $po_d->quantity,
                'paper_type' => $po_d->paper_type,
                'dimension' => $po_d->dimension,
                'weight' => $po_d->weight,
                'calliper' => $po_d->calliper,
                'instructions' => $po_d->instructions,
                'unit' => $po_d->unit
            ]);
        }
        return Redirect::to('purchasing/view-purchase-orders');
    }

    public function postApproveReceivingReport() {
        $id = Input::get('id');
        $rr = Receiving_report::find($id);
        $rr->status = "Approved";
        $rr->approved_by = Auth::user()->id;
        $rr->save();
//
        $rr_d = Rr_detail::where('rr_no', '=', $id)->get();
        foreach ($rr_d as $rr_d) {
            $sr = Roll::where('paper_type','=',$rr_d->paper_type)
                    ->where('weight','=',$rr_d->weight)
                    ->where('dimension','=',$rr_d->dimension)
                    ->where('calliper','=',$rr_d->calliper)
                    ->where('unit','=',$rr_d->unit)
                    ->where('supplier','=',$rr->supplier)
                    ->where('owner','=','lamco')
                    ->where('warehouse','=',$rr_d->warehouse)
                    ->where('location','=',$rr_d->location)
                    ->first();
            if(isset($sr)){
               $sr->increment('quantity',$rr_d->quantity);
               $sr->save();
            }
            else{
                
            Roll::create([
                'supplier' => $rr->supplier,
                'quantity' => $rr_d->quantity,
                'paper_type' => $rr_d->paper_type,
                'dimension' => $rr_d->dimension,
                'weight' => $rr_d->weight,
                'calliper' => $rr_d->calliper,
//                'instructions' => $rr->instructions,
                'warehouse' => $rr_d->warehouse,
                'location' => $rr_d->location,
                'unit' => $rr_d->unit,
                'owner' => 'lamco'
            ]);
            }
            
            
//            dd($sr);        
        }


        return Redirect::to('purchasing/view-receiving-reports');
    }

    public function getViewPurchaseOrders() {
        $pos_p = Purchase_order::where('status', '=', 'pending')->get();
        $pos_a = Purchase_order::where('status', '=', 'approved')->get();
        $pos_f = Purchase_order::where('status', '=', 'finished')->get();
//        
        $data = [
            'pos_p' => $pos_p,
            'pos_a' => $pos_a,
            'pos_f' => $pos_f
        ];
//        
        return View::make('purchasing.viewpurchaseorders', $data);
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
        
        return View::make('purchasing.viewrolls', $data);
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
        
        return View::make('purchasing.viewproducts', $data);
    }


    public function getViewVendors() {
        $products = Product::all();
        $data = ['products' => $products];

        return View::make('purchasing.viewvendors', $data);
    }

    public function getViewReceivingReports() {
        $rr_p = Receiving_report::where('status', '=', 'pending')->get();
        $rr_a = Receiving_report::where('status', '=', 'approved')->get();
        $rr_f = Receiving_report::where('status', '=', 'finished')->get();
//        
        $data = [
            'rr_p' => $rr_p,
            'rr_a' => $rr_a,
            'rr_f' => $rr_f
        ];

        return View::make('purchasing.viewreceivingreports', $data);
    }

    public function getManageRolls() {
        $paper_types = Paper_type::all();
        $dimensions = Dimension::all();
        $weights = Weight::all();
        $caliipers = Calliper::all();
        $statuses = Status::all();
        $vendors = Supplier::all();
//        $t = Vendor::all();

        $data = [
            'paper_types' => $paper_types,
            'dimensions' => $dimensions,
            'weights' => $weights,
            'callipers' => $caliipers,
            'statuses' => $statuses,
            'vendors' => $vendors
        ];
        return View::make('purchasing.managerolls', $data);
    }

    public function getManageProducts() {
        $products = Product::all();
        $data = ['products' => $products];

        return View::make('purchasing.manageproducts', $data);
    }

    public function getManageVendors() {
        $products = Product::all();
        $data = ['products' => $products];

        return View::make('purchasing.managevendors', $data);
    }

}