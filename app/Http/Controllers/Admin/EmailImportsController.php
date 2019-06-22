<?php

namespace App\Http\Controllers\Admin;

use App\EmailImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEmailImportsRequest;
use App\Http\Requests\Admin\UpdateEmailImportsRequest;
use Yajra\DataTables\DataTables;

class EmailImportsController extends Controller
{
    /**
     * Display a listing of EmailImport.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('email_import_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = EmailImport::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('email_import_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'email_imports.id',
                'email_imports.source',
                'email_imports.message',
                'email_imports.intimation_date_time',
                'email_imports.patient_name',
                'email_imports.referrer_name',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'email_import_';
                $routeKey = 'admin.email_imports';

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

        return view('admin.email_imports.index');
    }

    /**
     * Show the form for creating new EmailImport.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('email_import_create')) {
            return abort(401);
        }
        return view('admin.email_imports.create');
    }

    /**
     * Store a newly created EmailImport in storage.
     *
     * @param  \App\Http\Requests\StoreEmailImportsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmailImportsRequest $request)
    {
        if (! Gate::allows('email_import_create')) {
            return abort(401);
        }
        $email_import = EmailImport::create($request->all());



        return redirect()->route('admin.email_imports.index');
    }


    /**
     * Show the form for editing EmailImport.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('email_import_edit')) {
            return abort(401);
        }
        $email_import = EmailImport::findOrFail($id);

        return view('admin.email_imports.edit', compact('email_import'));
    }

    /**
     * Update EmailImport in storage.
     *
     * @param  \App\Http\Requests\UpdateEmailImportsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmailImportsRequest $request, $id)
    {
        if (! Gate::allows('email_import_edit')) {
            return abort(401);
        }
        $email_import = EmailImport::findOrFail($id);
        $email_import->update($request->all());



        return redirect()->route('admin.email_imports.index');
    }


    /**
     * Display EmailImport.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('email_import_view')) {
            return abort(401);
        }
        $email_import = EmailImport::findOrFail($id);

        return view('admin.email_imports.show', compact('email_import'));
    }


    /**
     * Remove EmailImport from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('email_import_delete')) {
            return abort(401);
        }
        $email_import = EmailImport::findOrFail($id);
        $email_import->delete();

        return redirect()->route('admin.email_imports.index');
    }

    /**
     * Delete all selected EmailImport at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('email_import_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = EmailImport::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore EmailImport from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('email_import_delete')) {
            return abort(401);
        }
        $email_import = EmailImport::onlyTrashed()->findOrFail($id);
        $email_import->restore();

        return redirect()->route('admin.email_imports.index');
    }

    /**
     * Permanently delete EmailImport from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('email_import_delete')) {
            return abort(401);
        }
        $email_import = EmailImport::onlyTrashed()->findOrFail($id);
        $email_import->forceDelete();

        return redirect()->route('admin.email_imports.index');
    }
}
