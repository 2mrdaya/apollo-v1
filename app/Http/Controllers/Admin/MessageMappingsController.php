<?php

namespace App\Http\Controllers\Admin;

use App\MessageMapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMessageMappingsRequest;
use App\Http\Requests\Admin\UpdateMessageMappingsRequest;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Helpers\ImportCsvHelper;
use DB;

class MessageMappingsController extends Controller
{
    /**
     * Display a listing of MessageMapping.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('message_mapping_access')) {
            return abort(401);
        }



        if (request()->ajax()) {
            $query = MessageMapping::query();
            $query->with("uhid");
            $query->with("avip");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('message_mapping_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'message_mappings.id',
                'message_mappings.channel',
                'message_mappings.message',
                'message_mappings.source',
                'message_mappings.patient_name',
                'message_mappings.referrer_name',
                'message_mappings.intimation_date_time',
                'message_mappings.uhid_id',
                'message_mappings.avip_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'message_mapping_';
                $routeKey = 'admin.message_mappings';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('channel', function ($row) {
                return $row->channel ? $row->channel : '';
            });
            $table->editColumn('message', function ($row) {
                return $row->message ? $row->message : '';
            });
            $table->editColumn('source', function ($row) {
                return $row->source ? $row->source : '';
            });
            $table->editColumn('patient_name', function ($row) {
                return $row->patient_name ? $row->patient_name : '';
            });
            $table->editColumn('referrer_name', function ($row) {
                return $row->referrer_name ? $row->referrer_name : '';
            });
            $table->editColumn('intimation_date_time', function ($row) {
                return $row->intimation_date_time ? $row->intimation_date_time : '';
            });
            $table->editColumn('uhid.uhid', function ($row) {
                return $row->uhid ? $row->uhid->uhid : '';
            });
            $table->editColumn('avip.name', function ($row) {
                return $row->avip ? $row->avip->name : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.message_mappings.index');
    }

    /**
     * Show the form for creating new MessageMapping.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('message_mapping_create')) {
            return abort(401);
        }

        $uhids = \App\PatientRegistration::get()->pluck('uhid', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $avips = \App\Avip::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $enum_channel = MessageMapping::$enum_channel;

        return view('admin.message_mappings.create', compact('enum_channel', 'uhids', 'avips'));
    }

    /**
     * Store a newly created MessageMapping in storage.
     *
     * @param  \App\Http\Requests\StoreMessageMappingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageMappingsRequest $request)
    {
        if (! Gate::allows('message_mapping_create')) {
            return abort(401);
        }
        $message_mapping = MessageMapping::create($request->all());



        return redirect()->route('admin.message_mappings.index');
    }


    /**
     * Show the form for editing MessageMapping.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('message_mapping_edit')) {
            return abort(401);
        }

        $uhids = \App\PatientRegistration::get()->pluck('uhid', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $avips = \App\Avip::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $enum_channel = MessageMapping::$enum_channel;

        $message_mapping = MessageMapping::findOrFail($id);

         //var_dump($request);die;
         $patient_name = ImportCsvHelper::FindNames('find_patient',$message_mapping->message);
         $avip_name = ImportCsvHelper::FindNames('find_avip',$message_mapping->message);
         $from_date = $message_mapping->intimation_date_time;
         $to_date = Carbon::parse($message_mapping->intimation_date_time)->addDays(10);

        return view('admin.message_mappings.edit', compact('message_mapping', 'enum_channel', 'uhids', 'avips', 'patient_name', 'avip_name', 'from_date', 'to_date'));
    }

    /**
     * Update MessageMapping in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageMappingsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageMappingsRequest $request, $id)
    {
        if (! Gate::allows('message_mapping_edit')) {
            return abort(401);
        }
        $message_mapping = MessageMapping::findOrFail($id);
        $message_mapping->update($request->all());



        return redirect()->route('admin.message_mappings.index');
    }


    /**
     * Display MessageMapping.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('message_mapping_view')) {
            return abort(401);
        }
        $message_mapping = MessageMapping::findOrFail($id);

        return view('admin.message_mappings.show', compact('message_mapping'));
    }


    /**
     * Remove MessageMapping from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('message_mapping_delete')) {
            return abort(401);
        }
        $message_mapping = MessageMapping::findOrFail($id);
        $message_mapping->delete();

        return redirect()->route('admin.message_mappings.index');
    }

    /**
     * Delete all selected MessageMapping at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('message_mapping_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = MessageMapping::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore MessageMapping from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('message_mapping_delete')) {
            return abort(401);
        }
        $message_mapping = MessageMapping::onlyTrashed()->findOrFail($id);
        $message_mapping->restore();

        return redirect()->route('admin.message_mappings.index');
    }

    /**
     * Permanently delete MessageMapping from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('message_mapping_delete')) {
            return abort(401);
        }
        $message_mapping = MessageMapping::onlyTrashed()->findOrFail($id);
        $message_mapping->forceDelete();

        return redirect()->route('admin.message_mappings.index');
    }


    public function updateNames()
    {
        $entries = MessageMapping::whereNull('uhid_id')->get();
        $ctr = 0;
        foreach ($entries as $entry) {
            $patient_name = ImportCsvHelper::FindNames('find_patient', $entry['message']);
            $avip_name = ImportCsvHelper::FindNames('find_avip', $entry['message']);

            $patient_name = trim(preg_replace('/\s+/',' ', $patient_name));
            $avip_name = trim(preg_replace('/\s+/',' ', $avip_name));

            echo($entry['message'].'=='.$patient_name.'->'.$avip_name.'->'.$ctr++.'</BR>');

            $entry->update(['patient_name' => $patient_name, 'referrer_name' => $avip_name]);
        }

    }
}
