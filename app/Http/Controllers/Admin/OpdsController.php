<?php

namespace App\Http\Controllers\Admin;

use App\Opd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOpdsRequest;
use App\Http\Requests\Admin\UpdateOpdsRequest;
use Yajra\DataTables\DataTables;

class OpdsController extends Controller
{
    /**
     * Display a listing of Opd.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('opd_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Opd::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('opd_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'opds.id',
                'opds.bill_date',
                'opds.bill_no',
                'opds.uhid',
                'opds.patient_number',
                'opds.pname',
                'opds.bill_type',
                'opds.bill_amount',
                'opds.discount_amount',
                'opds.net_amount',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'opd_';
                $routeKey = 'admin.opds';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('bill_date', function ($row) {
                return $row->bill_date ? $row->bill_date : '';
            });
            $table->editColumn('bill_no', function ($row) {
                return $row->bill_no ? $row->bill_no : '';
            });
            $table->editColumn('uhid', function ($row) {
                return $row->uhid ? $row->uhid : '';
            });
            $table->editColumn('patient_number', function ($row) {
                return $row->patient_number ? $row->patient_number : '';
            });
            $table->editColumn('pname', function ($row) {
                return $row->pname ? $row->pname : '';
            });
            $table->editColumn('bill_type', function ($row) {
                return $row->bill_type ? $row->bill_type : '';
            });
            $table->editColumn('bill_amount', function ($row) {
                return $row->bill_amount ? $row->bill_amount : '';
            });
            $table->editColumn('discount_amount', function ($row) {
                return $row->discount_amount ? $row->discount_amount : '';
            });
            $table->editColumn('net_amount', function ($row) {
                return $row->net_amount ? $row->net_amount : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.opds.index');
    }

    /**
     * Show the form for creating new Opd.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('opd_create')) {
            return abort(401);
        }
        return view('admin.opds.create');
    }

    /**
     * Store a newly created Opd in storage.
     *
     * @param  \App\Http\Requests\StoreOpdsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOpdsRequest $request)
    {
        if (! Gate::allows('opd_create')) {
            return abort(401);
        }
        $opd = Opd::create($request->all());



        return redirect()->route('admin.opds.index');
    }


    /**
     * Show the form for editing Opd.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('opd_edit')) {
            return abort(401);
        }
        $opd = Opd::findOrFail($id);

        return view('admin.opds.edit', compact('opd'));
    }

    /**
     * Update Opd in storage.
     *
     * @param  \App\Http\Requests\UpdateOpdsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOpdsRequest $request, $id)
    {
        if (! Gate::allows('opd_edit')) {
            return abort(401);
        }
        $opd = Opd::findOrFail($id);
        $opd->update($request->all());



        return redirect()->route('admin.opds.index');
    }


    /**
     * Display Opd.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('opd_view')) {
            return abort(401);
        }
        $opd = Opd::findOrFail($id);

        return view('admin.opds.show', compact('opd'));
    }


    /**
     * Remove Opd from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('opd_delete')) {
            return abort(401);
        }
        $opd = Opd::findOrFail($id);
        $opd->delete();

        return redirect()->route('admin.opds.index');
    }

    /**
     * Delete all selected Opd at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('opd_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Opd::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Opd from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('opd_delete')) {
            return abort(401);
        }
        $opd = Opd::onlyTrashed()->findOrFail($id);
        $opd->restore();

        return redirect()->route('admin.opds.index');
    }

    /**
     * Permanently delete Opd from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('opd_delete')) {
            return abort(401);
        }
        $opd = Opd::onlyTrashed()->findOrFail($id);
        $opd->forceDelete();

        return redirect()->route('admin.opds.index');
    }
}
