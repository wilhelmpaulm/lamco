<?php

class Production extends BaseController {
    public function getViewMachineQueues(){
        $mq_p = Machine_queue::where('status', '=', 'pending')->get();
        $mq_a = Machine_queue::where('status','=','approved')->get();
        $mq_f = Machine_queue::where('status', '=', 'finished')->get();
        $data = [
            'mq_p' => $mq_p,
            'mq_a' => $mq_a,
            'mq_f' => $mq_f
        ];

        return View::make('production.viewmachinequeues',$data);
    }

    public function postEditMachineQueue(){
        $id = Input::get('id');
        $mq = Machine_queue::find($id);
        $mq_d = Mq_detail::where('mq_no','=',$id)->get();
        $so = Sales_order::find($mq->so_no);
        $rolls  = Roll::where('owner','=',$so->client)->get();
        $machines = Machine::all();
        
        $data = [
          'rolls' => $rolls,
            'machines' => $machines,
            'mq' => $mq,
            'mq_d' => $mq_d
        ];
        
        
        
        return View::make('production.editmachinequeues',$data);
    }
    public function postApplyEditMachineQueue(){
        $id = Input::get('id');
        $mq = Machine_queue::find($id);
        $mq->machine = Input::get('machine');
        $mq->production_type = Input::get('production_type');
        $mq->save();
        
        Mq_detail::where('mq_no','=',$id)->delete();
        for ($index = 0; $index < count(Input::get('transaction_type')); $index++) {
            Mq_detail::create([
               'mq_no' => $id,
                'quantity' => Input::get('quantity'),
                'roll' => Input::get('roll')
            ]);
        }
        
        return View::make('production.editmachinequeues',$data);
    }
    public function postApproveMachineQueue(){
        $id = Input::get('id');
        $mq = Machine_queue::find($id);
        $mq->status = 'approved';
        $mq->save();
        $mq_d = Mq_detail::where('mq_no','=',$id)->get();
        $pr = Production_record::create([
            'so_no' => $mq->so_no,
            'prduction_type' => $mq
        ]);
        
        foreach($mq_d as $mq_d){
            
        }
        
        return View::make('production.editmachinequeues',$data);
    }
    
    public function getIndex()
    {
        return View::make('production.index');
    }
    public function getMemo()
    {
        return View::make('production.memo');
    }
    public function getReminder()
    {
        return View::make('production.reminder');
    }
     public function getViewRolls() {
        $lamco_rolls = Roll::where('owner', '=', 'lamco')->get();
        $low_rolls = Roll::where('quantity','<',50)->get();
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
        $low_products = Product::where('quantity','<',50)->get();
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