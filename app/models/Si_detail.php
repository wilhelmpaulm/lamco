<?php

class Si_detail extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'roll' => 'required',
		'calliper' => 'required',
		'instructions' => 'required',
		'price' => 'required'
	);
}