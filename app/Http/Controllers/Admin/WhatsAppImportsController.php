<?php

namespace App\Http\Controllers\Admin;

use App\WhatsAppImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreWhatsAppImportsRequest;
use App\Http\Requests\Admin\UpdateWhatsAppImportsRequest;
use Yajra\DataTables\DataTables;

class WhatsAppImportsController extends Controller
{
    /**
     * Display a listing of WhatsAppImport.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('whats_app_import_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = WhatsAppImport::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('whats_app_import_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'whats_app_imports.id',
                'whats_app_imports.source',
                'whats_app_imports.message',
                'whats_app_imports.intimation_date_time',
                'whats_app_imports.patient_name',
                'whats_app_imports.referrer_name',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'whats_app_import_';
                $routeKey = 'admin.whats_app_imports';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('source', function ($row) {
                return $row->source ? $row->source : '';
            });
            $table->editColumn('message', function ($row) {
                return $row->message ? $row->message : '';
            });
            $table->editColumn('intimation_date_time', function ($row) {
                return $row->intimation_date_time ? $row->intimation_date_time : '';
            });
            $table->editColumn('patient_name', function ($row) {
                return $row->patient_name ? $row->patient_name : '';
            });
            $table->editColumn('referrer_name', function ($row) {
                return $row->referrer_name ? $row->referrer_name : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.whats_app_imports.index');
    }

    /**
     * Show the form for creating new WhatsAppImport.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('whats_app_import_create')) {
            return abort(401);
        }
        return view('admin.whats_app_imports.create');
    }

    /**
     * Store a newly created WhatsAppImport in storage.
     *
     * @param  \App\Http\Requests\StoreWhatsAppImportsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWhatsAppImportsRequest $request)
    {
        if (! Gate::allows('whats_app_import_create')) {
            return abort(401);
        }
        $whats_app_import = WhatsAppImport::create($request->all());



        return redirect()->route('admin.whats_app_imports.index');
    }


    /**
     * Show the form for editing WhatsAppImport.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('whats_app_import_edit')) {
            return abort(401);
        }
        $whats_app_import = WhatsAppImport::findOrFail($id);

        return view('admin.whats_app_imports.edit', compact('whats_app_import'));
    }

    /**
     * Update WhatsAppImport in storage.
     *
     * @param  \App\Http\Requests\UpdateWhatsAppImportsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWhatsAppImportsRequest $request, $id)
    {
        if (! Gate::allows('whats_app_import_edit')) {
            return abort(401);
        }
        $whats_app_import = WhatsAppImport::findOrFail($id);
        $whats_app_import->update($request->all());



        return redirect()->route('admin.whats_app_imports.index');
    }


    /**
     * Display WhatsAppImport.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('whats_app_import_view')) {
            return abort(401);
        }
        $whats_app_import = WhatsAppImport::findOrFail($id);

        return view('admin.whats_app_imports.show', compact('whats_app_import'));
    }


    /**
     * Remove WhatsAppImport from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('whats_app_import_delete')) {
            return abort(401);
        }
        $whats_app_import = WhatsAppImport::findOrFail($id);
        $whats_app_import->delete();

        return redirect()->route('admin.whats_app_imports.index');
    }

    /**
     * Delete all selected WhatsAppImport at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('whats_app_import_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = WhatsAppImport::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore WhatsAppImport from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('whats_app_import_delete')) {
            return abort(401);
        }
        $whats_app_import = WhatsAppImport::onlyTrashed()->findOrFail($id);
        $whats_app_import->restore();

        return redirect()->route('admin.whats_app_imports.index');
    }

    /**
     * Permanently delete WhatsAppImport from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('whats_app_import_delete')) {
            return abort(401);
        }
        $whats_app_import = WhatsAppImport::onlyTrashed()->findOrFail($id);
        $whats_app_import->forceDelete();

        return redirect()->route('admin.whats_app_imports.index');
    }
}
