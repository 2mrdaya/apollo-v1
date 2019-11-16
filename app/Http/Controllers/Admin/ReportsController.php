<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Venderpayment;
use App\ReferralDataFinal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReportsRequest;
use Yajra\DataTables\DataTables;
use Response;

class ReportsController extends Controller
{
    /**
     * Display a listing of Report.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('venderpayment_access')) {
            return abort(401);
        }
        $avips = \App\Avip::get()->pluck('name', 'oracle_code')->prepend(trans('quickadmin.qa_please_select'), 'ALL');
        //var_dump($enum_vendor);die;
        return view('admin.reports.show', compact('avips'));
    }

    /**
     * Display a listing of Venderpayment.
     *
     * @return \Illuminate\Http\Response
     */
    public function getQuaterlyComparison(Request $request)
    {

        if (! Gate::allows('venderpayment_access')) {
            return abort(401);
        }

        $range1 = $request->all()['date_range1'];
        $range2 = $request->all()['date_range2'];

        $range = array_merge($range1, $range2);

        $place_holders_range = implode( ',', array_fill( 0, count($range), '?' ) );
        $place_holders_range1 = implode( ',', array_fill( 0, count($range1), '?' ) );

        $query = "SELECT avip_id as id, vendors.vendor, name, pan_number as pan, vendors.oracle_code,
        account_no, swift_code, iban_number, bank_name, address_1 as address, ifsc_code, count(distinct uhid) as patients,
        sum(total_bill_amount) as bill_amount, sum(total_pharmacy_amount) as total_pharmacy,
        sum(total_consumables) as total_consumables, sum(gst_amout) as gst_amount, sum(0) as tds_amount ,
        sum(aic_fee) as payable_amount, sum(total_bill_amount-total_pharmacy_amount-total_consumables) as net_bill_amount
        FROM view_referral right join (SELECT distinct oracle_code, vendor
        FROM view_referral where month in ($place_holders_range)) as vendors on view_referral.oracle_code = vendors.oracle_code
        and view_referral.month in ($place_holders_range1)
        group by vendor, name, avip_id, vendors.oracle_code,pan_number,account_no, swift_code, iban_number, bank_name, address_1 , ifsc_code
        order by vendors.vendor,vendors.oracle_code";

        $query1 = DB::select(DB::raw($query),array_merge($range,$range1));

        $place_holders_range1 = implode( ',', array_fill( 0, count($range2), '?' ) );
        $query2 = DB::select(DB::raw($query),array_merge($range,$range2));

        $export_data="Type, Vendor Code, Name, Patients, Bill Amount, Fee, GST, Patients, Bill Amount, Fee, GST \n";

        for ($i = 0; $i < count($query1); $i++) {

            $net_bill_amount = $query1[$i]->net_bill_amount ? $query1[$i]->net_bill_amount : "0";
            $payable_amount = $query1[$i]->payable_amount ? $query1[$i]->payable_amount : "0";
            $gst_amount = $query1[$i]->gst_amount ? $query1[$i]->gst_amount : "0";

            $net_bill_amount1 = $query2[$i]->net_bill_amount ? $query2[$i]->net_bill_amount : "0";
            $payable_amount1 = $query2[$i]->payable_amount ? $query2[$i]->payable_amount : "0";
            $gst_amount1 = $query2[$i]->gst_amount ? $query2[$i]->gst_amount : "0";

            $export_data.=$query1[$i]->vendor.",".$query1[$i]->oracle_code.','.$query1[$i]->name.',';
            $export_data.=$query1[$i]->patients.',';
            $export_data.=$net_bill_amount.",";
            $export_data.=$payable_amount.",";
            $export_data.=$gst_amount.",";
            $export_data.=$query2[$i]->patients.',';
            $export_data.=$net_bill_amount1.",";
            $export_data.=$payable_amount1.",";
            $export_data.=$gst_amount1.",";
            $export_data.="\n";
        }
        return response($export_data)
                ->header('Content-Type','application/csv')
                ->header('Content-Disposition', 'attachment; filename="download.csv"')
                ->header('Pragma','no-cache')
                ->header('Expires','0');

        return view('admin.venderpayments.comparison', compact("query1","query2"));
    }

