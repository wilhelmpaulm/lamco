<?php

class Billing extends BaseController {

    public function getViewSalesInvoices() {
        $si_p = Sales_invoice::where('status', '=', 'pending')->get();
        $si_h = Sales_invoice::where('status', '=', 'on hold')->get();
        $si_a = Sales_invoice::where('status', '=', 'approved')->get();
        $si_c = Sales_invoice::where('status', '=', 'completed')->get();
        $si_d = Sales_invoice::where('status', '=', 'in delivery')->get();
        $si_r = Sales_invoice::where('status', '=', 'rejected')->get();
        $data = [
            'si_p' => $si_p,
            'si_h' => $si_h,
            'si_a' => $si_a,
            'si_d' => $si_d,
            'si_r' => $si_r,
            'si_c' => $si_c
        ];
        return View::make('billing.viewsalesinvoices', $data);
    }

    public function postViewSalesInvoice() {
        $id = Input::get('id');
        $si = Sales_invoice::find($id);
        $si_d = Si_detail::where("si_no", "=", $id)->get();
        $data = [
            'si' => $si,
            'si_d' => $si_d
        ];
        return View::make('billing.viewsalesinvoice', $data);
    }

    public function postViewEditSalesInvoice() {
        $id = Input::get('id');
        $si = Sales_invoice::find($id);
        $si_d = Si_detail::where("si_no", "=", $id)->get();
        $data = [
            'si' => $si,
            'si_d' => $si_d
        ];
        return View::make('billing.editsalesinvoice', $data);
    }

    public function postApplyEditSalesInvoice() {
        $id = Input::get('id');
        $si = Sales_invoice::find($id);
        $si->status = "approved";
        $si->save();

        return Redirect::to("billing/view-sales-invoices");
    }

    public function getIndex() {
        return View::make('billing.index');
    }

    public function getViewRolls() {
        $lamco_rolls = Roll::where('owner', '=', 'lamco')->get();
        $low_rolls = Roll::where('quantity', '<', 50)->where('owner', '=', 'lamco')->get();
        $client_rolls = Roll::where('owner', '!=', 'lamco')->get();
        $data = [
            'lamco_rolls' => $lamco_rolls,
            'low_rolls' => $low_rolls,
            'client_rolls' => $client_rolls
        ];
        return View::make('billing.viewrolls', $data);
    }

    public function getViewProducts() {
        $lamco_products = Product::where('owner', '=', 'lamco')->get();
        $low_products = Product::where('quantity', '<', 50)->where('owner', '=', 'lamco')->get();
        $client_products = Product::where('owner', '!=', 'lamco')->get();
        $data = [
            'lamco_products' => $lamco_products,
            'low_products' => $low_products,
            'client_products' => $client_products
        ];
        return View::make('billing.viewproducts', $data);
    }
    
    public function getMemos() {
        $memos = Memo::where('department', '=', Auth::user()->department)->get();
        $departments = Department::all();
        $data = [
            'departments' => $departments,
            'memos' => $memos
        ];
        return View::make('billing.memos', $data);
    }
    
    public static function postDeleteMemo() {
        Memo::find(Input::get('id'))->delete();
        return Redirect::to('billing/memos');
    }

    public static function postAddMemo() {
        Memo::create([
            "created_by" => Auth::user()->id,
            "deadline" => Input::get("deadline"),
            "department" => Input::get("department"),
            "importance" => Input::get("importance"),
            "memo" => Input::get("memo")
        ]);
        return Redirect::to('billing/memos');
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
        return Redirect::to('billing/reminders');
    }

    public static function postAddReminder() {
        Reminder::create([
            "created_by" => Auth::user()->id,
            "deadline" => Input::get("deadline"),
            "created_for" => Input::get("created_for"),
            "importance" => Input::get("importance"),
            "reminder" => Input::get("reminder")
        ]);
        return Redirect::to('billing/reminders');
    }
    
    public function getViewClients() {
        $clients = Client::all();
        $data = [
            'clients' => $clients
        ];
        return View::make('billing.viewclients', $data);
    }

    public function getViewAddClient() {
        return View::make('billing.addclient');
    }

    public function postAddClient() {
        Client::create([
            'name' => Input::get('name'),
            'contacts' => Input::get('contacts'),
            'address' => Input::get('address')
        ]);
        return Redirect::to('billing/view-clients');
    }

    public function postEditClient() {
        $id = Input::get('id');
        $client = Client::find($id);
        $data = [
            'client' => $client
        ];
        return View::make('billing.editclient', $data);
    }

    public function postApplyEditClient() {
        $id = Input::get('id');
        $client = Client::find($id);
        $client->name = Input::get('name');
        $client->contacts = Input::get('contacts');
        $client->address = Input::get('address');
        $client->save();
        return Redirect::to('sales/view-clients');
    }

    public function postDeleteClient() {
        Client::find(Input::get('id'))->delete();
        return Redirect::to('billing/view-clients');
    }

}