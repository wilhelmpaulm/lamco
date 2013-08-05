<?php

class Delivery extends BaseController {

    public function getIndex() {
        Stalk::stalkSystem("view main page of delivery", null);
        return View::make('delivery.index');
    }
    
    public function getViewSuppliers() {
        $suppliers = Supplier::all();
        $data = [
            'suppliers' => $suppliers
        ];
        Stalk::stalkSystem("view suppliers", null);
        return View::make('delivery.viewsuppliers', $data);
    }
    
    public function getViewClients() {
        $clients = Client::all();
        $data = [
            'clients' => $clients
        ];
        Stalk::stalkSystem("view clients", null);
        return View::make('delivery.viewclients', $data);
    }

    public function getCreateTripTicket() {
        $si = Sales_invoice::where('status', '=', 'approved')->get();
        $trucks = Truck::all();
        $drivers = User::where("department", "=", "delivery")->get();

        $data = [
            'si' => $si,
            'trucks' => $trucks,
            'drivers' => $drivers
        ];
        Stalk::stalkSystem("view create trip ticket", null);
        return View::make('delivery.createtripticket', $data);
    }

    public function postAddTripTicket() {
        $dq = Delivery_queue::create([
                    'truck' => Input::get("truck"),
                    'driver' => Input::get("driver"),
                    'status' => "pending",
                    'created_by' => Auth::user()->id
        ]);
        for ($index = 0; $index < count(Input::get("si_no")); $index++) {
            $si_no = Input::get("si_no")[$index];
            $si = Sales_invoice::find($si_no);
            $si->status = "in delivery";
            Dq_detail::create([
                'dq_no' => $dq->id,
                'so_no' => $si->so_no,
                'si_no' => $si->id,
                'destination' => Client::find($si->client)->address,
                'status' => "in delivery"
            ]);
            $si->save();
        }
        Stalk::stalkSystem("create trip ticket", $dq->id);
        return Redirect::to("delivery/view-trip-tickets");
    }

    public function postViewApproveTripTicket() {
//        var_dump($_POST);
        $id = Input::get("id");
        $dq = Delivery_queue::find($id);
        $dq_d = Dq_detail::where("dq_no", "=", $id)->get();
        $data = [
            'dq' => $dq,
            'dq_d' => $dq_d
        ];
        Stalk::stalkSystem("view approve ticket", $id);
        return View::make('delivery.viewapprovetripticket', $data);
    }

    public function postViewManageTripTicket() {
//        var_dump($_POST);
        $id = Input::get("id");
        $dq = Delivery_queue::find($id);
        $dq_d = Dq_detail::where("dq_no", "=", $id)->get();
        $data = [
            'dq' => $dq,
            'dq_d' => $dq_d
        ];
        Stalk::stalkSystem("view manage trip ticket", $id);
        return View::make('delivery.viewmanagetripticket', $data);
    }

    public function postApplyApproveTripTicket() {
//        var_dump($_POST);
        $id = Input::get("id");
        $dq = Delivery_queue::find($id);
//        $dq_d = Delivery_queue::where("dq_no", "=", $id)->get();
//        foreach ($dq_d as $dqd) {
//            
//        }
        $dq->status = "in delivery";
        $dq->save();
        Stalk::stalkSystem("approve ticket", $id);
        return Redirect::to('delivery/view-trip-tickets');
    }

    public function getViewTripTickets() {
        $dq_p = Delivery_queue::where('status', '=', 'pending')->get();
//        $dq_a = Delivery_queue::where('status', '=', 'approved')->get();
        $dq_d = Delivery_queue::where('status', '=', 'in delivery')->get();
        $dq_c = Delivery_queue::where('status', '=', 'completed')->get();
        $data = [
            'dq_p' => $dq_p,
//            'dq_a' => $dq_a,
            'dq_c' => $dq_c,
            'dq_d' => $dq_d
        ];
        Stalk::stalkSystem("view trip tickets", null);
        return View::make('delivery.viewtriptickets', $data);
    }

    public function postApplyManageTripTicket() {
//        var_dump($_POST);
        $id = Input::get("id");
        $dq = Delivery_queue::find($id);

        for ($index = 0; $index < count(Input::get("dqd_id")); $index++) {
            $dq_d = Dq_detail::find(Input::get("dqd_id")[$index]);
            $si = Sales_invoice::find($dq_d->si_no);
            $so = Sales_order::find($dq_d->so_no);

            if (Input::get("status")[$index] == 'completed') {
                $si_d = Si_detail::where("si_no", "=", $si->id)->get();
                foreach ($si_d as $sid) {
                    if ($sid->transaction_type == "ordinary" || $sid->transaction_type == "special") {
                        Product::find($sid->product)->delete();
                    }
                }
                $si->status = "completed";
                $si->save();
            }
            if (Input::get("status")[$index] == 'rejected') {
                $si_d = Si_detail::where("si_no", "=", $si->id)->get();
                foreach ($si_d as $sid) {
                    if ($sid->transaction_type == "ordinary" || $sid->transaction_type == "special") {
                        $product = Product::find($sid->product);
                        $product->owner = "lamco";
                        $product->save();
                    }
                }
                $so->status = "rejected";
                $si->status = "rejected";
                $so->save();
                $si->save();
            }
            if (Input::get("status")[$index] == 'reschedule') {
                $si->status = "approved";
                $si->save();
            }
        }

        $dq->status = "completed";
        $dq->save();
        Stalk::stalkSystem("approve manage trip ticket", $id);
        return Redirect::to('delivery/view-trip-tickets');
    }

    public function getMemos() {
        $memos = Memo::where('department', '=', Auth::user()->department)->get();
        $departments = Department::all();
        $data = [
            'departments' => $departments,
            'memos' => $memos
        ];
        Stalk::stalkSystem("view memos", null);
        return View::make('delivery.memos', $data);
    }
    
    public static function postDeleteMemo() {
        Memo::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted memo", Input::get('id'));
        return Redirect::to('delivery/memos');
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
        return Redirect::to('delivery/memos');
    }

    public function getReminders() {
        $users = User::all();
        $reminders = Reminder::where('created_for', '=', Auth::user()->id)->get();
        $data = [
            'reminders' => $reminders,
            'users' => $users
        ];
        Stalk::stalkSystem("view reminders", null);
        return View::make('delivery.reminders', $data);
    }
    
    public static function postDeleteReminder() {
        Reminder::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted reminder", Input::get('id'));
        return Redirect::to('delivery/reminders');
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
        return Redirect::to('delivery/reminders');
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
        return View::make('delivery.viewrolls', $data);
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
        return View::make('delivery.viewproducts', $data);
    }
    
}