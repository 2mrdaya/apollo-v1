<?php

namespace App\Http\Controllers\Admin;

use App\ReferralDataFinal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReferralDataFinalsRequest;
use App\Http\Requests\Admin\UpdateReferralDataFinalsRequest;
use Yajra\DataTables\DataTables;

class ReferralDataFinalsController extends Controller
{
    /**
     * Display a listing of ReferralDataFinal.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('referral_data_final_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = ReferralDataFinal::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('referral_data_final_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'referral_data_finals.id',
                'referral_data_finals.month',
                'referral_data_finals.date_time_of_int',
                'referral_data_finals.executive',
                'referral_data_finals.area',
                'referral_data_finals.patient_name',
                'referral_data_finals.uhid',
                'referral_data_finals.date_time_of_reg',
                'referral_data_finals.ip_no',
                'referral_data_finals.bill_no',
                'referral_data_finals.admission_time',
                'referral_data_finals.date_of_discharged',
                'referral_data_finals.procedure_name',
                'referral_data_finals.dr_name_aic',
                'referral_data_finals.total_bill_amount',
                'referral_data_finals.net_amount',
                'referral_data_finals.aic_fee',
                'referral_data_finals.fee_percent',
                'referral_data_finals.treating_consultant',
                'referral_data_finals.department',
                'referral_data_finals.pan_no',
                'referral_data_finals.remarks',
                'referral_data_finals.message',
                'referral_data_finals.msg_date_time',
                'referral_data_finals.consumable',
                'referral_data_finals.ward_pharmacy',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'referral_data_final_';
                $routeKey = 'admin.referral_data_finals';

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

        return view('admin.referral_data_finals.index');
    }

    /**
     * Show the form for creating new ReferralDataFinal.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('referral_data_final_create')) {
            return abort(401);
        }
        return view('admin.referral_data_finals.create');
    }

    /**
     * Store a newly created ReferralDataFinal in storage.
     *
     * @param  \App\Http\Requests\StoreReferralDataFinalsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReferralDataFinalsRequest $request)
    {
        if (! Gate::allows('referral_data_final_create')) {
            return abort(401);
        }
        $referral_data_final = ReferralDataFinal::create($request->all());



        return redirect()->route('admin.referral_data_finals.index');
    }


    /**
     * Show the form for editing ReferralDataFinal.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('referral_data_final_edit')) {
            return abort(401);
        }
        $referral_data_final = ReferralDataFinal::findOrFail($id);

        return view('admin.referral_data_finals.edit', compact('referral_data_final'));
    }

    /**
     * Update ReferralDataFinal in storage.
     *
     * @param  \App\Http\Requests\UpdateReferralDataFinalsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReferralDataFinalsRequest $request, $id)
    {
        if (! Gate::allows('referral_data_final_edit')) {
            return abort(401);
        }
        $referral_data_final = ReferralDataFinal::findOrFail($id);
        $referral_data_final->update($request->all());



        return redirect()->route('admin.referral_data_finals.index');
    }


    /**
     * Display ReferralDataFinal.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('referral_data_final_view')) {
            return abort(401);
        }
        $referral_data_final = ReferralDataFinal::findOrFail($id);

        return view('admin.referral_data_finals.show', compact('referral_data_final'));
    }


    /**
     * Remove ReferralDataFinal from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('referral_data_final_delete')) {
            return abort(401);
        }
        $referral_data_final = ReferralDataFinal::findOrFail($id);
        $referral_data_final->delete();

        return redirect()->route('admin.referral_data_finals.index');
    }

    /**
     * Delete all selected ReferralDataFinal at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('referral_data_final_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ReferralDataFinal::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ReferralDataFinal from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('referral_data_final_delete')) {
            return abort(401);
        }
        $referral_data_final = ReferralDataFinal::onlyTrashed()->findOrFail($id);
        $referral_data_final->restore();

        return redirect()->route('admin.referral_data_finals.index');
    }

    /**
     * Permanently delete ReferralDataFinal from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('referral_data_final_delete')) {
            return abort(401);
        }
        $referral_data_final = ReferralDataFinal::onlyTrashed()->findOrFail($id);
        $referral_data_final->forceDelete();

        return redirect()->route('admin.referral_data_finals.index');
    }
}
