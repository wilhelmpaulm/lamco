<?php

//use Sales;

class Sales extends BaseController {

//    
//    The body of this shit
//    
//    createsalesorder - done
//    addsalesorder - done
//    editsalesorder - done
//    applyeditsalesorder - done
//    
    public function getNotif() {
//        return Roll::where('quantity', '<', '50')->where('owner', '=', 'lamco')->get()->toJson();

        $data = [
            'rolls' => Roll::where('quantity', '<', '50')->where('owner', '=', 'lamco')->get()->toJson(),
            'products' => Product::where('quantity', '<', '50')->where('owner', '=', 'lamco')->get()->toJson(),
            'reminders' => Reminder::where("created_for", "=", Auth::user()->id)->get()->toJson(),
            'memos' => Memo::where("department", "=", Auth::user()->department)->get()->toJson()
        ];
        return json_encode($data);
    }

    public function postViewDailySalesReport() {
        $day = Input::get('day');
        $month = Input::get('month');
        $year = Input::get('year');
        $po = DB::select("select * from purchase_orders where month(created_at) = ? and year(created_at) = ? and status = 'approved'", [$month, $year]);
        $po_d = DB::select("select * from po_details where month(created_at) = ? and year(created_at) = ?", [$month, $year]);
        $data = [
            'pos' => $po,
            'po_d' => $po_d,
            'day' => $day,
            'month' => $month,
            'year' => $year
        ];
        return View::make("sales.daily_sales_report", $data);
    }

    public function postViewMonthlySalesReport() {
        $month = Input::get('month');
        $year = Input::get('year');
        $data = [
            'month' => $month,
            'year' => $year
        ];
        return View::make("sales.monthly_sales_report", $data);
    }

    public function postViewAnnualSalesReport() {
        $year = Input::get('year');
        $data = [
            'year' => $year
        ];
        return View::make("sales.annual_sales_report", $data);
    }

    public static function postValidate() {
        var_dump($_POST);
    }

    public function getViewClients() {
        $clients = Client::all();
        $data = [
            'clients' => $clients
        ];
        Stalk::stalkSystem("viewed clients", null);
        return View::make('sales.viewclients', $data);
    }

    public function getViewAddClient() {
        Stalk::stalkSystem("view add client", null);
        return View::make('sales.addclient');
    }

    public function postAddClient() {
        $c = Client::create([
                    'name' => Input::get('name'),
                    'contacts' => Input::get('contacts'),
                    'address' => Input::get('address')
        ]);
        Stalk::stalkSystem("created client", $c->id);
        return Redirect::to('sales/view-clients');
    }

    public function postEditClient() {
        $id = Input::get('id');
        $client = Client::find($id);
        $data = [
            'client' => $client
        ];
        Stalk::stalkSystem("view edit client", $id);
        return View::make('sales.editclient', $data);
    }

    public function postApplyEditClient() {
        $id = Input::get('id');
        $client = Client::find($id);
        $client->name = Input::get('name');
        $client->contacts = Input::get('contacts');
        $client->address = Input::get('address');
        $client->save();
        Stalk::stalkSystem("edited client", $id);
        return Redirect::to('sales/view-clients');
    }

    public function postDeleteClient() {
        $c = Client::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted client", $c->id);
        return Redirect::to('sales/view-clients');
    }

    public static function processSalesInvoice($id) {
        $si = Sales_invoice::where("so_no", "=", $id)->first();
        if (Sales_order::find($id)->status == "completed") {
            $si->status = "pending";
            $si->save();
        } else {
            $si->status = "on hold";
            $si->save();
        }
    }

