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
                FROM view_referral group by month, vendor, name, avip_id, oracle_code"
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


        $query1 = DB::select(DB::raw("SELECT distinct oracle_code as id
            FROM view_referral where month in (".$range.")"
        ));

        $query2 = DB::select(DB::raw("SELECT avip_id as id, vendor, name, pan_number as pan, oracle_code,
            account_no, swift_code, iban_number, bank_name, address_1 as address, ifsc_code,
            sum(total_bill_amount) as bill_amount, sum(total_pharmacy_amount) as total_pharmacy,
            sum(total_consumables) as total_consumables, sum(gst_amout) as gst_amount, sum(0) as tds_amount ,
            sum(aic_fee) as payable_amount, sum(total_bill_amount-total_pharmacy_amount-total_consumables) as net_bill_amount
            FROM view_referral where month in (".$range1.") group by vendor, name, avip_id, oracle_code"
        ));

        $query3 = DB::select(DB::raw("SELECT avip_id as id, vendor, name, pan_number as pan, oracle_code,
            account_no, swift_code, iban_number, bank_name, address_1 as address, ifsc_code,
            sum(total_bill_amount) as bill_amount, sum(total_pharmacy_amount) as total_pharmacy,
            sum(total_consumables) as total_consumables, sum(gst_amout) as gst_amount, sum(0) as tds_amount ,
            sum(aic_fee) as payable_amount, sum(total_bill_amount-total_pharmacy_amount-total_consumables) as net_bill_amount
            FROM view_referral where month in (".$range2.") group by vendor, name, avip_id, oracle_code"
        ));

        foreach ($query1 as $row) {
            $vendor_code = $row['oracle_code']
            $query2[]
        }
        var_dump($query3);die;

        return view('admin.venderpayments.index');
    }
}
