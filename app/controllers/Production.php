<?php

class Production extends BaseController {

    public function getViewJobOrders() {
        $mq_p = Machine_queue::where('status', '=', 'pending')->get();
        $mq_a = Machine_queue::where('status', '=', 'approved')->get();
        $mq_i = Machine_queue::where('status', '=', 'in production')->get();
        $data = [
            'mq_p' => $mq_p,
            'mq_a' => $mq_a,
            'mq_i' => $mq_i
        ];

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

        return View::make('production.viewproductionrecord', $data);
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

        return View::make('production.approveproductionrecord', $data);
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

        return Redirect::to('production/view-job-orders');
    }

    public function postApproveProductionRecord() {
//      var_dump($_POST);  
        $id = Input::get('id');
        $pr = Production_record::find($id);
        $pr_d = Pr_detail::where('pr_no', '=', $id)->get();



        foreach ($pr_d as $pr_d) {
            if ($pr_d->transaction_type == "product") {
                Product::create([
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

        return Redirect::to('production/view-production-records');
    }

    public function getIndex() {
        return View::make('production.index');
    }

    public function getMemos() {
        $memos = Memo::where('department', '=', Auth::user()->department)->get();
        $departments = Department::all();
        $data = [
            'departments' => $departments,
            'memos' => $memos
        ];
        return View::make('production.memos', $data);
    }
    
    public static function postDeleteMemo() {
        Memo::find(Input::get('id'))->delete();
        return Redirect::to('production/memos');
    }

    public static function postAddMemo() {
        Memo::create([
            "created_by" => Auth::user()->id,
            "deadline" => Input::get("deadline"),
            "department" => Input::get("department"),
            "importance" => Input::get("importance"),
            "memo" => Input::get("memo")
        ]);
        return Redirect::to('production/memos');
    }

    public function getReminders() {
        $users = User::all();
        $reminders = Reminder::where('created_for', '=', Auth::user()->id)->get();
        $data = [
            'reminders' => $reminders,
            'users' => $users
        ];
        return View::make('production.reminders', $data);
    }
    
    public static function postDeleteReminder() {
        Reminder::find(Input::get('id'))->delete();
        return Redirect::to('production/reminders');
    }

    public static function postAddReminder() {
        Reminder::create([
            "created_by" => Auth::user()->id,
            "deadline" => Input::get("deadline"),
            "created_for" => Input::get("created_for"),
            "importance" => Input::get("importance"),
            "reminder" => Input::get("reminder")
        ]);
        return Redirect::to('production/reminders');
    }

    public function getViewRolls() {
        $lamco_rolls = Roll::where('owner', '=', 'lamco')->get();
        $low_rolls = Roll::where('quantity', '<', 50)->get();
        $client_rolls = Roll::where('owner', '!=', 'lamco')->get();
        $data = [
            'lamco_rolls' => $lamco_rolls,
            'low_rolls' => $low_rolls,
            'client_rolls' => $client_rolls
        ];

//        print_r($low_rolls);

        return View::make('production.viewrolls', $data);
    }

    public function getViewProducts() {
        $lamco_products = Product::where('owner', '=', 'lamco')->get();
        $low_products = Product::where('quantity', '<', 50)->get();
        $client_products = Product::where('owner', '!=', 'lamco')->get();
        $data = [
            'lamco_products' => $lamco_products,
            'low_products' => $low_products,
            'client_products' => $client_products
        ];

//        print_r($low_rolls);

        return View::make('production.viewproducts', $data);
    }

}