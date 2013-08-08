<?php

class Production extends BaseController {
    
    public function getViewSuppliers() {
        $suppliers = Supplier::all();
        $data = [
            'suppliers' => $suppliers
        ];
        Stalk::stalkSystem("view suppliers", null);
        return View::make('production.viewsuppliers', $data);
    }
    
    public function getNotif() {
//        return Roll::where('quantity', '<', '50')->where('owner', '=', 'lamco')->get()->toJson();
        
        $data = [
          'rolls' =>  Roll::where('quantity', '<', '50')->where('owner', '=', 'lamco')->get()->toJson(), 
          'products' =>  Product::where('quantity', '<', '50')->where('owner', '=', 'lamco')->get()->toJson(), 
            'reminders' => Reminder::where("created_for", "=", Auth::user()->id)->get()->toJson(),
            'memos' => Memo::where("department", "=", Auth::user()->department)->get()->toJson()
        ];
        return json_encode($data);
    }
    
    public function getViewClients() {
        $clients = Client::all();
        $data = [
            'clients' => $clients
        ];
        Stalk::stalkSystem("view clients", null);
        return View::make('production.viewclients', $data);
    }

    public function getViewJobOrders() {
        $mq_p = Machine_queue::where('status', '=', 'pending')->get();
        $mq_a = Machine_queue::where('status', '=', 'approved')->get();
        $mq_i = Machine_queue::where('status', '=', 'in production')->get();
        $data = [
            'mq_p' => $mq_p,
            'mq_a' => $mq_a,
            'mq_i' => $mq_i
        ];
        Stalk::stalkSystem("view job orders", null);
        return View::make('production.viewjoborders', $data);
    }

    public function getViewProductionRecords() {
        $pr_p = Production_record::where('status', '=', 'pending')->get();
        $pr_a = Production_record::where('status', '=', 'approved')->get();
        $pr_i = Production_record::where('status', '=', 'processed')->get();
        $data = [
            'pr_p' => $pr_p,
            'pr_a' => $pr_a,
            'pr_i' => $pr_i
        ];
        Stalk::stalkSystem("view production records", null);
        return View::make('production.viewproductionrecords', $data);
    }

    public function postViewProductionRecord() {
        $id = Input::get('id');
        $pr = Production_record::find($id);
        $mq = Machine_queue::find($pr->mq_no);
        $pr_d = Pr_detail::where('pr_no', '=', $id)->get();
        $so = Sales_order::find($pr->so_no);


        $data = [

            'mq' => $mq,
            'so' => $so,
            'pr' => $pr,
            'pr_d' => $pr_d
        ];
        Stalk::stalkSystem("view production record", $id);
        return View::make('production.production_record', $data);
//        return View::make('production.viewproductionrecord', $data);
    }

    public function postViewApproveProductionRecord() {
        $id = Input::get('id');
        $pr = Production_record::find($id);
        $mq = Machine_queue::find($pr->mq_no);
        $pr_d = Pr_detail::where('pr_no', '=', $id)->get();
        $so = Sales_order::find($pr->so_no);
        $rolls = Roll::where('owner', '=', $so->client)->get();
        $machines = Machine::where('type', '=', $pr->production_type)->get();

        $warehouses = Warehouse::all();
        $locations = Location::all();
        $units = Unit::all();
        $paper_types = Paper_type::all();
        $weights = Weight::all();
        $callipers = Calliper::all();

        $data = [
            'rolls' => $rolls,
            'units' => $units,
            'paper_types' => $paper_types,
            'weights' => $weights,
            'callipers' => $callipers,
            'warehouses' => $warehouses,
            'locations' => $locations,
            'rolls' => $rolls,
            'machines' => $machines,
            'mq' => $mq,
            'so' => $so,
            'pr' => $pr,
            'pr_d' => $pr_d
        ];
        Stalk::stalkSystem("view approve production record", $id);
        return View::make('production.production_record', $data);
//        return View::make('production.approveproductionrecord', $data);
    }

    public function postEditProductionRecord() {
        $id = Input::get('id');
        $pr = Production_record::find($id);
        $mq = Machine_queue::find($pr->mq_no);
        $pr_d = Pr_detail::where('pr_no', '=', $id)->get();
        $so = Sales_order::find($pr->so_no);
        $rolls = Roll::where('owner', '=', $so->client)->get();
        $machines = Machine::where('type', '=', $pr->production_type)->get();

        $warehouses = Warehouse::all();
        $locations = Location::all();
        $units = Unit::all();
        $paper_types = Paper_type::all();
        $weights = Weight::all();
        $callipers = Calliper::all();

        $data = [
            'rolls' => $rolls,
            'units' => $units,
            'paper_types' => $paper_types,
            'weights' => $weights,
            'callipers' => $callipers,
            'warehouses' => $warehouses,
            'locations' => $locations,
            'rolls' => $rolls,
            'machines' => $machines,
            'mq' => $mq,
            'so' => $so,
            'pr' => $pr,
            'pr_d' => $pr_d
        ];
        Stalk::stalkSystem("view edit production record", $id);
        return View::make('production.editproductionrecord', $data);
    }

