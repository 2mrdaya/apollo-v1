<?php

namespace App\Http\Controllers\Admin;

use App\ReferralData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReferralDatasRequest;
use App\Http\Requests\Admin\UpdateReferralDatasRequest;
use Yajra\DataTables\DataTables;

class ReferralDatasController extends Controller
{
    /**
     * Display a listing of ReferralData.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('referral_datum_access')) {
            return abort(401);
        }



        if (request()->ajax()) {
            $query = ReferralData::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

                if (! Gate::allows('referral_datum_delete')) {
                    return abort(401);
                }

                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'referral_datas.id',
                'referral_datas.month',
                'referral_datas.date_time_of_int',
                'referral_datas.executive',
                'referral_datas.area',
                'referral_datas.patient_name',
                'referral_datas.uhid',
                'referral_datas.date_time_of_reg',
                'referral_datas.ip_no',
                'referral_datas.bill_no',
                'referral_datas.admission_time',
                'referral_datas.date_of_discharged',
                'referral_datas.procedure_name',
                'referral_datas.dr_name_aic',
                'referral_datas.total_bill_amount',
                'referral_datas.net_amount',
                'referral_datas.aic_fee',
                'referral_datas.fee_percent',
                'referral_datas.treating_consultant',
                'referral_datas.department',
                'referral_datas.pan_no',
                'referral_datas.remarks',
                'referral_datas.message',
                'referral_datas.msg_date_time',
                'referral_datas.consumable',
                'referral_datas.ward_pharmacy',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'referral_datum_';
                $routeKey = 'admin.referral_datas';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('month', function ($row) {
                return $row->month ? $row->month : '';
            });
            $table->editColumn('date_time_of_int', function ($row) {
                return $row->date_time_of_int ? $row->date_time_of_int : '';
            });
            $table->editColumn('executive', function ($row) {
                return $row->executive ? $row->executive : '';
            });
            $table->editColumn('area', function ($row) {
                return $row->area ? $row->area : '';
            });
            $table->editColumn('patient_name', function ($row) {
                return $row->patient_name ? $row->patient_name : '';
            });
            $table->editColumn('uhid', function ($row) {
                return $row->uhid ? $row->uhid : '';
            });
            $table->editColumn('date_time_of_reg', function ($row) {
                return $row->date_time_of_reg ? $row->date_time_of_reg : '';
            });
            $table->editColumn('ip_no', function ($row) {
                return $row->ip_no ? $row->ip_no : '';
            });
            $table->editColumn('bill_no', function ($row) {
                return $row->bill_no ? $row->bill_no : '';
            });
            $table->editColumn('admission_time', function ($row) {
                return $row->admission_time ? $row->admission_time : '';
            });
            $table->editColumn('date_of_discharged', function ($row) {
                return $row->date_of_discharged ? $row->date_of_discharged : '';
            });
            $table->editColumn('procedure_name', function ($row) {
                return $row->procedure_name ? $row->procedure_name : '';
            });
            $table->editColumn('dr_name_aic', function ($row) {
                return $row->dr_name_aic ? $row->dr_name_aic : '';
            });
            $table->editColumn('total_bill_amount', function ($row) {
                return $row->total_bill_amount ? $row->total_bill_amount : '';
            });
            $table->editColumn('net_amount', function ($row) {
                return $row->net_amount ? $row->net_amount : '';
            });
            $table->editColumn('aic_fee', function ($row) {
                return $row->aic_fee ? $row->aic_fee : '';
            });
            $table->editColumn('fee_percent', function ($row) {
                return $row->fee_percent ? $row->fee_percent : '';
            });
            $table->editColumn('treating_consultant', function ($row) {
                return $row->treating_consultant ? $row->treating_consultant : '';
            });
            $table->editColumn('department', function ($row) {
                return $row->department ? $row->department : '';
            });
            $table->editColumn('pan_no', function ($row) {
                return $row->pan_no ? $row->pan_no : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });
            $table->editColumn('message', function ($row) {
                return $row->message ? $row->message : '';
            });
            $table->editColumn('msg_date_time', function ($row) {
                return $row->msg_date_time ? $row->msg_date_time : '';
            });
            $table->editColumn('consumable', function ($row) {
                return $row->consumable ? $row->consumable : '';
            });
            $table->editColumn('ward_pharmacy', function ($row) {
                return $row->ward_pharmacy ? $row->ward_pharmacy : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.referral_datas.index');
    }

    /**
     * Show the form for creating new ReferralData.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('referral_datum_create')) {
            return abort(401);
        }
        return view('admin.referral_datas.create');
    }

    /**
     * Store a newly created ReferralData in storage.
     *
     * @param  \App\Http\Requests\StoreReferralDatasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReferralDatasRequest $request)
    {
        if (! Gate::allows('referral_datum_create')) {
            return abort(401);
        }
        $referral_datum = ReferralData::create($request->all());



        return redirect()->route('admin.referral_datas.index');
    }


    /**
     * Show the form for editing ReferralData.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('referral_datum_edit')) {
            return abort(401);
        }
        $referral_datum = ReferralData::findOrFail($id);

        return view('admin.referral_datas.edit', compact('referral_datum'));
    }

    /**
     * Update ReferralData in storage.
     *
     * @param  \App\Http\Requests\UpdateReferralDatasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReferralDatasRequest $request, $id)
    {
        if (! Gate::allows('referral_datum_edit')) {
            return abort(401);
        }
        $referral_datum = ReferralData::findOrFail($id);
        $referral_datum->update($request->all());



        return redirect()->route('admin.referral_datas.index');
    }


    /**
     * Display ReferralData.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('referral_datum_view')) {
            return abort(401);
        }
        $referral_datum = ReferralData::findOrFail($id);

        return view('admin.referral_datas.show', compact('referral_datum'));
    }


    /**
     * Remove ReferralData from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('referral_datum_delete')) {
            return abort(401);
        }
        $referral_datum = ReferralData::findOrFail($id);
        $referral_datum->delete();

        return redirect()->route('admin.referral_datas.index');
    }

    /**
     * Delete all selected ReferralData at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('referral_datum_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ReferralData::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ReferralData from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('referral_datum_delete')) {
            return abort(401);
        }
        $referral_datum = ReferralData::onlyTrashed()->findOrFail($id);
        $referral_datum->restore();

        return redirect()->route('admin.referral_datas.index');
    }

    /**
     * Permanently delete ReferralData from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('referral_datum_delete')) {
            return abort(401);
        }
        $referral_datum = ReferralData::onlyTrashed()->findOrFail($id);
        $referral_datum->forceDelete();

        return redirect()->route('admin.referral_datas.index');
    }
}