    /**
     * Display a listing of Country Payments .
     *
     * @return \Illuminate\Http\Response
     */
    public function getQuaterlyComparisonCountryWise(Request $request)
    {

        if (! Gate::allows('venderpayment_access')) {
            return abort(401);
        }

        $range1 = $request->all()['date_range1'];
        $range2 = $request->all()['date_range2'];

        $range = array_merge($range1, $range2);

        $place_holders_range = implode( ',', array_fill( 0, count($range), '?' ) );
        $place_holders_range1 = implode( ',', array_fill( 0, count($range1), '?' ) );

        $query = "SELECT vendors.country, count(distinct uhid) as patients,
        sum(total_bill_amount) as bill_amount, sum(total_pharmacy_amount) as total_pharmacy,
        sum(total_consumables) as total_consumables, sum(gst_amout) as gst_amount, sum(0) as tds_amount ,
        sum(aic_fee) as payable_amount, sum(total_bill_amount-total_pharmacy_amount-total_consumables) as net_bill_amount
        FROM view_referral right join (SELECT distinct country
        FROM view_referral where month in ($place_holders_range)) as vendors on view_referral.country = vendors.country
        and view_referral.month in ($place_holders_range1)
        group by vendors.country order by vendors.country";

        $query1 = DB::select(DB::raw($query),array_merge($range,$range1));

        $place_holders_range1 = implode( ',', array_fill( 0, count($range2), '?' ) );
        $query2 = DB::select(DB::raw($query),array_merge($range,$range2));

        $export_data="country, Patients, Bill Amount, Fee, GST, Patients, Bill Amount, Fee, GST \n";

        for ($i = 0; $i < count($query1); $i++) {

            $net_bill_amount = $query1[$i]->net_bill_amount ? $query1[$i]->net_bill_amount : "0";
            $payable_amount = $query1[$i]->payable_amount ? $query1[$i]->payable_amount : "0";
            $gst_amount = $query1[$i]->gst_amount ? $query1[$i]->gst_amount : "0";

            $net_bill_amount1 = $query2[$i]->net_bill_amount ? $query2[$i]->net_bill_amount : "0";
            $payable_amount1 = $query2[$i]->payable_amount ? $query2[$i]->payable_amount : "0";
            $gst_amount1 = $query2[$i]->gst_amount ? $query2[$i]->gst_amount : "0";

            $export_data.=$query1[$i]->country.",";
            $export_data.=$query1[$i]->patients.',';
            $export_data.=$net_bill_amount.",";
            $export_data.=$payable_amount.",";
            $export_data.=$gst_amount.",";
            $export_data.=$query2[$i]->patients.',';
            $export_data.=$net_bill_amount1.",";
            $export_data.=$payable_amount1.",";
            $export_data.=$gst_amount1.",";
            $export_data.="\n";
        }
        return response($export_data)
                ->header('Content-Type','application/csv')
                ->header('Content-Disposition', 'attachment; filename="download.csv"')
                ->header('Pragma','no-cache')
                ->header('Expires','0');

        return view('admin.venderpayments.comparison', compact("query1","query2"));
    }

    /**
     * Display a listing of Vender Payment.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVendorPayments(Request $request)
    {

        if (! Gate::allows('venderpayment_access')) {
            return abort(401);
        }

        $vendor_code = $request->all()['avip_oracle_code'];

        if ($vendor_code == 'ALL') {
            $query = "SELECT * FROM view_referral order by month, vendor, bill_date";
        }
        else {
            $query = "SELECT * FROM view_referral where view_referral.oracle_code='$vendor_code'
            order by month, vendor, bill_date";
        }

        $query = DB::select(DB::raw($query),[$vendor_code]);

        $export_data="Month, Type, Vendor, Oracle Code, Patient Name, Registration Date, Bill No, Bill Date, Rates, Bill Amount, Consumable, Pharmacy, Net Bill, Fee, GST \n";

        for ($i = 0; $i < count($query); $i++) {

            $total_bill_amount = $query[$i]->total_bill_amount ? $query[$i]->total_bill_amount : "0";
            $total_consumables = $query[$i]->total_consumables ? $query[$i]->total_consumables : "0";
            $total_pharmacy_amount = $query[$i]->total_pharmacy_amount ? $query[$i]->total_pharmacy_amount : "0";
            $net_bill_amount = $total_bill_amount - $total_consumables - $total_pharmacy_amount;
            $payable_amount = $query[$i]->aic_fee ? $query[$i]->aic_fee : "0";
            $gst_amount = $query[$i]->gst_amout ? $query[$i]->gst_amout : "0";

            $export_data.=$query[$i]->month.",";
            $export_data.=$query[$i]->vendor.",";
            $export_data.=$query[$i]->name.",";
            $export_data.=$query[$i]->oracle_code.",";
            $export_data.=$query[$i]->patient_name_org.",";
            $export_data.=$query[$i]->registration_date.",";
            $export_data.=$query[$i]->bill_no.",";
            $export_data.=$query[$i]->bill_date.",";
            $export_data.='"'.$query[$i]->rate_details.'",';
            $export_data.=$total_bill_amount.",";
            $export_data.=$total_consumables.",";
            $export_data.=$total_pharmacy_amount.",";
            $export_data.=$net_bill_amount.",";
            $export_data.=$payable_amount.",";
            $export_data.=$gst_amount.",";
            $export_data.="\n";
        }
        return response($export_data)
                ->header('Content-Type','application/csv')
                ->header('Content-Disposition', 'attachment; filename="download.csv"')
                ->header('Pragma','no-cache')
                ->header('Expires','0');

        return view('admin.venderpayments.comparison', compact("query"));
    }
}