    public static function createSalesInvoice($id) {
        var_dump($_POST);
        
        $so = Sales_order::find($id);
        $so_d = So_detail::where("so_no", "=", $id)->get();
        $si = Sales_invoice::create([
                    'so_no' => $so->id,
                    'terms' => $so->terms,
                    'client' => $so->client,
                    'created_by' => Auth::user()->id,
                    'status' => 'on hold'
        ]);

        foreach ($so_d as $sd) {
           
            Si_detail::create([
                'si_no' => $si->id,
                'quantity' => $sd->quantity,
                'unit' => $sd->unit,
                'paper_type' => $sd->paper_type,
                'dimension' => $sd->dimension,
                'weight' => $sd->weight,
                'calliper' => $sd->calliper,
                'instructions' => $sd->instructions,
                'total' => $sd->price * $sd->quantity,
                'price' => $sd->price,
//                'discount' => $sd->discount,
                'product' => $sd->product,
                'roll' => $sd->roll,
                'transaction_type' => $sd->transaction_type
            ]);
        }
        $si_d = Si_detail::where("si_no", "=", $si->id)->get();

        $subtotal = 0;
        foreach ($si_d as $sid) {
            $subtotal += $sid->price * $sid->quantity;
        }
        $vat = ($subtotal / 100) * 12;
        $total = $vat + $subtotal;

        $si->subtotal = $subtotal;
        $si->vat = $vat;
        $si->total = $total;
        $si->save();
        Sales::processSalesInvoice($si->id);
    }

    public static function processSalesOrder($id) {
        $mqs = Machine_queue::where("so_no", "=", $id)->where("status", "!=", "approved")->get();
        if ($mqs->count() == 0) {
            $so = Sales_order::find($id);
            $so->status = 'completed';
            $so->save();
        }
    }

    public function getCreateSalesOrder2() {
        $clients = Client::all();
        $terms = Term::all();
        $paper_types = Paper_type::all();
        $dimensions = Dimension::all();
        $weights = Weight::all();
        $callipers = Calliper::all();
        $products = Product::where("owner","=","lamco")->get();
        $production_types = Production_type::all();
        $rolls = Roll::where("owner","=","lamco")->get();
        $units = Unit::all();
        $data = [
            'clients' => $clients,
            'terms' => $terms,
            'paper_types' => $paper_types,
            'dimensions' => $dimensions,
            'weights' => $weights,
            'callipers' => $callipers,
            'products' => $products,
            'production_types' => $production_types,
            'units' => $units,
            'rolls' => $rolls
        ];
        return View::make('sales.createsalesorder', $data);
    }

    public function getCreateSalesOrder() {
        $clients = Client::all();
        $terms = Term::all();
        $paper_types = Paper_type::all();
        $dimensions = Dimension::all();
        $weights = Weight::all();
        $callipers = Calliper::all();
        $products = Product::all();
        $production_types = Production_type::all();
        $rolls = Roll::all();
        $units = Unit::all();
        $data = [
            'clients' => $clients,
            'terms' => $terms,
            'paper_types' => $paper_types,
            'dimensions' => $dimensions,
            'weights' => $weights,
            'callipers' => $callipers,
            'products' => $products,
            'production_types' => $production_types,
            'units' => $units,
            'rolls' => $rolls
        ];
        Stalk::stalkSystem("view add sales order", null);
        return View::make('sales.createsalesorder2', $data);
    }

    public function getViewSalesOrders() {
        $so_p = Sales_order::where('status', '=', 'pending')->get();
        $so_a = Sales_order::where('status', '=', 'approved')->get();
        $so_f = Sales_order::where('status', '=', 'completed')->get();
        $so_r = Sales_order::where('status', '=', 'rejected')->get();

        $data = [
            'so_p' => $so_p,
            'so_a' => $so_a,
            'so_r' => $so_r,
            'so_f' => $so_f
        ];
        Stalk::stalkSystem("view sales orders", null);
        return View::make('sales.viewsalesorders', $data);
    }

    public function postAddSalesOrder() {

        $so = Sales_order::create([
                    'client' => Input::get('client'),
                    'terms' => Input::get('terms'),
                    'created_by' => Auth::user()->id,
                    'status' => 'pending'
        ]);

        for ($index = 0; $index < count(Input::get('transaction_type')); $index++) {
            So_detail::create([
                'so_no' => $so->id,
                'unit' => Input::get('unit')[$index],
                'transaction_type' => Input::get('transaction_type')[$index],
                'quantity' => Input::get('quantity')[$index],
                'paper_type' => Input::get('paper_type')[$index],
                'dimension' => Input::get('dimension')[$index],
                'weight' => Input::get('weight')[$index],
                'calliper' => Input::get('calliper')[$index],
                'total' => Input::get('price')[$index] * Input::get('quantity')[$index],
                'price' => Input::get('price')[$index],
                'product' => Input::get('product')[$index],
                'production_type' => Input::get('production_type')[$index],
                'roll' => Input::get('roll')[$index]
            ]);
        }
        Stalk::stalkSystem("created sales order", $so->id);
        return Redirect::to('sales/view-sales-orders');
    }

