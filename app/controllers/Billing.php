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

    public function getMemo() {
        return View::make('billing.memo');
    }

    public function getReminders() {
        return View::make('billing.reminders');
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

}