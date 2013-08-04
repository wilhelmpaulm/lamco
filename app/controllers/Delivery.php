<?php

class Delivery extends BaseController {

    public function getIndex() {
        return View::make('delivery.index');
    }

    public function getMemo() {
        return View::make('delivery.memo');
    }

    public function getReminder() {
        return View::make('delivery.reminder');
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
        return View::make('delivery.viewtriptickets', $data);
    }

    public function postApplyManageTripTicket() {
        var_dump($_POST);
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
        return Redirect::to('delivery/view-trip-tickets');
    }

}