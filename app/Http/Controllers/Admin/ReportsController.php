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
// import the storage facade
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\BinaryOp\Mod;

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

        $query = "SELECT avip_id as id, vendors.vendor, vendors.name, vendors.pan_number as pan, vendors.oracle_code,
        account_no, swift_code, iban_number, bank_name, address_1 as address, ifsc_code, count(distinct uhid) as patients,
        sum(total_bill_amount) as bill_amount, sum(total_pharmacy_amount) as total_pharmacy,
        sum(total_consumables) as total_consumables, sum(gst_amout) as gst_amount, sum(0) as tds_amount ,
        sum(aic_fee) as payable_amount, sum(total_bill_amount-total_pharmacy_amount-total_consumables) as net_bill_amount
        FROM view_referral right join (SELECT distinct oracle_code, vendor, name, pan_number
        FROM view_referral where month in ($place_holders_range)) as vendors on view_referral.oracle_code = vendors.oracle_code
        and view_referral.month in ($place_holders_range1)
        group by vendor, name, avip_id, vendors.oracle_code,vendors.pan_number,account_no, swift_code, iban_number, bank_name, address_1 , ifsc_code
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

            $export_data.=$query1[$i]->vendor.",".$query1[$i]->oracle_code.',"'.$query1[$i]->name.'",';
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
     * Display a listing of Speciality Payments .
     *
     * @return \Illuminate\Http\Response
     */
    public function getQuaterlyComparisonSpecialityWise(Request $request)
    {

        if (! Gate::allows('venderpayment_access')) {
            return abort(401);
        }

        $range1 = $request->all()['date_range1'];
        $range2 = $request->all()['date_range2'];

        $range = array_merge($range1, $range2);

        $place_holders_range = implode( ',', array_fill( 0, count($range), '?' ) );
        $place_holders_range1 = implode( ',', array_fill( 0, count($range1), '?' ) );

        $query = "SELECT vendors.speciality, count(distinct uhid) as patients,
        sum(total_bill_amount) as bill_amount, sum(total_pharmacy_amount) as total_pharmacy,
        sum(total_consumables) as total_consumables, sum(gst_amout) as gst_amount, sum(0) as tds_amount ,
        sum(aic_fee) as payable_amount, sum(total_bill_amount-total_pharmacy_amount-total_consumables) as net_bill_amount
        FROM view_referral right join (SELECT distinct speciality
        FROM view_referral where month in ($place_holders_range)) as vendors on view_referral.speciality = vendors.speciality
        and view_referral.month in ($place_holders_range1)
        group by vendors.speciality order by vendors.speciality";

        $query1 = DB::select(DB::raw($query),array_merge($range,$range1));

        $place_holders_range1 = implode( ',', array_fill( 0, count($range2), '?' ) );
        $query2 = DB::select(DB::raw($query),array_merge($range,$range2));

        $export_data="Speciality, Patients, Bill Amount, Fee, GST, Patients, Bill Amount, Fee, GST \n";

        for ($i = 0; $i < count($query1); $i++) {

            $net_bill_amount = $query1[$i]->net_bill_amount ? $query1[$i]->net_bill_amount : "0";
            $payable_amount = $query1[$i]->payable_amount ? $query1[$i]->payable_amount : "0";
            $gst_amount = $query1[$i]->gst_amount ? $query1[$i]->gst_amount : "0";

            $net_bill_amount1 = $query2[$i]->net_bill_amount ? $query2[$i]->net_bill_amount : "0";
            $payable_amount1 = $query2[$i]->payable_amount ? $query2[$i]->payable_amount : "0";
            $gst_amount1 = $query2[$i]->gst_amount ? $query2[$i]->gst_amount : "0";

            $export_data.='"'.$query1[$i]->speciality.'",';
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
        //ini_set('memory_limit', '-1');
        Storage::delete('file.csv');
        if (! Gate::allows('venderpayment_access')) {
            return abort(401);
        }

        $vendor_code = $request->all()['avip_oracle_code'];

        if (isset($request->all()['date_range'])) {
            $range = $request->all()['date_range'];
            $place_holders_range = implode( ',', array_fill( 0, count($range), '?' ) );
        }
        else {
            $range = 'ALL';
        }

        if ($vendor_code == 'ALL' and $range == 'ALL') {
            $sql = "SELECT * FROM view_referral order by month_dt, vendor, bill_date";
            $query = DB::select(DB::raw($sql));
        }
        else if ($vendor_code == 'ALL') {
            $sql = "SELECT * FROM view_referral where month in ($place_holders_range) order by month_dt, vendor, bill_date";
            $query = DB::select(DB::raw($sql),array_merge($range));
        }
        else if ($range == 'ALL'){
            $sql = "SELECT * FROM view_referral where view_referral.oracle_code='$vendor_code'
            order by month_dt, vendor, bill_date";
            $query = DB::select(DB::raw($sql),[$vendor_code]);
        }
        else {
            $sql = "SELECT * FROM view_referral where month in ($place_holders_range) and view_referral.oracle_code='$vendor_code'
            order by month_dt, vendor, bill_date";
            $query = DB::select(DB::raw($sql),array_merge($range,[$vendor_code]));
        }
        $export_data="Month, Type, Vendor, Oracle Code, Patient Name, Registration Date, Bill No, Bill Date, Rates, Bill Amount, Consumable, Pharmacy, Net Bill, Fee, GST";

        Storage::disk('local')->append('file.csv', $export_data);
        $export_data="";

        $ctr=1;
        for ($i = 0; $i < count($query); $i++) {
            $total_bill_amount = $query[$i]->total_bill_amount ? $query[$i]->total_bill_amount : "0";
            $total_consumables = $query[$i]->total_consumables ? $query[$i]->total_consumables : "0";
            $total_pharmacy_amount = $query[$i]->total_pharmacy_amount ? $query[$i]->total_pharmacy_amount : "0";
            $net_bill_amount = $total_bill_amount - $total_consumables - $total_pharmacy_amount;
            $payable_amount = $query[$i]->aic_fee ? $query[$i]->aic_fee : "0";
            $gst_amount = $query[$i]->gst_amout ? $query[$i]->gst_amout : "0";

            $export_data.=$query[$i]->month_dt.',';
            $export_data.=$query[$i]->vendor.",";
            $export_data.='"'.$query[$i]->name.'",';
            $export_data.=$query[$i]->oracle_code.",";
            $export_data.='"'.$query[$i]->patient_name_org.'",';
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
            if($ctr%100==0) {
                Storage::disk('local')->append('file.csv', $export_data);
                $export_data="";
            }
            else {
                $export_data.="\n";
            }
            $ctr++;
        }
        Storage::disk('local')->append('file.csv', $export_data);
        $contents = Storage::get('file.csv');
        return response($contents)
                ->header('Content-Type','application/csv')
                ->header('Content-Disposition', 'attachment; filename="download.csv"')
                ->header('Pragma','no-cache')
                ->header('Expires','0');
        //return view('admin.venderpayments.comparison', compact("query"));
    }

    /**
     * Display a listing of Venderpayment.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMonthlyPivot(Request $request)
    {
        //ini_set('memory_limit', '-1');
        Storage::delete('file.csv');
        if (! Gate::allows('venderpayment_access')) {
            return abort(401);
        }

        $range = $request->all()['date_range'];

        $place_holders_range = implode( ',', array_fill( 0, count($range), '?' ) );

        $sql = "SELECT distinct oracle_code, vendor, name
        from view_referral where month in ($place_holders_range)";

        $export_data="Type, Vendor Code, Name";

        for ($i = 0; $i < count($range); $i++) {
            $export_data.=",".$range[$i].",Patients, Bill Amount, Fee, GST";
        }

        Storage::disk('local')->append('file.csv', $export_data);

        $query1 = DB::select(DB::raw($sql),array_merge($range));

        for ($i = 0; $i < count($query1); $i++) {

            $export_data=$query1[$i]->vendor.",".$query1[$i]->oracle_code.',"'.$query1[$i]->name.'"';

            for ($j = 0; $j < count($range); $j++) {
                $sql = "SELECT count(distinct uhid) as patients,
                sum(total_bill_amount) as bill_amount, sum(total_pharmacy_amount) as total_pharmacy,
                sum(total_consumables) as total_consumables, sum(gst_amout) as gst_amount, sum(0) as tds_amount ,
                sum(aic_fee) as payable_amount, sum(total_bill_amount-total_pharmacy_amount-total_consumables) as net_bill_amount
                FROM view_referral
                where month='".$range[$j]."'
                and oracle_code='".$query1[$i]->oracle_code."'
                group by oracle_code,pan_number
                order by oracle_code";

                $query2 = DB::select(DB::raw($sql),[]);
                if (count($query2) > 0) {
                    $net_bill_amount = $query2[0]->net_bill_amount ? $query2[0]->net_bill_amount : "0";
                    $payable_amount = $query2[0]->payable_amount ? $query2[0]->payable_amount : "0";
                    $gst_amount = $query2[0]->gst_amount ? $query2[0]->gst_amount : "0";
                    $export_data.=',,'.$query2[0]->patients.',';
                    $export_data.=$net_bill_amount.",";
                    $export_data.=$payable_amount.",";
                    $export_data.=$gst_amount;
                }
                else {
                    $export_data.=',,0,0,0,0';
                }
            }
            Storage::disk('local')->append('file.csv', $export_data);
            $export_data = "";
        }
        $contents = Storage::get('file.csv');
        return response($contents)
                ->header('Content-Type','application/csv')
                ->header('Content-Disposition', 'attachment; filename="download.csv"')
                ->header('Pragma','no-cache')
                ->header('Expires','0');

        return view('admin.venderpayments.comparison', compact("query1","query2"));
    }

    /**
     * Display a listing of Monthly Vender Payment.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMonthlyPayments(Request $request)
    {
        //ini_set('memory_limit', '-1');
        Storage::delete('file.csv');
        if (! Gate::allows('venderpayment_access')) {
            return abort(401);
        }

        $month = $request->all()['month'];

        $sql = "SELECT avip_id as id, month_dt, vendor, name, pan_number, oracle_code,
            account_no, swift_code, iban_number, bank_name, address_1 as address, ifsc_code, country, count(distinct uhid) as patients,
            sum(total_bill_amount) as total_bill_amount, sum(total_pharmacy_amount) as total_pharmacy_amount,
            sum(total_consumables) as total_consumables, sum(gst_amout) as gst_amount, sum(0) as tds_amount ,
            sum(aic_fee) as payable_amount, sum(total_bill_amount-total_pharmacy_amount-total_consumables) as net_bill_amount
            FROM view_referral where month = '$month' group by month_dt, vendor, name, avip_id, oracle_code, pan_number, account_no, swift_code, iban_number, bank_name, address_1, ifsc_code, country";

        $query = DB::select(DB::raw($sql),[$month]);

        $export_data="Month, Type, Vendor Code, Name, Pan, Account, Swift Code, IBAN, Bank Name, Bank Address, IFSC, Country, Patients, Total Bill Amount, Consumable, Pharmacy, Net Bill, GST, Fee";

        Storage::disk('local')->append('file.csv', $export_data);
        $export_data="";

        for ($i = 0; $i < count($query); $i++) {
            $total_bill_amount = $query[$i]->total_bill_amount ? $query[$i]->total_bill_amount : "0";
            $total_consumables = $query[$i]->total_consumables ? $query[$i]->total_consumables : "0";
            $total_pharmacy_amount = $query[$i]->total_pharmacy_amount ? $query[$i]->total_pharmacy_amount : "0";
            $net_bill_amount = $total_bill_amount - $total_consumables - $total_pharmacy_amount;
            $payable_amount = $query[$i]->payable_amount ? $query[$i]->payable_amount : "0";
            $gst_amount = $query[$i]->gst_amount ? $query[$i]->gst_amount : "0";

            $export_data.=$query[$i]->month_dt.',';
            $export_data.=$query[$i]->vendor.",";
            $export_data.=$query[$i]->oracle_code.",";
            $export_data.='"'.$query[$i]->name.'",';
            $export_data.='"'.$query[$i]->pan_number.'",';
            $export_data.='"'.$query[$i]->account_no.'",';
            $export_data.='"'.$query[$i]->swift_code.'",';
            $export_data.='"'.$query[$i]->iban_number.'",';
            $export_data.='"'.$query[$i]->bank_name.'",';
            $export_data.='"'.$query[$i]->address.'",';
            $export_data.='"'.$query[$i]->ifsc_code.'",';
            $export_data.='"'.$query[$i]->country.'",';
            $export_data.=$query[$i]->patients.",";
            $export_data.=$total_bill_amount.",";
            $export_data.=$total_consumables.",";
            $export_data.=$total_pharmacy_amount.",";
            $export_data.=$net_bill_amount.",";
            $export_data.=$payable_amount.",";
            $export_data.=$gst_amount.",";
            Storage::disk('local')->append('file.csv', $export_data);
            $export_data="";
        }

        $contents = Storage::get('file.csv');
        return response($contents)
                ->header('Content-Type','application/csv')
                ->header('Content-Disposition', 'attachment; filename="download.csv"')
                ->header('Pragma','no-cache')
                ->header('Expires','0');

        return view('admin.venderpayments.comparison', compact("query1","query2"));
    }
}