    public function postEditJobOrder() {
        $id = Input::get('id');
        $mq = Machine_queue::find($id);
        $mq_d = Mq_detail::where('mq_no', '=', $id)->get();
        $so = Sales_order::find($mq->so_no);
        $rolls = Roll::where('owner', '=', $so->client)->get();
        $machines = Machine::where('type', '=', $mq->production_type)->get();
//        $production_types = Production_type::all();

        $data = [
            'rolls' => $rolls,
            'machines' => $machines,
            'so' => $so,
//            'production_types' => $production_types,
            'mq' => $mq,
            'mq_d' => $mq_d
        ];
        Stalk::stalkSystem("view edit job orders", $id);
        return View::make('production.editjoborder', $data);
    }

    public function postViewApproveJobOrder() {
        $id = Input::get('id');
        $mq = Machine_queue::find($id);
        $mq_d = Mq_detail::where('mq_no', '=', $id)->get();
        $so = Sales_order::find($mq->so_no);
        $rolls = Roll::where('owner', '=', $so->client)->get();
        $machines = Machine::where('type', '=', $mq->production_type)->get();
//        $production_types = Production_type::all();

        $data = [
            'rolls' => $rolls,
            'machines' => $machines,
            'so' => $so,
//            'production_types' => $production_types,
            'mq' => $mq,
            'mq_d' => $mq_d
        ];


        Stalk::stalkSystem("view approve production record", $id);
        return View::make('production.approvejoborder', $data);
    }

    public function postApplyEditJobOrder() {
        $id = Input::get('id');
        $mq = Machine_queue::find($id);
        $mq->machine = Input::get('machine');
        $mq->status = 'in production';
        $mq->save();

        Mq_detail::where('mq_no', '=', $id)->delete();
        for ($index = 0; $index < count(Input::get('transaction_type')); $index++) {
            Mq_detail::create([
                'mq_no' => $id,
                'unit' => Input::get('unit')[$index],
                'quantity' => Input::get('quantity')[$index],
                'roll' => Input::get('roll')[$index],
                'paper_type' => Input::get('paper_type')[$index],
                'weight' => Input::get('weight')[$index],
                'calliper' => Input::get('calliper')[$index],
                'dimension' => Input::get('dimension')[$index],
                'transaction_type' => Input::get('transaction_type')[$index]
            ]);
        };

        $mq_d = Mq_detail::where('mq_no', '=', $id)->get();
        foreach ($mq_d as $mq_d) {
            if ($mq_d->transaction_type == 'roll') {
                $r = Roll::where('id', '=', $mq_d->roll)->first();
                $r->decrement('quantity', $mq_d->quantity);
                $r->save();
            }
        };

        Stalk::stalkSystem("edited job order", $id);
        return Redirect::to('production/view-job-orders');
    }

    public function postApplyEditProductionRecord() {
//        var_dump($_POST);
        $id = Input::get('id');
        $pr = Production_record::find($id);

        Pr_detail::where('pr_no', '=', $id)->delete();
        for ($index = 0; $index < count(Input::get('transaction_type')); $index++) {
            Pr_detail::create([
                'pr_no' => $id,
                'quantity' => Input::get('quantity')[$index],
                'paper_type' => Input::get('paper_type')[$index],
                'dimension' => Input::get('dimension')[$index],
                'weight' => Input::get('weight')[$index],
                'calliper' => Input::get('calliper')[$index],
                'unit' => Input::get('unit')[$index],
                'owner' => Sales_order::find($pr->so_no)->client,
                'roll' => Input::get('roll')[$index],
                'warehouse' => Input::get('warehouse')[$index],
                'location' => Input::get('location')[$index],
                'transaction_type' => Input::get('transaction_type')[$index]
            ]);
        };

        $pr->checker_b = Auth::user()->id;
        $pr->status = 'processed';
        $pr->save();


        Stalk::stalkSystem("edited production record", $id);
        return Redirect::to('production/view-production-records');
    }

