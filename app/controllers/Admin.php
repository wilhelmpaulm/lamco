<?php

class Admin extends BaseController {

    

    public function getIndex() {
        return View::make('admin.index');
    }

    public function getMemo() {
        return View::make('admin.memo');
    }

    public function getReminders() {
        return View::make('admin.reminders');
    }
    
    public static function getCreateUser(){
        
        return View::make('admin.createuser');
    }
    public static function postAddUser(){
        
        
        
        return Redirect::to('admin/view-users');
    }

}