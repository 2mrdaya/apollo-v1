<?php

namespace App\Http\Controllers\Admin;

use App\Gstimport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGstimportsRequest;
use App\Http\Requests\Admin\UpdateGstimportsRequest;
use Yajra\DataTables\DataTables;

class GstimportsController extends Controller
{
    /**
     * Display a listing of Gstimport.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('gstimport_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Gstimport::query();
            $template = 'actionsTemplate';
            
            $query->select([
                'gstimports.id',
                'gstimports.bill_no',
                'gstimports.gst_amout',
                'gstimports.booking_month',
                'gstimports.payment_month',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'gstimport_';
                $routeKey = 'admin.gstimports';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('bill_no', function ($row) {
                return $row->bill_no ? $row->bill_no : '';
            });
            $table->editColumn('gst_amout', function ($row) {
                return $row->gst_amout ? $row->gst_amout : '';
            });
            $table->editColumn('booking_month', function ($row) {
                return $row->booking_month ? $row->booking_month : '';
            });
            $table->editColumn('payment_month', function ($row) {
                return $row->payment_month ? $row->payment_month : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.gstimports.index');
    }

    /**
     * Show the form for creating new Gstimport.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('gstimport_create')) {
            return abort(401);
        }
        return view('admin.gstimports.create');
    }

    /**
     * Store a newly created Gstimport in storage.
     *
     * @param  \App\Http\Requests\StoreGstimportsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGstimportsRequest $request)
    {
        if (! Gate::allows('gstimport_create')) {
            return abort(401);
        }
        $gstimport = Gstimport::create($request->all());



        return redirect()->route('admin.gstimports.index');
    }


    /**
     * Show the form for editing Gstimport.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('gstimport_edit')) {
            return abort(401);
        }
        $gstimport = Gstimport::findOrFail($id);

        return view('admin.gstimports.edit', compact('gstimport'));
    }

    /**
     * Update Gstimport in storage.
     *
     * @param  \App\Http\Requests\UpdateGstimportsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGstimportsRequest $request, $id)
    {
        if (! Gate::allows('gstimport_edit')) {
            return abort(401);
        }
        $gstimport = Gstimport::findOrFail($id);
        $gstimport->update($request->all());



        return redirect()->route('admin.gstimports.index');
    }


    /**
     * Display Gstimport.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('gstimport_view')) {
            return abort(401);
        }
        $gstimport = Gstimport::findOrFail($id);

        return view('admin.gstimports.show', compact('gstimport'));
    }


    /**
     * Remove Gstimport from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('gstimport_delete')) {
            return abort(401);
        }
        $gstimport = Gstimport::findOrFail($id);
        $gstimport->delete();

        return redirect()->route('admin.gstimports.index');
    }

    /**
     * Delete all selected Gstimport at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('gstimport_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Gstimport::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
