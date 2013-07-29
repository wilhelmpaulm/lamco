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
            $si->save();

            Dq_detail::create([
                'dq_no' => $dq->id,
                'si_no' => $si_no,
                'destination' => Client::find($si->client)->adrress,
                'status' => "in delivery"
            ]);
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

    public function postApplyApproveTripTicket() {
        var_dump($_POST);
//        $id = Input::get("id");
//        $dq = Delivery_queue::find($id);
//        $dq_d = Delivery_queue::where("dq_no", "=", $id)->get();
//
//        foreach ($dq_d as $dqd) {
//            
//        }
//
//        $dq->status = "approved";
//        $dq->save();
//
//        return Redirect::to('delivery/view-trip-tickets');
    }

    public function getViewTripTickets() {
        $dq_p = Delivery_queue::where('status', '=', 'pending')->get();
        $dq_a = Delivery_queue::where('status', '=', 'approved')->get();
        $dq_d = Delivery_queue::where('status', '=', 'in delivery')->get();
        $dq_c = Delivery_queue::where('status', '=', 'completed')->get();
        $data = [
            'dq_p' => $dq_p,
            'dq_a' => $dq_a,
            'dq_c' => $dq_c,
            'dq_d' => $dq_d
        ];
        return View::make('delivery.viewtriptickets', $data);
    }

}