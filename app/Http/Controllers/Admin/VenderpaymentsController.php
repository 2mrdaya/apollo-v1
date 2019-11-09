<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Venderpayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVenderpaymentsRequest;
use App\Http\Requests\Admin\UpdateVenderpaymentsRequest;
use Yajra\DataTables\DataTables;
use Response;

class VenderpaymentsController extends Controller
{
    /**
     * Display a listing of Venderpayment.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('venderpayment_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $template = 'actionsTemplate';

            $query = DB::select(DB::raw("SELECT avip_id as id, month, vendor, name, pan_number as pan, oracle_code,
                account_no, swift_code, iban_number, bank_name, address_1 as address, ifsc_code,
                sum(total_bill_amount) as bill_amount, sum(total_pharmacy_amount) as total_pharmacy,
                sum(total_consumables) as total_consumables, sum(gst_amout) as gst_amount, sum(0) as tds_amount ,
                sum(aic_fee) as payable_amount, sum(total_bill_amount-total_pharmacy_amount-total_consumables) as net_bill_amount
                FROM view_referral group by month, vendor, name, avip_id, oracle_code, pan_number, account_no, swift_code, iban_number, bank_name, address_1, ifsc_code"
            ));

            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);

            $table->editColumn('month', function ($row) {
                return $row->month ? $row->month : '';
            });
            $table->editColumn('vendor', function ($row) {
                return $row->vendor ? $row->vendor : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('oracle_code', function ($row) {
                return $row->oracle_code ? $row->oracle_code : '';
            });
            $table->editColumn('pan', function ($row) {
                return $row->pan ? $row->pan : '';
            });
            $table->editColumn('bill_amount', function ($row) {
                return $row->bill_amount ? $row->bill_amount : '';
            });
            $table->editColumn('total_pharmacy', function ($row) {
                return $row->total_pharmacy ? $row->total_pharmacy : '';
            });
            $table->editColumn('total_consumables', function ($row) {
                return $row->total_consumables ? $row->total_consumables : '';
            });
            $table->editColumn('gst_amount', function ($row) {
                return $row->gst_amount ? $row->gst_amount : '';
            });
            $table->editColumn('tds_amount', function ($row) {
                return $row->tds_amount ? $row->tds_amount : '';
            });
            $table->editColumn('payable_amount', function ($row) {
                return $row->payable_amount ? $row->payable_amount : '';
            });
            $table->editColumn('net_bill_amount', function ($row) {
                return $row->net_bill_amount ? $row->net_bill_amount : '';
            });
            $table->editColumn('account_no', function ($row) {
                return $row->account_no ? $row->account_no : '';
            });
            $table->editColumn('ifsc_code', function ($row) {
                return $row->ifsc_code ? $row->ifsc_code : '';
            });
            $table->editColumn('bank_name', function ($row) {
                return $row->bank_name ? $row->bank_name : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('iban_number', function ($row) {
                return $row->iban_number ? $row->iban_number : '';
            });
            $table->editColumn('swift_code', function ($row) {
                return $row->swift_code ? $row->swift_code : '';
            });

            return $table->make(true);
        }

        return view('admin.venderpayments.index');
    }

    /**
     * Display a listing of Venderpayment.
     *
     * @return \Illuminate\Http\Response
     */
    public function getQuaterlyComparison($period)
    {
        $period = json_decode($period, true);

        if (! Gate::allows('venderpayment_access')) {
            return abort(401);
        }

        if(isset($period["range1"])) {
            $range1 = $period['range1'];
        }

        if(isset($period['range2'])) {
            $range2 = $period['range2'];
        }

        if ($range1 and $range2) {
            $range = $range1.','.$range2;
        }

        $range = explode(',', $range);
        $range1 = explode(',', $range1);
        $range2 = explode(',', $range2);
        /*
        $range = '"'.implode('","',$range).'"';
        $range1 = '"'.implode('","',$range1).'"';
        $range2 = '"'.implode('","',$range2).'"';*/

        $place_holders_range = implode( ',', array_fill( 0, count($range), '?' ) );
        $place_holders_range1 = implode( ',', array_fill( 0, count($range1), '?' ) );
        //var_dump($place_holders_range);die;
        $query = "SELECT avip_id as id, vendors.vendor, name, pan_number as pan, vendors.oracle_code,
        account_no, swift_code, iban_number, bank_name, address_1 as address, ifsc_code,
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

        $export_data="Type, Vendor Code, Name, Bill Amount, Fee, GST, Bill Amount, Fee, GST \n";

        for ($i = 0; $i < count($query1); $i++) {

            $net_bill_amount = $query1[$i]->net_bill_amount ? $query1[$i]->net_bill_amount : "0";
            $payable_amount = $query1[$i]->payable_amount ? $query1[$i]->payable_amount : "0";
            $gst_amount = $query1[$i]->gst_amount ? $query1[$i]->gst_amount : "0";

            $net_bill_amount1 = $query2[$i]->net_bill_amount ? $query2[$i]->net_bill_amount : "0";
            $payable_amount1 = $query2[$i]->payable_amount ? $query2[$i]->payable_amount : "0";
            $gst_amount1 = $query2[$i]->gst_amount ? $query2[$i]->gst_amount : "0";

            $export_data.=$query1[$i]->vendor.",".$query1[$i]->oracle_code.','.$query1[$i]->name.',';
            $export_data.=$net_bill_amount.",";
            $export_data.=$payable_amount.",";
            $export_data.=$gst_amount.",";
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
    public function getQuaterlyComparisonCountryWise($period)
    {
        $period = json_decode($period, true);

        if (! Gate::allows('venderpayment_access')) {
            return abort(401);
        }

        if(isset($period["range1"])) {
            $range1 = $period['range1'];
        }

        if(isset($period['range2'])) {
            $range2 = $period['range2'];
        }

        if ($range1 and $range2) {
            $range = $range1.','.$range2;
        }

        $range = explode(',', $range);
        $range1 = explode(',', $range1);
        $range2 = explode(',', $range2);

        $place_holders_range = implode( ',', array_fill( 0, count($range), '?' ) );
        $place_holders_range1 = implode( ',', array_fill( 0, count($range1), '?' ) );

        $query = "SELECT vendors.country,
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

        $export_data="country, Bill Amount, Fee, GST, Bill Amount, Fee, GST \n";

        for ($i = 0; $i < count($query1); $i++) {

            $net_bill_amount = $query1[$i]->net_bill_amount ? $query1[$i]->net_bill_amount : "0";
            $payable_amount = $query1[$i]->payable_amount ? $query1[$i]->payable_amount : "0";
            $gst_amount = $query1[$i]->gst_amount ? $query1[$i]->gst_amount : "0";

            $net_bill_amount1 = $query2[$i]->net_bill_amount ? $query2[$i]->net_bill_amount : "0";
            $payable_amount1 = $query2[$i]->payable_amount ? $query2[$i]->payable_amount : "0";
            $gst_amount1 = $query2[$i]->gst_amount ? $query2[$i]->gst_amount : "0";

            $export_data.=$query1[$i]->country.",";
            $export_data.=$net_bill_amount.",";
            $export_data.=$payable_amount.",";
            $export_data.=$gst_amount.",";
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
    public function getVendorPayments($vendor_code)
    {

        if (! Gate::allows('venderpayment_access')) {
            return abort(401);
        }

        $query = "SELECT * FROM view_referral where view_referral.oracle_code=$vendor_code
        order by vendors.country";

        $query = DB::select(DB::raw($query),array_merge($vendor_code));

        $export_data="Patient Name, Patient DOB, Registration Date, Admission Date, Discharge Date, Pateint Address, Rates, Bill Amount, Consumable, Pharmacy, Net Bill, Fee, GST \n";

        for ($i = 0; $i < count($query); $i++) {

            $net_bill_amount = $query[$i]->net_bill_amount ? $query[$i]->net_bill_amount : "0";
            $payable_amount = $query[$i]->payable_amount ? $query[$i]->payable_amount : "0";
            $gst_amount = $query[$i]->gst_amount ? $query[$i]->gst_amount : "0";

            $export_data.=$query[$i]->country.",";
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

        return view('admin.venderpayments.comparison', compact("query1","query2"));
    }
}
