<?php

class Purchase_order extends Eloquent {
    protected $guarded = array();
    
    public function po_details()
    {
        return $this->hasMany('Po_detail', 'po_no');
    }

    public static $rules = array();
}