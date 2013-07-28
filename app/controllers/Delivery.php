<?php

class Delivery extends BaseController {

    public function getIndex()
    {
        return View::make('delivery.index');
    }
    
    public function getMemo()
    {
        return View::make('delivery.memo');
    }
    public function getReminder()
    {
        return View::make('delivery.reminder');
    }
    
    public function getViewDeliveryTickets() {
        $dq_p = Delivery_queue::where('status', '=', 'pending')->get();
        $dq_d = Delivery_queue::where('status', '=', 'in delivery')->get();
        $dq_a = Delivery_queue::where('status', '=', 'completed')->get();
        $data = [
            'dq_p' => $dq_p,
            'dq_a' => $dq_a,
            'dq_d' => $dq_d
        ];
        return View::make('billing.viewsalesinvoices', $data);
    }
}