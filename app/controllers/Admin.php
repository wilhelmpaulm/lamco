<?php

class Admin extends BaseController {

    public function postValidate() {
        var_dump($_POST);
    }

    public function getIndex() {
        return View::make('admin.index');
    }

    public function getMemos() {
        $memos = Memo::where('department', '=', Auth::user()->department)->get();
        $departments = Department::all();
        $data = [
            'departments' => $departments,
            'memos' => $memos
        ];
        return View::make('admin.memos', $data);
    }
    
    public static function postDeleteMemo() {
        Memo::find(Input::get('id'))->delete();
        return Redirect::to('admin/memos');
    }

    public static function postAddMemo() {
        Memo::create([
            "created_by" => Auth::user()->id,
            "deadline" => Input::get("deadline"),
            "department" => Input::get("department"),
            "importance" => Input::get("importance"),
            "memo" => Input::get("memo")
        ]);
        return Redirect::to('admin/memos');
    }

    public function getReminders() {
        $users = User::all();
        $reminders = Reminder::where('created_for', '=', Auth::user()->id)->get();
        $data = [
            'reminders' => $reminders,
            'users' => $users
        ];
        return View::make('admin.reminders', $data);
    }
    
    public static function postDeleteReminder() {
        Reminder::find(Input::get('id'))->delete();
        return Redirect::to('admin/reminders');
    }

    public static function postAddReminder() {
        Reminder::create([
            "created_by" => Auth::user()->id,
            "deadline" => Input::get("deadline"),
            "created_for" => Input::get("created_for"),
            "importance" => Input::get("importance"),
            "reminder" => Input::get("reminder")
        ]);
        return Redirect::to('admin/reminders');
    }
    
    
    public static function getViewUsers() {
        $users = User::all();
        $data = [
            'users' => $users
        ];
        return View::make('admin.viewusers', $data);
    }

    public static function getCreateUser() {
        return View::make('admin.createuser');
    }

    public static function postAddUser() {
        User::create([
            "last_name" => Input::get("last_name"),
            "first_name" => Input::get("first_name"),
            "password" => Hash::make(Input::get("password")),
            "department" => Input::get("department"),
            "job_title" => Input::get("job_title")
        ]);
        return Redirect::to('admin/view-users');
    }

    public static function postApplyEditUser() {
        $user = User::find(Input::get("id"));
        $user->last_name = Input::get("last_name");
        $user->first_name = Input::get("first_name");
        $user->password = Hash::make(Input::get("password"));
        $user->department = Input::get("department");
        $user->job_title = Input::get("job_title");
        $user->save();
        return Redirect::to('admin/view-users');
    }

    public static function postDeleteUser() {
        User::find(Input::get('id'))->delete();
        return Redirect::to('admin/view-users');
    }

    public static function postEditUser() {
        $user = User::find(Input::get('id'));
        $job_titles = Job_title::all();
        $departments = Department::all();
        $data = [
            'user' => $user,
            'job_titles' => $job_titles,
            'departments' => $departments
        ];
        return View::make('admin.edituser', $data);
    }
    
    public static function getViewSystemLogs() {
        $sys_logs = System_log::all();
        $data = [
            'sys_logs' => $sys_logs
        ];
        return View::make('admin.viewsystemlogs', $data);
    }
    public static function getViewProductionLogs() {
        $pro_logs = System_log::all();
        $data = [
            'pro_logs' => $pro_logs
        ];
        return View::make('admin.viewproductionlogs', $data);
    }

}


