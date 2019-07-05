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

        DB::insert(
            "INSERT INTO ppn_payments (month, mapping_id, patientid_id, avipid_id, created_at, percentage, on_total_bill, type, eligible_bill_amount, amount, total_bill, total_pharmacy, total_consumable, rate_details)
            SELECT MONTHNAME(ips.bill_date) as 'month', message_mappings.id,
            ips.id, message_mappings.avip_id, message_mappings.created_at,
            SUBSTRING_INDEX(avips.rate_details,'%',1),
            IF(SUBSTRING_INDEX(avips.rate_details,'%',1)=5, 'Yes', 'No'),'Percentage',
            IF(SUBSTRING_INDEX(avips.rate_details,'%',1)=5, ips.total_bill_amount, ips.total_bill_amount-ips.total_pharmacy_amount-ips.total_consumables),
            LEAST(IF(SUBSTRING_INDEX(avips.rate_details,'%',1)=5, (ips.total_bill_amount)*5/100, (ips.total_bill_amount-ips.total_pharmacy_amount-ips.total_consumables)*SUBSTRING_INDEX(avips.rate_details,'%',1)/100),25000),
            ips.total_bill_amount, ips.total_pharmacy_amount, ips.total_consumables, avips.rate_details
            FROM message_mappings
            join patient_registrations on patient_registrations.id = message_mappings.uhid_id
            join ips on patient_registrations.uhid = ips.uhid
            join avips on avips.id=message_mappings.avip_id
            WHERE message_mappings.id not in (select mapping_id from ppn_payments)"
        );

        if (request()->ajax()) {
            $query = PpnPayment::query();
            $query->with("patientid");
            $query->with("avipid");
            $query->with("mapping");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('ppn_payment_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'ppn_payments.id',
                'ppn_payments.month',
                'ppn_payments.patientid_id',
                'ppn_payments.avipid_id',
                'ppn_payments.mapping_id',
                'ppn_payments.total_bill',
                'ppn_payments.total_pharmacy',
                'ppn_payments.total_consumable',
                'ppn_payments.rate_details',
                'ppn_payments.on_total_bill',
                'ppn_payments.type',
                'ppn_payments.eligible_bill_amount',
                'ppn_payments.percentage',
                'ppn_payments.amount',
                'ppn_payments.status',
                'ppn_payments.remarks',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'ppn_payment_';
                $routeKey = 'admin.ppn_payments';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('month', function ($row) {
                return $row->month ? $row->month : '';
            });
            $table->editColumn('patientid.uhid', function ($row) {
                return $row->patientid ? $row->patientid->uhid : '';
            });
            $table->editColumn('avipid.pan_number', function ($row) {
                return $row->avipid ? $row->avipid->pan_number : '';
            });
            $table->editColumn('mapping.patient_name', function ($row) {
                return $row->mapping ? $row->mapping->patient_name : '';
            });
            $table->editColumn('total_bill', function ($row) {
                return $row->total_bill ? $row->total_bill : '';
            });
            $table->editColumn('total_pharmacy', function ($row) {
                return $row->total_pharmacy ? $row->total_pharmacy : '';
            });
            $table->editColumn('total_consumable', function ($row) {
                return $row->total_consumable ? $row->total_consumable : '';
            });
            $table->editColumn('rate_details', function ($row) {
                return $row->rate_details ? $row->rate_details : '';
            });
            $table->editColumn('on_total_bill', function ($row) {
                return $row->on_total_bill ? $row->on_total_bill : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? $row->type : '';
            });
            $table->editColumn('eligible_bill_amount', function ($row) {
                return $row->eligible_bill_amount ? $row->eligible_bill_amount : '';
            });
            $table->editColumn('percentage', function ($row) {
                return $row->percentage ? $row->percentage : '';
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.ppn_payments.index');
    }

    /**
     * Show the form for creating new PpnPayment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('ppn_payment_create')) {
            return abort(401);
        }

        $patientids = \App\Ip::get()->pluck('uhid', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $avipids = \App\Avip::get()->pluck('pan_number', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $mappings = \App\MessageMapping::get()->pluck('patient_name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $enum_on_total_bill = PpnPayment::$enum_on_total_bill;
                    $enum_type = PpnPayment::$enum_type;
                    $enum_status = PpnPayment::$enum_status;

        return view('admin.ppn_payments.create', compact('enum_on_total_bill', 'enum_type', 'enum_status', 'patientids', 'avipids', 'mappings'));
    }

    /**
     * Store a newly created PpnPayment in storage.
     *
     * @param  \App\Http\Requests\StorePpnPaymentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePpnPaymentsRequest $request)
    {
        if (! Gate::allows('ppn_payment_create')) {
            return abort(401);
        }
        $ppn_payment = PpnPayment::create($request->all());



        return redirect()->route('admin.ppn_payments.index');
    }


    /**
     * Show the form for editing PpnPayment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('ppn_payment_edit')) {
            return abort(401);
        }

        $patientids = \App\Ip::get()->pluck('uhid', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $avipids = \App\Avip::get()->pluck('pan_number', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $mappings = \App\MessageMapping::get()->pluck('patient_name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $enum_on_total_bill = PpnPayment::$enum_on_total_bill;
                    $enum_type = PpnPayment::$enum_type;
                    $enum_status = PpnPayment::$enum_status;

        $ppn_payment = PpnPayment::findOrFail($id);

        return view('admin.ppn_payments.edit', compact('ppn_payment', 'enum_on_total_bill', 'enum_type', 'enum_status', 'patientids', 'avipids', 'mappings'));
    }

    /**
     * Update PpnPayment in storage.
     *
     * @param  \App\Http\Requests\UpdatePpnPaymentsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePpnPaymentsRequest $request, $id)
    {
        if (! Gate::allows('ppn_payment_edit')) {
            return abort(401);
        }
        $ppn_payment = PpnPayment::findOrFail($id);
        $ppn_payment->update($request->all());



        return redirect()->route('admin.ppn_payments.index');
    }


    /**
     * Display PpnPayment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('ppn_payment_view')) {
            return abort(401);
        }
        $ppn_payment = PpnPayment::findOrFail($id);

        return view('admin.ppn_payments.show', compact('ppn_payment'));
    }


    /**
     * Remove PpnPayment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('ppn_payment_delete')) {
            return abort(401);
        }
        $ppn_payment = PpnPayment::findOrFail($id);
        $ppn_payment->delete();

        return redirect()->route('admin.ppn_payments.index');
    }

    /**
     * Delete all selected PpnPayment at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('ppn_payment_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = PpnPayment::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore PpnPayment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('ppn_payment_delete')) {
            return abort(401);
        }
        $ppn_payment = PpnPayment::onlyTrashed()->findOrFail($id);
        $ppn_payment->restore();

        return redirect()->route('admin.ppn_payments.index');
    }

    /**
     * Permanently delete PpnPayment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('ppn_payment_delete')) {
            return abort(401);
        }
        $ppn_payment = PpnPayment::onlyTrashed()->findOrFail($id);
        $ppn_payment->forceDelete();

        return redirect()->route('admin.ppn_payments.index');
    }
}