    public function postApplyEditSalesOrder() {
//        var_dump($_POST);
        $id = Input::get('id');

        $so = Sales_order::find("$id");
        $so->client = Input::get('client');
        $so->terms = Input::get('terms');
        $so->status = "pending";
        $so->created_by = Auth::user()->id;
        $so->save();

        $so_d = So_detail::where('so_no', '=', $id)->delete();
        for ($index = 0; $index < count(Input::get('transaction_type')); $index++) {
            So_detail::create([
                'so_no' => $so->id,
                'unit' => Input::get('unit')[$index],
                'transaction_type' => Input::get('transaction_type')[$index],
                'quantity' => Input::get('quantity')[$index],
                'paper_type' => Input::get('paper_type')[$index],
                'dimension' => Input::get('dimension')[$index],
                'weight' => Input::get('weight')[$index],
                'calliper' => Input::get('calliper')[$index],
                'total' => Input::get('price')[$index] * Input::get('quantity')[$index],
                'price' => Input::get('price')[$index],
                'product' => Input::get('product')[$index],
                'production_type' => Input::get('production_type')[$index],
                'roll' => Input::get('roll')[$index]
            ]);
        }
        Stalk::stalkSystem("edited sales order", $so->id);
        return Redirect::to('sales/view-sales-orders');
    }

    public function postEditSalesOrder() {
        $id = Input::get('id');
        $clients = Client::all();
        $terms = Term::all();
        $paper_types = Paper_type::all();
        $dimensions = Dimension::all();
        $weights = Weight::all();
        $callipers = Calliper::all();
        $products = Product::all();
        $production_types = Production_type::all();
        $rolls = Roll::all();
        $units = Unit::all();
        $so = Sales_order::find($id);
        $so_d = So_detail::where('so_no', '=', $id)->get();

        $data = [
            'units' => $units,
            'clients' => $clients,
            'terms' => $terms,
            'paper_types' => $paper_types,
            'dimensions' => $dimensions,
            'weights' => $weights,
            'callipers' => $callipers,
            'products' => $products,
            'production_types' => $production_types,
            'rolls' => $rolls,
            'so' => $so,
            'so_d' => $so_d
        ];
        Stalk::stalkSystem("view edit sales order", $id);
        return View::make('sales.editsalesorder2', $data);
    }

    public function postViewSalesOrder() {
        $id = Input::get('id');
        $clients = Client::all();
        $terms = Term::all();
        $paper_types = Paper_type::all();
        $dimensions = Dimension::all();
        $weights = Weight::all();
        $callipers = Calliper::all();
        $products = Product::all();
        $production_types = Production_type::all();
        $rolls = Roll::all();
        $units = Unit::all();
        $so = Sales_order::find($id);
        $so_d = So_detail::where('so_no', '=', $id)->get();

        $data = [
            'units' => $units,
            'clients' => $clients,
            'terms' => $terms,
            'paper_types' => $paper_types,
            'dimensions' => $dimensions,
            'weights' => $weights,
            'callipers' => $callipers,
            'products' => $products,
            'production_types' => $production_types,
            'rolls' => $rolls,
            'so' => $so,
            'so_d' => $so_d
        ];
        Stalk::stalkSystem("view sales order", $id);
        return View::make('sales.sales_order_form', $data);
//        return View::make('sales.viewsalesorder2', $data);
    }

    public function postViewApproveSalesOrder() {
        $id = Input::get('id');
        $clients = Client::all();
        $terms = Term::all();
        $paper_types = Paper_type::all();
        $dimensions = Dimension::all();
        $weights = Weight::all();
        $callipers = Calliper::all();
        $products = Product::all();
        $production_types = Production_type::all();
        $rolls = Roll::all();
        $units = Unit::all();
        $so = Sales_order::find($id);
        $so_d = So_detail::where('so_no', '=', $id)->get();

        $data = [
            'units' => $units,
            'clients' => $clients,
            'terms' => $terms,
            'paper_types' => $paper_types,
            'dimensions' => $dimensions,
            'weights' => $weights,
            'callipers' => $callipers,
            'products' => $products,
            'production_types' => $production_types,
            'rolls' => $rolls,
            'so' => $so,
            'so_d' => $so_d
        ];
        Stalk::stalkSystem("view approve sales order", $id);
        return View::make('sales.viewsalesorder', $data);
    }

