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

    public function postAddPurchaseOrder() {
        $po = Purchase_order::create([
                    'vendor' => Input::get('vendor'),
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
                        'total' => Input::get("subtotal")[$index]
            ]);
        }

        return Redirect::to('purchasing/view-purchase-orders');
    }
    
    public function postDeletePurchaseOrder(){
        $id = Input::get('id');
        Purchase_order::find($id)->delete();
        Po_detail::where('po_no','=',$id)->delete();
        return Redirect::to('purchasing/view-purchase-orders');
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

    public function getApprovePurchaseOrder() {
        return View::make('purchasing.reminder');
    }

    public function getViewRolls() {
        $rolls = Roll::all();
        $data = ['rolls' => $rolls];

        return View::make('purchasing.viewrolls', $data);
    }

    public function getViewProducts() {
        $products = Product::all();
        $data = ['products' => $products];

        return View::make('purchasing.viewproducts', $data);
    }

    public function getViewVendors() {
        $products = Product::all();
        $data = ['products' => $products];

        return View::make('purchasing.viewvendors', $data);
    }

    public function getReceivingReports() {
//        $pos = Product::all();
//        $data = ['products' => $products];
//
//        return View::make('purchasing.viewvendors', $data);
    }

    public function getManageRolls() {
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