    public function postApproveJobOrder() {
//      var_dump($_POST);  
//      echo "helllo paul";
        $id = Input::get('id');
        $mq = Machine_queue::find($id);
        $mq_d = Mq_detail::where('mq_no', '=', $id)->get();

        $pr = Production_record::create([
                    'so_no' => $mq->so_no,
                    'production_type' => $mq->production_type,
                    'mq_no' => $id,
                    'checker_a' => Auth::user()->id,
                    'status' => 'pending'
        ]);

        foreach ($mq_d as $mq_d) {
            Pr_detail::create([
                'pr_no' => $pr->id,
                'quantity' => $mq_d->quantity,
                'paper_type' => $mq_d->paper_type,
                'dimension' => $mq_d->dimension,
                'weight' => $mq_d->weight,
                'calliper' => $mq_d->calliper,
                'instructions' => $mq_d->instructions,
                'unit' => $mq_d->unit,
                'owner' => $mq_d->owner,
                'roll' => $mq_d->roll,
//                'warehouse' => $mq_d->warehouse,
//                'location' => $mq_d->location,
                'transaction_type' => $mq_d->transaction_type,
            ]);
        };

        $mq->approved_by = Auth::user()->id;
        $mq->status = 'approved';
        $mq->save();
        Stalk::stalkSystem("approved job order", $id);
        return Redirect::to('production/view-job-orders');
    }

    public function postApproveProductionRecord() {
//      var_dump($_POST);  
        $id = Input::get('id');
        $pr = Production_record::find($id);
        $pr_d = Pr_detail::where('pr_no', '=', $id)->get();

        foreach ($pr_d as $pr_d) {
            if ($pr_d->transaction_type == "product") {
               $p =  Product::create([
                    'paper_type' => $pr_d->paper_type,
                    'quantity' => $pr_d->quantity,
                    'unit' => $pr_d->unit,
                    'dimension' => $pr_d->dimension,
                    'weight' => $pr_d->weight,
                    'calliper' => $pr_d->calliper,
                    'price' => $pr_d->price,
                    'warehouse' => $pr_d->warehouse,
                    'location' => $pr_d->location,
                    'owner' => $pr_d->owner
                ]);
               
               $mq = Machine_queue::find($pr->mq_no);
               $sod = So_detail::find($mq->so_d);
               $sod->product = $p->id;
               $sod->save();
               
            }
            if ($pr_d->transaction_type == "balance") {
                Roll::create([
                    'paper_type' => $pr_d->paper_type,
                    'quantity' => $pr_d->quantity,
                    'unit' => $pr_d->unit,
                    'dimension' => $pr_d->dimension,
                    'weight' => $pr_d->weight,
                    'calliper' => $pr_d->calliper,
//                   'price' => $pr_d->price, 
                    'warehouse' => $pr_d->warehouse,
                    'location' => $pr_d->location,
                    'owner' => $pr_d->owner
                ]);
            }
        };

        $pr->approved_by = Auth::user()->id;
        $pr->status = 'approved';
        $pr->save();

        Sales::processSalesOrder($pr->so_no);
        Sales::processSalesInvoice($pr->so_no);
        Stalk::stalkSystem("processed sales invoice", $id);
        Stalk::stalkSystem("approved production record", $id);
        return Redirect::to('production/view-production-records');
    }

    public function getIndex() {
        Stalk::stalkSystem("view main page of production", null);
        return View::make('production.index');
    }

    public function getMemos() {
        $memos = Memo::where('department', '=', Auth::user()->department)->get();
        $departments = Department::all();
        $data = [
            'departments' => $departments,
            'memos' => $memos
        ];
        Stalk::stalkSystem("view memos", null);
        return View::make('production.memos', $data);
    }

    public static function postDeleteMemo() {
        Memo::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted memo", Input::get('id'));
        return Redirect::to('production/memos');
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
        return Redirect::to('production/memos');
    }

    public function getReminders() {
        $users = User::all();
        $reminders = Reminder::where('created_for', '=', Auth::user()->id)->get();
        $data = [
            'reminders' => $reminders,
            'users' => $users
        ];
        Stalk::stalkSystem("view reminders", null);
        return View::make('production.reminders', $data);
    }

    public static function postDeleteReminder() {
        Reminder::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted reminder", Input::get('id'));
        return Redirect::to('production/reminders');
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
        return Redirect::to('production/reminders');
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
        Stalk::stalkSystem("view rolls", null);
        return View::make('production.viewrolls', $data);
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
        Stalk::stalkSystem("view products", null);
        return View::make('production.viewproducts', $data);
    }

}