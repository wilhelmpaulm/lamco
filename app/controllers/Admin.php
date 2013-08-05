<?php

class Admin extends BaseController {

    public function postValidate() {
        var_dump($_POST);
    }

    public function getIndex() {
        Stalk::stalkSystem("view main page of admin", null);
        return View::make('admin.index');
    }

    public function getMemos() {
        $memos = Memo::where('department', '=', Auth::user()->department)->get();
        $departments = Department::all();
        $data = [
            'departments' => $departments,
            'memos' => $memos
        ];
        Stalk::stalkSystem("view memos", null);
        return View::make('admin.memos', $data);
    }
    
    public static function postDeleteMemo() {
        Memo::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted memo", Input::get('id'));
        return Redirect::to('admin/memos');
    }

    public static function postAddMemo() {
        $m = Memo::create([
            "created_by" => Auth::user()->id,
            "deadline" => Input::get("deadline"),
            "department" => Input::get("department"),
            "importance" => Input::get("importance"),
            "memo" => Input::get("memo")
        ]);
        Stalk::stalkSystem("created memo", $m->id);
        return Redirect::to('admin/memos');
    }

    public function getReminders() {
        $users = User::all();
        $reminders = Reminder::where('created_for', '=', Auth::user()->id)->get();
        $data = [
            'reminders' => $reminders,
            'users' => $users
        ];
        Stalk::stalkSystem("view reminders", null);
        return View::make('admin.reminders', $data);
    }
    
    public static function postDeleteReminder() {
        Reminder::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted reminder", Input::get('id'));
        return Redirect::to('admin/reminders');
    }

    public static function postAddReminder() {
        $r = Reminder::create([
            "created_by" => Auth::user()->id,
            "deadline" => Input::get("deadline"),
            "created_for" => Input::get("created_for"),
            "importance" => Input::get("importance"),
            "reminder" => Input::get("reminder")
        ]);
        Stalk::stalkSystem("created reminder", $r->id);
        return Redirect::to('admin/reminders');
    }
    
    
    public static function getViewUsers() {
        $users = User::all();
        $data = [
            'users' => $users
        ];
        Stalk::stalkSystem("view users", null);
        return View::make('admin.viewusers', $data);
    }

    public static function getCreateUser() {
        Stalk::stalkSystem("view add user", null);
        return View::make('admin.createuser');
    }

    public static function postAddUser() {
        $u = User::create([
            "last_name" => Input::get("last_name"),
            "first_name" => Input::get("first_name"),
            "password" => Hash::make(Input::get("password")),
            "department" => Input::get("department"),
            "job_title" => Input::get("job_title")
        ]);
        Stalk::stalkSystem("created user", $u->id);
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
        Stalk::stalkSystem("edited user", Input::get('id'));
        return Redirect::to('admin/view-users');
    }

    public static function postDeleteUser() {
        User::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted user", Input::get('id'));
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
        Stalk::stalkSystem("view edit user", Input::get('id'));
        return View::make('admin.edituser', $data);
    }
    
    public static function getViewSystemLogs() {
        $sys_logs = System_log::all();
        $data = [
            'sys_logs' => $sys_logs
        ];
        Stalk::stalkSystem("view system logs", null);
        return View::make('admin.viewsystemlogs', $data);
    }
    public static function getViewProductionLogs() {
        $pro_logs = System_log::all();
        $data = [
            'pro_logs' => $pro_logs
        ];
        Stalk::stalkSystem("view production logs", null);
        return View::make('admin.viewproductionlogs', $data);
    }

}


