<?php

namespace App\Http\Controllers\Admin;

use App\Referralcomplete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReferralcompletesRequest;
use App\Http\Requests\Admin\UpdateReferralcompletesRequest;
use Yajra\DataTables\DataTables;

class ReferralcompletesController extends Controller
{
    /**
     * Display a listing of Referralcomplete.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('referralcomplete_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Referralcomplete::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('referralcomplete_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'referralcompletes.id',
                'referralcompletes.vendor',
                'referralcompletes.month',
                'referralcompletes.msg_desc',
                'referralcompletes.doi_as_per_whats_app',
                'referralcompletes.doi_as_per_sw',
                'referralcompletes.area',
                'referralcompletes.uhid',
                'referralcompletes.oracle_code',
                'referralcompletes.ip_no',
                'referralcompletes.bill_no',
                'referralcompletes.dr_name_aic',
                'referralcompletes.pan_no',
                'referralcompletes.admission_date',
                'referralcompletes.discharge_date',
                'referralcompletes.registration_date',
                'referralcompletes.patient_name',
                'referralcompletes.company',
                'referralcompletes.country',
                'referralcompletes.treating_consultant',
                'referralcompletes.specialty',
                'referralcompletes.bill_to',
                'referralcompletes.bill_amount',
                'referralcompletes.pharmacy',
                'referralcompletes.consumable',
                'referralcompletes.bonus_percent',
                'referralcompletes.bonus',
                'referralcompletes.gst',
                'referralcompletes.fee_percent',
                'referralcompletes.aic_fee',
                'referralcompletes.remarks',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'referralcomplete_';
                $routeKey = 'admin.referralcompletes';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('vendor', function ($row) {
                return $row->vendor ? $row->vendor : '';
            });
            $table->editColumn('month', function ($row) {
                return $row->month ? $row->month : '';
            });
            $table->editColumn('msg_desc', function ($row) {
                return $row->msg_desc ? $row->msg_desc : '';
            });
            $table->editColumn('doi_as_per_whats_app', function ($row) {
                return $row->doi_as_per_whats_app ? $row->doi_as_per_whats_app : '';
            });
            $table->editColumn('doi_as_per_sw', function ($row) {
                return $row->doi_as_per_sw ? $row->doi_as_per_sw : '';
            });
            $table->editColumn('area', function ($row) {
                return $row->area ? $row->area : '';
            });
            $table->editColumn('uhid', function ($row) {
                return $row->uhid ? $row->uhid : '';
            });
            $table->editColumn('oracle_code', function ($row) {
                return $row->oracle_code ? $row->oracle_code : '';
            });
            $table->editColumn('ip_no', function ($row) {
                return $row->ip_no ? $row->ip_no : '';
            });
            $table->editColumn('bill_no', function ($row) {
                return $row->bill_no ? $row->bill_no : '';
            });
            $table->editColumn('dr_name_aic', function ($row) {
                return $row->dr_name_aic ? $row->dr_name_aic : '';
            });
            $table->editColumn('pan_no', function ($row) {
                return $row->pan_no ? $row->pan_no : '';
            });
            $table->editColumn('admission_date', function ($row) {
                return $row->admission_date ? $row->admission_date : '';
            });
            $table->editColumn('discharge_date', function ($row) {
                return $row->discharge_date ? $row->discharge_date : '';
            });
            $table->editColumn('registration_date', function ($row) {
                return $row->registration_date ? $row->registration_date : '';
            });
            $table->editColumn('patient_name', function ($row) {
                return $row->patient_name ? $row->patient_name : '';
            });
            $table->editColumn('company', function ($row) {
                return $row->company ? $row->company : '';
            });
            $table->editColumn('country', function ($row) {
                return $row->country ? $row->country : '';
            });
            $table->editColumn('treating_consultant', function ($row) {
                return $row->treating_consultant ? $row->treating_consultant : '';
            });
            $table->editColumn('specialty', function ($row) {
                return $row->specialty ? $row->specialty : '';
            });
            $table->editColumn('bill_to', function ($row) {
                return $row->bill_to ? $row->bill_to : '';
            });
            $table->editColumn('bill_amount', function ($row) {
                return $row->bill_amount ? $row->bill_amount : '';
            });
            $table->editColumn('pharmacy', function ($row) {
                return $row->pharmacy ? $row->pharmacy : '';
            });
            $table->editColumn('consumable', function ($row) {
                return $row->consumable ? $row->consumable : '';
            });
            $table->editColumn('bonus_percent', function ($row) {
                return $row->bonus_percent ? $row->bonus_percent : '';
            });
            $table->editColumn('bonus', function ($row) {
                return $row->bonus ? $row->bonus : '';
            });
            $table->editColumn('gst', function ($row) {
                return $row->gst ? $row->gst : '';
            });
            $table->editColumn('fee_percent', function ($row) {
                return $row->fee_percent ? $row->fee_percent : '';
            });
            $table->editColumn('aic_fee', function ($row) {
                return $row->aic_fee ? $row->aic_fee : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.referralcompletes.index');
    }

    /**
     * Show the form for creating new Referralcomplete.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('referralcomplete_create')) {
            return abort(401);
        }        $enum_vendor = Referralcomplete::$enum_vendor;
            
        return view('admin.referralcompletes.create', compact('enum_vendor'));
    }

    /**
     * Store a newly created Referralcomplete in storage.
     *
     * @param  \App\Http\Requests\StoreReferralcompletesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReferralcompletesRequest $request)
    {
        if (! Gate::allows('referralcomplete_create')) {
            return abort(401);
        }
        $referralcomplete = Referralcomplete::create($request->all());



        return redirect()->route('admin.referralcompletes.index');
    }


    /**
     * Show the form for editing Referralcomplete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('referralcomplete_edit')) {
            return abort(401);
        }        $enum_vendor = Referralcomplete::$enum_vendor;
            
        $referralcomplete = Referralcomplete::findOrFail($id);

        return view('admin.referralcompletes.edit', compact('referralcomplete', 'enum_vendor'));
    }

    /**
     * Update Referralcomplete in storage.
     *
     * @param  \App\Http\Requests\UpdateReferralcompletesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReferralcompletesRequest $request, $id)
    {
        if (! Gate::allows('referralcomplete_edit')) {
            return abort(401);
        }
        $referralcomplete = Referralcomplete::findOrFail($id);
        $referralcomplete->update($request->all());



        return redirect()->route('admin.referralcompletes.index');
    }


    /**
     * Display Referralcomplete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('referralcomplete_view')) {
            return abort(401);
        }
        $referralcomplete = Referralcomplete::findOrFail($id);

        return view('admin.referralcompletes.show', compact('referralcomplete'));
    }


    /**
     * Remove Referralcomplete from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('referralcomplete_delete')) {
            return abort(401);
        }
        $referralcomplete = Referralcomplete::findOrFail($id);
        $referralcomplete->delete();

        return redirect()->route('admin.referralcompletes.index');
    }

    /**
     * Delete all selected Referralcomplete at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('referralcomplete_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Referralcomplete::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Referralcomplete from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('referralcomplete_delete')) {
            return abort(401);
        }
        $referralcomplete = Referralcomplete::onlyTrashed()->findOrFail($id);
        $referralcomplete->restore();

        return redirect()->route('admin.referralcompletes.index');
    }

    /**
     * Permanently delete Referralcomplete from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('referralcomplete_delete')) {
            return abort(401);
        }
        $referralcomplete = Referralcomplete::onlyTrashed()->findOrFail($id);
        $referralcomplete->forceDelete();

        return redirect()->route('admin.referralcompletes.index');
    }
}
