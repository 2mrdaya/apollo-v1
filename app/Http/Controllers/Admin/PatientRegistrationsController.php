<?php

namespace App\Http\Controllers\Admin;

use App\PatientRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePatientRegistrationsRequest;
use App\Http\Requests\Admin\UpdatePatientRegistrationsRequest;
use Yajra\DataTables\DataTables;

class PatientRegistrationsController extends Controller
{
    /**
     * Display a listing of PatientRegistration.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('patient_registration_access')) {
            return abort(401);
        }



        if (request()->ajax()) {
            $query = PatientRegistration::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('patient_registration_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'patient_registrations.id',
                'patient_registrations.uhid',
                'patient_registrations.patient_name',
                'patient_registrations.registration_date',
                'patient_registrations.city',
                'patient_registrations.country',
                'patient_registrations.address',
                'patient_registrations.mobile',
                'patient_registrations.email_id',
                'patient_registrations.operator_name',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'patient_registration_';
                $routeKey = 'admin.patient_registrations';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('uhid', function ($row) {
                return $row->uhid ? $row->uhid : '';
            });
            $table->editColumn('patient_name', function ($row) {
                return $row->patient_name ? $row->patient_name : '';
            });
            $table->editColumn('registration_date', function ($row) {
                return $row->registration_date ? $row->registration_date : '';
            });
            $table->editColumn('city', function ($row) {
                return $row->city ? $row->city : '';
            });
            $table->editColumn('country', function ($row) {
                return $row->country ? $row->country : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('mobile', function ($row) {
                return $row->mobile ? $row->mobile : '';
            });
            $table->editColumn('email_id', function ($row) {
                return $row->email_id ? $row->email_id : '';
            });
            $table->editColumn('operator_name', function ($row) {
                return $row->operator_name ? $row->operator_name : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.patient_registrations.index');
    }


    public function searchByNameAndDate()
    {
        if (! Gate::allows('patient_registration_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = PatientRegistration::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                if (! Gate::allows('patient_registration_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'patient_registrations.id',
                'patient_registrations.uhid',
                'patient_registrations.patient_name',
                'patient_registrations.registration_date',
                'patient_registrations.country',
                'patient_registrations.city',
                'patient_registrations.address',
                'patient_registrations.mobile',
                'patient_registrations.email_id',
                'patient_registrations.operator_name',
            ]);

            if (request('patient_name')) {
                //$query->where('patient_name', request('patient_name'));
                $fsname = explode(" ", request('patient_name'))[0];
                $query->whereRaw("(soundex_match('".$fsname."',patient_registrations.patient_name, ' ') OR SOUNDEX(patient_name) LIKE CONCAT(
                    TRIM(TRAILING '0' FROM soundex('".$fsname."')),'%'))");
            }

            if (request('from_date') && request('to_date')) {
                //$query->whereBetweeen('patient_registrations.registration_date', [request('from_date'), request('to_date')]);
                $query->where(function ($query) {
                    $query->whereDate('patient_registrations.registration_date', '>=', request('from_date'))
                          ->WhereDate('patient_registrations.registration_date', '<=', request('to_date'));
                });
            }

            ini_set('xdebug.var_display_max_depth', '10');
            ini_set('xdebug.var_display_max_children', '256');
            ini_set('xdebug.var_display_max_data', '1024');

            //var_dump($query->toSql());die;

            $query = $query->get();
            //var_dump($query);
            $match_percent = array();

            if (request('patient_name')) {
                $query = $query->filter(function ($patient) use (&$match_percent){
                    //var_dump(ucwords($patient->patient_name), ucwords(request('patient_name')));
                    similar_text(strtoupper($patient->patient_name),strtoupper(request('patient_name')),$percent);
                    $match_percent[$patient->id] = $percent;
                    return $percent >= 50;//$patient->patient_name == 'Rajesh Kumar';
                });
            }

            //var_dump($match_percent);//die;

            $table = Datatables::of($query);
            //var_dump($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);

            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('match_score', '&nbsp;');
            /*$table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'patient_registration_';
                $routeKey = 'admin.patient_registrations';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });*/
            $table->editColumn('uhid', function ($row) {
                return $row->uhid ? $row->uhid : '';
            });
            $table->editColumn('patient_name', function ($row) {
                return $row->patient_name ? $row->patient_name : '';
            });
            $table->editColumn('registration_date', function ($row) {
                return $row->registration_date ? $row->registration_date : '';
            });
            $table->editColumn('country', function ($row) {
                return $row->county ? $row->country : '';
            });
            $table->editColumn('city', function ($row) {
                return $row->city ? $row->city : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('mobile', function ($row) {
                return $row->mobile ? $row->mobile : '';
            });
            $table->editColumn('email_id', function ($row) {
                return $row->email_id ? $row->email_id : '';
            });
            $table->editColumn('operator_name', function ($row) use ($match_percent){
                return $row->operator_name ? $row->operator_name : '';

            });

            $table->editColumn('match_score', function ($row) use ($match_percent){
                //var_dump($match_percent);die;
                $percent = 0;
                if (request('patient_name')) {
                    $percent = round($match_percent[$row->id]);
                }
                return $percent;
            });

            $table->rawColumns(['match_score','massDelete']);

            return $table->make(true);
        }

        return view('admin.patient_registrations.index');
    }

