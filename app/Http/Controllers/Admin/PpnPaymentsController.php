<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\PpnPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePpnPaymentsRequest;
use App\Http\Requests\Admin\UpdatePpnPaymentsRequest;
use Yajra\DataTables\DataTables;

class PpnPaymentsController extends Controller
{
    /**
     * Display a listing of PpnPayment.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('ppn_payment_access')) {
            return abort(401);
        }



        if (request()->ajax()) {
            $query = DB::select(DB::raw("SELECT ips.*, MONTHNAME(ips.bill_date) as 'month',
                avips.pan_number, avips.name, avips.address_1, avips.address_2,
                avips.bank_name, avips.bank_address, avips.account_no, avips.swift_code,
                avips.iban_number, avips.bank_code, avips.correspondence_bank_name,
                avips.correspondence_ac_no, avips.corp_swift_code, avips.ifsc_code,
                avips.oracle_code, avips.rate_details, avips.state as 'avips.state',
                avips.pin_code, message_mappings.message, message_mappings.source,
                message_mappings.intimation_date_time, message_mappings.channel,
                patient_registrations.registration_date
                FROM ips
                join patient_registrations on patient_registrations.uhid=ips.uhid
                join message_mappings on patient_registrations.id=message_mappings.uhid_id
                join avips on avips.id=message_mappings.avip_id"
            ));

            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('ppn_payment_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }

            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('status', '&nbsp;');
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->addColumn('on_total_Bill', '&nbsp;');

            $table->editColumn('status', function ($row) {
                if ($row->registration_date < $row->intimation_date_time)
                    return 'LATE INTIMATION';
                else
                    return 'OK';
            });

            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'ppn_payment_';
                $routeKey = 'admin.ppn_payments';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });


            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.ppn_payments.index');
    }
}
