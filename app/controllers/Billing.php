<?php

class Billing extends BaseController {
    
    public function getNotif() {
//        return Roll::where('quantity', '<', '50')->where('owner', '=', 'lamco')->get()->toJson();
        
        $data = [
          'rolls' =>  Roll::where('quantity', '<', '50')->where('owner', '=', 'lamco')->get()->toJson(), 
          'products' =>  Product::where('quantity', '<', '50')->where('owner', '=', 'lamco')->get()->toJson(), 
            'reminders' => Reminder::where("created_for", "=", Auth::user()->id)->get()->toJson(),
            'memos' => Memo::where("department", "=", Auth::user()->department)->get()->toJson()
        ];
        return json_encode($data);
    }

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
        Stalk::stalkSystem("view sales invoices", null);
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
        Stalk::stalkSystem("view sales invoice", $id);
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
        Stalk::stalkSystem("view edit sales invoice", $id);
        return View::make('billing.editsalesinvoice', $data);
    }

    public function postApplyEditSalesInvoice() {
        $id = Input::get('id');
        $si = Sales_invoice::find($id);
        $si->status = "approved";
        $si->save();
        Stalk::stalkSystem("edited sales invoice", $id);
        return Redirect::to("billing/view-sales-invoices");
    }

    public function getIndex() {
        Stalk::stalkSystem("view main page of billing", null);
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
        Stalk::stalkSystem("view rolls", null);
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
        Stalk::stalkSystem("view products", null);
        return View::make('billing.viewproducts', $data);
    }
    
    public function getMemos() {
        $memos = Memo::where('department', '=', Auth::user()->department)->get();
        $departments = Department::all();
        $data = [
            'departments' => $departments,
            'memos' => $memos
        ];
        Stalk::stalkSystem("view memos", null);
        return View::make('billing.memos', $data);
    }
    
    public static function postDeleteMemo() {
        Memo::find(Input::get('id'))->delete();
        Stalk::stalkSystem("view deleted memo", Input::get('id'));
        return Redirect::to('billing/memos');
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
        return Redirect::to('billing/memos');
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
        return Redirect::to('billing/reminders');
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
        return Redirect::to('billing/reminders');
    }
    
    public function getViewClients() {
        $clients = Client::all();
        $data = [
            'clients' => $clients
        ];
        Stalk::stalkSystem("view clients", null);
        return View::make('billing.viewclients', $data);
    }

    public function getViewAddClient() {
        Stalk::stalkSystem("view add client", null);
        return View::make('billing.addclient');
    }

    public function postAddClient() {
        $c = Client::create([
            'name' => Input::get('name'),
            'contacts' => Input::get('contacts'),
            'address' => Input::get('address')
        ]);
        Stalk::stalkSystem("created client", $c->id);
        return Redirect::to('billing/view-clients');
    }

    public function postEditClient() {
        $id = Input::get('id');
        $client = Client::find($id);
        $data = [
            'client' => $client
        ];
        Stalk::stalkSystem("view edit client", $id);
        return View::make('billing.editclient', $data);
    }

    public function postApplyEditClient() {
        $id = Input::get('id');
        $client = Client::find($id);
        $client->name = Input::get('name');
        $client->contacts = Input::get('contacts');
        $client->address = Input::get('address');
        $client->save();
        Stalk::stalkSystem("edited client", $id);
        return Redirect::to('sales/view-clients');
    }

    public function postDeleteClient() {
        Client::find(Input::get('id'))->delete();
        Stalk::stalkSystem("deleted client", Input::get('id'));
        return Redirect::to('billing/view-clients');
    }

}