<?php

class Admin extends BaseController {

    public function postValidate() {
        var_dump($_POST);
    }

    public function getIndex() {
        return View::make('admin.index');
    }

    public function getMemo() {
        $memos = Memo::where('department', '=', Auth::user()->department)->get();
        $data = [
            'memos' => $memos
        ];
        return View::make('admin.memos', $data);
    }

    public function getReminders() {
        $reminders = Reminder::where('created_for', '=', Auth::user()->id)->get();
        $data = [
            'reminders' => $reminders
        ];
        return View::make('admin.reminders', $data);
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

}