    /**
     * Show the form for creating new PatientRegistration.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('patient_registration_create')) {
            return abort(401);
        }
        return view('admin.patient_registrations.create');
    }

    /**
     * Store a newly created PatientRegistration in storage.
     *
     * @param  \App\Http\Requests\StorePatientRegistrationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRegistrationsRequest $request)
    {
        if (! Gate::allows('patient_registration_create')) {
            return abort(401);
        }
        $patient_registration = PatientRegistration::create($request->all());

        foreach ($request->input('message_mappings', []) as $data) {
            $patient_registration->message_mappings()->create($data);
        }


        return redirect()->route('admin.patient_registrations.index');
    }


    /**
     * Show the form for editing PatientRegistration.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('patient_registration_edit')) {
            return abort(401);
        }
        $patient_registration = PatientRegistration::findOrFail($id);

        return view('admin.patient_registrations.edit', compact('patient_registration'));
    }

    /**
     * Update PatientRegistration in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRegistrationsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRegistrationsRequest $request, $id)
    {
        if (! Gate::allows('patient_registration_edit')) {
            return abort(401);
        }
        $patient_registration = PatientRegistration::findOrFail($id);
        $patient_registration->update($request->all());

        $messageMappings           = $patient_registration->message_mappings;
        $currentMessageMappingData = [];
        foreach ($request->input('message_mappings', []) as $index => $data) {
            if (is_integer($index)) {
                $patient_registration->message_mappings()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentMessageMappingData[$id] = $data;
            }
        }
        foreach ($messageMappings as $item) {
            if (isset($currentMessageMappingData[$item->id])) {
                $item->update($currentMessageMappingData[$item->id]);
            } else {
                $item->delete();
            }
        }


        return redirect()->route('admin.patient_registrations.index');
    }


    /**
     * Display PatientRegistration.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('patient_registration_view')) {
            return abort(401);
        }
        $message_mappings = \App\MessageMapping::where('uhid_id', $id)->get();

        $patient_registration = PatientRegistration::findOrFail($id);

        return view('admin.patient_registrations.show', compact('patient_registration', 'message_mappings'));
    }


    /**
     * Remove PatientRegistration from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('patient_registration_delete')) {
            return abort(401);
        }
        $patient_registration = PatientRegistration::findOrFail($id);
        $patient_registration->delete();

        return redirect()->route('admin.patient_registrations.index');
    }

    /**
     * Delete all selected PatientRegistration at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('patient_registration_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = PatientRegistration::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore PatientRegistration from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('patient_registration_delete')) {
            return abort(401);
        }
        $patient_registration = PatientRegistration::onlyTrashed()->findOrFail($id);
        $patient_registration->restore();

        return redirect()->route('admin.patient_registrations.index');
    }

    /**
     * Permanently delete PatientRegistration from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('patient_registration_delete')) {
            return abort(401);
        }
        $patient_registration = PatientRegistration::onlyTrashed()->findOrFail($id);
        $patient_registration->forceDelete();

        return redirect()->route('admin.patient_registrations.index');
    }
}
