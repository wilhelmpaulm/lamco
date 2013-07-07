<?php

class Student extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'name' => 'required',
		'age' => 'required'
	);
}