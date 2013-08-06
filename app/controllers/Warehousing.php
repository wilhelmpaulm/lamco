<?php

class Warehousing extends BaseController {

    public function postValidate() {
        var_dump($_POST);
    }

    public function getIndex() {
        Stalk::stalkSystem("view main page of warehousing", null);
        return View::make('warehousing.index');
    }

    public function getMemos() {
        $memos = Memo::where('department', '=', Auth::user()->department)->get();
        $departments = Department::all();
        $data = [
            'departments' => $departments,
            'memos' => $memos
        ];
        Stalk::stalkSystem("view memos", null);
        return View::make('warehousing.memos', $data);
    }

    public static function postDeleteMemo() {
        Memo::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted memo", Input::get('id'));
        return Redirect::to('warehousing/memos');
    }

    public static function postAddMemo() {
        $m = Memo::create([
                    "created_by" => Auth::user()->id,
                    "deadline" => Input::get("deadline"),
                    "department" => Input::get("department"),
                    "importance" => Input::get("importance"),
                    "memo" => Input::get("memo")
        ]);
        Stalk::stalkSystem("created memo", $m->id);
        return Redirect::to('warehousing/memos');
    }

    public function getReminders() {
        $users = User::all();
        $reminders = Reminder::where('created_for', '=', Auth::user()->id)->get();
        $data = [
            'reminders' => $reminders,
            'users' => $users
        ];
        Stalk::stalkSystem("view reminders", null);
        return View::make('warehousing.reminders', $data);
    }

    public static function postDeleteReminder() {
        Reminder::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted reminder", Input::get('id'));
        return Redirect::to('warehousing/reminders');
    }

    public static function postAddReminder() {
        $r = Reminder::create([
                    "created_by" => Auth::user()->id,
                    "deadline" => Input::get("deadline"),
                    "created_for" => Input::get("created_for"),
                    "importance" => Input::get("importance"),
                    "reminder" => Input::get("reminder")
        ]);
        Stalk::stalkSystem("created reminder", $r->id);
        return Redirect::to('warehousing/reminders');
    }
    
    public function getViewRolls() {
        $lamco_rolls = Roll::where('owner', '=', 'lamco')->get();
        $low_rolls = Roll::where('quantity', '<', 50)->where('owner', '=', 'lamco')->get();
        $client_rolls = Roll::where('owner', '!=', 'lamco')->get();
        $data = [
            'lamco_rolls' => $lamco_rolls,
            'low_rolls' => $low_rolls,
            'client_rolls' => $client_rolls
        ];
        Stalk::stalkSystem("approved viewed rolls", null);
        return View::make('warehousing.viewrolls', $data);
    }

    public function getViewProducts() {
        $lamco_products = Product::where('owner', '=', 'lamco')->get();
        $low_products = Product::where('quantity', '<', 50)->where('owner', '=', 'lamco')->get();
        $client_products = Product::where('owner', '!=', 'lamco')->get();
        $data = [
            'lamco_products' => $lamco_products,
            'low_products' => $low_products,
            'client_products' => $client_products
        ];
        Stalk::stalkSystem("viewed products", null);
        return View::make('warehousing.viewproducts', $data);
    }

    public function getViewSuppliers() {
        $suppliers = Supplier::all();
        $data = [
            'suppliers' => $suppliers
        ];
        Stalk::stalkSystem("viewed suppliers", null);
        return View::make('warehousing.viewsuppliers', $data);
    }
    public function getViewReceivingReports() {
        $rr_p = Receiving_report::where('status', '=', 'pending')->get();
        $rr_a = Receiving_report::where('status', '=', 'approved')->get();
        $rr_f = Receiving_report::where('status', '=', 'completed')->get();
//        
        $data = [
            'rr_p' => $rr_p,
            'rr_a' => $rr_a,
            'rr_f' => $rr_f
        ];
        Stalk::stalkSystem("viewed receiving reports", null);
        return View::make('warehousing.viewreceivingreports', $data);
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
        $warehouses = Warehouse::all();
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
        Stalk::stalkSystem("view edit a recieving report", $id);
        return View::make('warehousing.editreceivingreport', $data);
    }
    public function postViewReceivingReport() {
        $id = Input::get('id');
        $rr = Receiving_report::find($id);
        $rr_d = Rr_detail::where('rr_no', '=', "$id")->get();
        $data = [
            'rr' => $rr,
            'rr_d' => $rr_d,
        ];
        Stalk::stalkSystem("view receiving report", $id);
        return View::make('warehousing.viewreceivingreport', $data);
    }
    
    public function postApplyEditReceivingReport() {
        $id = Input::get('id');
//        return $id;
        $rr = Receiving_report::find($id);
        $rr->supplier = Input::get('vendor');
        $rr->created_by = Auth::user()->id;
        $rr->save();
        
        $po = Purchase_order::find($rr->po_no);
        $po->status = "completed";
        $po->save();

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
        Stalk::stalkSystem("edited receiving report", $id);
        return Redirect::to('warehousing/view-receiving-reports');
    }
    public function postDeleteReceivingReport() {
        $id = Input::get('id');
        Receiving_report::find($id)->delete();
        Rr_detail::where('rr_no', '=', $id)->delete();
        Stalk::stalkSystem("deleted receiving report", $id);
        return Redirect::to('warehousing/view-receiving-reports');
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
            $sr = Roll::where('paper_type', '=', $rr_d->paper_type)
                    ->where('weight', '=', $rr_d->weight)
                    ->where('dimension', '=', $rr_d->dimension)
                    ->where('calliper', '=', $rr_d->calliper)
                    ->where('unit', '=', $rr_d->unit)
                    ->where('supplier', '=', $rr->supplier)
                    ->where('owner', '=', 'lamco')
                    ->where('warehouse', '=', $rr_d->warehouse)
                    ->where('location', '=', $rr_d->location)
                    ->first();
            if (isset($sr)) {
                $sr->increment('quantity', $rr_d->quantity);
                $sr->save();
            } else {

                Roll::create([
                    'supplier' => $rr->supplier,
                    'quantity' => $rr_d->quantity,
                    'paper_type' => $rr_d->paper_type,
                    'dimension' => $rr_d->dimension,
                    'weight' => $rr_d->weight,
                    'calliper' => $rr_d->calliper,
                    'warehouse' => $rr_d->warehouse,
                    'location' => $rr_d->location,
                    'unit' => $rr_d->unit,
                    'owner' => 'lamco'
                ]);
            }
        }

        Stalk::stalkSystem("approved receiving report", $id);
        return Redirect::to('warehousing/view-receiving-reports');
    }
    
    
    
    

}

