<?php

class Management extends BaseController {

    public static function processSalesOrder($id) {
        $mqs = Machine_queue::where("so_no", "=", $id)->where("status", "!=", "approved")->get();
        if ($mqs->count() == 0) {
            $so = Sales_order::find($id);
            $so->status = 'completed';
            $so->save();
        }
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
        Management::processSalesInvoice($si->id);
    }

    public function postValidate() {
        var_dump($_POST);
    }

    public function getIndex() {
        Stalk::stalkSystem("view main page of admin", null);
        return View::make('management.index');
    }

    public function getMemos() {
        $memos = Memo::where('department', '=', Auth::user()->department)->get();
        $departments = Department::all();
        $data = [
            'departments' => $departments,
            'memos' => $memos
        ];
        Stalk::stalkSystem("view memos", null);
        return View::make('management.memos', $data);
    }

    public static function postDeleteMemo() {
        Memo::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted memo", Input::get('id'));
        return Redirect::to('management/memos');
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
        return Redirect::to('management/memos');
    }

    public function getReminders() {
        $users = User::all();
        $reminders = Reminder::where('created_for', '=', Auth::user()->id)->get();
        $data = [
            'reminders' => $reminders,
            'users' => $users
        ];
        Stalk::stalkSystem("view reminders", null);
        return View::make('management.reminders', $data);
    }

    public static function postDeleteReminder() {
        Reminder::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted reminder", Input::get('id'));
        return Redirect::to('management/reminders');
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
        return Redirect::to('management/reminders');
    }

    public function getViewClients() {
        $clients = Client::all();
        $data = [
            'clients' => $clients
        ];
        Stalk::stalkSystem("viewed clients", null);
        return View::make('management.viewclients', $data);
    }

    public function getViewAddClient() {
        Stalk::stalkSystem("view add client", null);
        return View::make('management.addclient');
    }

    public function postAddClient() {
        $c = Client::create([
                    'name' => Input::get('name'),
                    'contacts' => Input::get('contacts'),
                    'address' => Input::get('address')
        ]);
        Stalk::stalkSystem("created client", $c->id);
        return Redirect::to('management/view-clients');
    }

    public function postEditClient() {
        $id = Input::get('id');
        $client = Client::find($id);
        $data = [
            'client' => $client
        ];
        Stalk::stalkSystem("view edit client", $id);
        return View::make('management.editclient', $data);
    }

    public function postApplyEditClient() {
        $id = Input::get('id');
        $client = Client::find($id);
        $client->name = Input::get('name');
        $client->contacts = Input::get('contacts');
        $client->address = Input::get('address');
        $client->save();
        Stalk::stalkSystem("edited client", $id);
        return Redirect::to('management/view-clients');
    }

    public function postDeleteClient() {
        $c = Client::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted client", $c->id);
        return Redirect::to('management/view-clients');
    }

    public function getViewSuppliers() {
        $suppliers = Supplier::all();
        $data = [
            'suppliers' => $suppliers
        ];
        Stalk::stalkSystem("viewed suppliers", null);
        return View::make('management.viewsuppliers', $data);
    }

    public function getViewAddSupplier() {
        Stalk::stalkSystem("view add supplier", null);
        return View::make('management.addsupplier');
    }

    public function postAddSupplier() {
        $s = Supplier::create([
                    'name' => Input::get('name'),
                    'contacts' => Input::get('contacts'),
                    'address' => Input::get('address')
        ]);
        Stalk::stalkSystem("created new supplier", $s->id);
        return Redirect::to('management/view-suppliers');
    }

    public function postEditSupplier() {
        $id = Input::get('id');
        $supplier = Supplier::find($id);
        $data = [
            'supplier' => $supplier
        ];
        Stalk::stalkSystem("view edit a supplier", $id);
        return View::make('management.editsupplier', $data);
    }

    public function postApplyEditSupplier() {
        $id = Input::get('id');
        $supplier = Supplier::find($id);
        $supplier->name = Input::get('name');
        $supplier->contacts = Input::get('contacts');
        $supplier->address = Input::get('address');
        $supplier->save();
        Stalk::stalkSystem("edited supplier", $id);
        return Redirect::to('management/view-suppliers');
    }

    public function postDeleteSupplier() {
        Supplier::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted supplier", Input::get('id'));
        return Redirect::to('management/view-suppliers');
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
        return View::make('management.viewrolls', $data);
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
        return View::make('management.viewproducts', $data);
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
        return View::make('management.viewsalesorder', $data);
    }

    public function postApproveSalesOrder() {
        $id = Input::get('id');
        $so = Sales_order::find($id);


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
        Management::createSalesInvoice($id);
        Management::processSalesInvoice($id);
        $so->status = "approved";
        $so->approved_by = Auth::user()->id;
        $so->save();
        Stalk::stalkSystem("created sales invoice", $id);
        Stalk::stalkSystem("created sales order", $id);
        return Redirect::to('management/view-sales-orders');
    }

    public function postRejectSalesOrder() {
        $id = Input::get('id');
        $so = Sales_order::find($id);
        $so->status = "rejected";
        $so->save();
//        $so_d = So_detail::where('so_no', '=', $id)->get();
        Stalk::stalkSystem("rejected sales order", $id);
        return Redirect::to('management/view-sales-orders');
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
        return View::make('management.viewsalesorders', $data);
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
        Stalk::stalkSystem("approved purchase order", $id);
        return Redirect::to('management/view-purchase-orders');
    }

    public function getViewPurchaseOrders() {
        $pos_p = Purchase_order::where('status', '=', 'pending')->get();
        $pos_a = Purchase_order::where('status', '=', 'approved')->get();
        $pos_f = Purchase_order::where('status', '=', 'finished')->get();
        $data = [
            'pos_p' => $pos_p,
            'pos_a' => $pos_a,
            'pos_f' => $pos_f
        ];
        Stalk::stalkSystem("viewed purchase orders", null);
        return View::make('management.viewpurchaseorders', $data);
    }

    public function postViewPurchaseOrder() {
        $id = Input::get('id');
        $po = Purchase_order::find($id);
        $po_d = Po_detail::where('po_no', '=', "$id")->get();
        $data = [
            'po' => $po,
            'po_d' => $po_d,
        ];
        Stalk::stalkSystem("viewed purchase order", $id);
        return View::make('management.viewpurchaseorder', $data);
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
        return View::make('management.viewsalesorder', $data);
    }

}

