<?php

class Stalk extends BaseController {

    public function postValidate() {
        var_dump($_POST);
    }
    
    public static function stalkSystem($action, $reference){
        System_log::create([
            'user' => Auth::user()->id,
            'department' => Auth::user()->department,
            'action' => $action,
            'reference' => $reference
        ]);
    }
    
    public static function stalkProduction($action, $reference, $client){
        System_log::create([
            'user' => Auth::user()->id,
            'department' => Auth::user()->department,
            'action' => $action,
            'reference' => $reference,
            'client' => $client,
        ]);
    }

}


