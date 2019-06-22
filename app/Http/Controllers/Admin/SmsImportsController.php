<?php

namespace App\Http\Controllers\Admin;

use App\SmsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSmsImportsRequest;
use App\Http\Requests\Admin\UpdateSmsImportsRequest;
use Yajra\DataTables\DataTables;

class SmsImportsController extends Controller
{
    /**
     * Display a listing of SmsImport.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('sms_import_access')) {
            return abort(401);
        }



        if (request()->ajax()) {
            $query = SmsImport::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('sms_import_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'sms_imports.id',
                'sms_imports.source',
                'sms_imports.message',
                'sms_imports.intimation_date_time',
                'sms_imports.patient_name',
                'sms_imports.referrer_name',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'sms_import_';
                $routeKey = 'admin.sms_imports';

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

        return view('admin.sms_imports.index');
    }

    /**
     * Show the form for creating new SmsImport.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('sms_import_create')) {
            return abort(401);
        }
        return view('admin.sms_imports.create');
    }

    /**
     * Store a newly created SmsImport in storage.
     *
     * @param  \App\Http\Requests\StoreSmsImportsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSmsImportsRequest $request)
    {
        if (! Gate::allows('sms_import_create')) {
            return abort(401);
        }
        $sms_import = SmsImport::create($request->all());



        return redirect()->route('admin.sms_imports.index');
    }


    /**
     * Show the form for editing SmsImport.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('sms_import_edit')) {
            return abort(401);
        }
        $sms_import = SmsImport::findOrFail($id);

         //var_dump($request);die;
         $patient_name = ImportCsvHelper::FindNames('find_patient',$sms_import->message);
         $avip_name = ImportCsvHelper::FindNames('find_avip',$sms_import->message);
         $from_date = $sms_import->sms_date_time;
         $to_date = Carbon::parse($sms_import->sms_date_time)->addDays(10);

        return view('admin.sms_imports.edit', compact('sms_import'));
    }

    /**
     * Update SmsImport in storage.
     *
     * @param  \App\Http\Requests\UpdateSmsImportsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSmsImportsRequest $request, $id)
    {
        if (! Gate::allows('sms_import_edit')) {
            return abort(401);
        }
        $sms_import = SmsImport::findOrFail($id);
        $sms_import->update($request->all());



        return redirect()->route('admin.sms_imports.index');
    }


    /**
     * Display SmsImport.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('sms_import_view')) {
            return abort(401);
        }
        $sms_import = SmsImport::findOrFail($id);

        return view('admin.sms_imports.show', compact('sms_import'));
    }


    /**
     * Remove SmsImport from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('sms_import_delete')) {
            return abort(401);
        }
        $sms_import = SmsImport::findOrFail($id);
        $sms_import->delete();

        return redirect()->route('admin.sms_imports.index');
    }

    /**
     * Delete all selected SmsImport at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('sms_import_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = SmsImport::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore SmsImport from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('sms_import_delete')) {
            return abort(401);
        }
        $sms_import = SmsImport::onlyTrashed()->findOrFail($id);
        $sms_import->restore();

        return redirect()->route('admin.sms_imports.index');
    }

    /**
     * Permanently delete SmsImport from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('sms_import_delete')) {
            return abort(401);
        }
        $sms_import = SmsImport::onlyTrashed()->findOrFail($id);
        $sms_import->forceDelete();

        return redirect()->route('admin.sms_imports.index');
    }
}