    public function postApproveSalesOrder() {
        $id = Input::get('id');
        $so = Sales_order::find($id);
        $so->status = "approved";
        $so->approved_by = Auth::user()->id;
        $so->save();

        $so_ds = So_detail::where('so_no', '=', $id)->get();
        foreach ($so_ds as $so_d) {
            if ($so_d->transaction_type == 'reserve') {
                Roll::where('id', '=', $so_d->roll)->decrement('quantity', $so_d->quantity);
                $r = Roll::find($so_d->roll);
                $roll = Roll::create([
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
                $so_d->roll = $roll->id;
                $so_d->save();
            } elseif ($so_d->transaction_type == 'ordinary') {
                Product::where('id', '=', $so_d->product)->decrement('quantity', $so_d->quantity);
                $p = Product::find($so_d->product);
                $product = Product::create([
                            'quantity' => $so_d->quantity,
                            'paper_type' => $p->paper_type,
                            'weight' => $p->weight,
                            'calliper' => $p->calliper,
                            'dimension' => $p->dimension,
                            'warehouse' => $p->warehouse,
                            'unit' => $p->unit,
                            'price' => $so_d->price,
                            'location' => $p->location,
                            'owner' => $so->client
                ]);
                $so_d->product = $product->id;
                $so_d->save();
            } elseif ($so_d->transaction_type == 'special') {
                $mq = Machine_queue::create([
                            'so_no' => $so->id,
                            'status' => 'pending',
                            'production_type' => $so_d->production_type,
                            'created_by' => Auth::user()->id
                ]);
                Mq_detail::create([
                    'mq_no' => $mq->id,
                    'quantity' => $so_d->quantity,
                    'unit' => $so_d->unit,
//                    'roll' => $so_d->roll,
                    'unit' => $so_d->unit,
                    'dimension' => $so_d->dimension,
                    'paper_type' => $so_d->paper_type,
                    'weight' => $so_d->weight,
                    'calliper' => $so_d->calliper,
                    'transaction_type' => 'product'
                ]);
            }
        }
        Sales::processSalesOrder($id);
        Sales::createSalesInvoice($id);

        Stalk::stalkSystem("created sales invoice", $id);
        Stalk::stalkSystem("created sales order", $id);
        return Redirect::to('sales/view-sales-orders');
    }

    public function postDeleteSalesOrder() {
        $id = Input::get('id');
        Sales_order::find($id)->delete();
        So_detail::where('so_no', '=', $id)->delete();
        Stalk::stalkSystem("deleted sales order", $id);
        return Redirect::to('sales/view-sales-orders');
    }

    public function postRejectSalesOrder() {
        $id = Input::get('id');
        $so = Sales_order::find($id);
        $so->status = "rejected";
        $so->save();
//        $so_d = So_detail::where('so_no', '=', $id)->get();
        Stalk::stalkSystem("rejected sales order", $id);
        return Redirect::to('sales/view-sales-orders');
    }

    public function getIndex() {
        Stalk::stalkSystem("view main page of sales", null);
        return View::make('sales.index');
    }

    public function getMemos() {
        $memos = Memo::where('department', '=', Auth::user()->department)->get();
        $departments = Department::all();
        $data = [
            'departments' => $departments,
            'memos' => $memos
        ];
        Stalk::stalkSystem("view memos", null);
        return View::make('sales.memos', $data);
    }

    public static function postDeleteMemo() {
        Memo::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted memo", Input::get('id'));
        return Redirect::to('sales/memos');
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
        return Redirect::to('sales/memos');
    }

    public function getReminders() {
        $users = User::all();
        $reminders = Reminder::where('created_for', '=', Auth::user()->id)->get();
        $data = [
            'reminders' => $reminders,
            'users' => $users
        ];
        Stalk::stalkSystem("view reminders", null);
        return View::make('sales.reminders', $data);
    }

    public static function postDeleteReminder() {
        Reminder::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted reminder", Input::get('id'));
        return Redirect::to('sales/reminders');
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
        return Redirect::to('sales/reminders');
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
        return View::make('sales.viewrolls', $data);
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
        return View::make('sales.viewproducts', $data);
    }

}