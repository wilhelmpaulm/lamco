<?php

class Sales_invoice extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'approved_by' => 'required',
		'status' => 'required'
	);
}