<?php

namespace App\Http\Controllers\Admin;

use App\Avip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAvipsRequest;
use App\Http\Requests\Admin\UpdateAvipsRequest;
use Yajra\DataTables\DataTables;

class AvipsController extends Controller
{
    /**
     * Display a listing of Avip.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('avip_access')) {
            return abort(401);
        }



        if (request()->ajax()) {
            $query = Avip::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('avip_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'avips.id',
                'avips.name',
                'avips.address_1',
                'avips.address_2',
                'avips.bank_name',
                'avips.bank_address',
                'avips.account_no',
                'avips.swift_code',
                'avips.iban_number',
                'avips.bank_code',
                'avips.correspondence_bank_name',
                'avips.correspondence_ac_no',
                'avips.corp_swift_code',
                'avips.ifsc_code',
                'avips.pan_number',
                'avips.oracle_code',
                'avips.rate_details',
                'avips.state',
                'avips.pin_code',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'avip_';
                $routeKey = 'admin.avips';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('address_1', function ($row) {
                return $row->address_1 ? $row->address_1 : '';
            });
            $table->editColumn('address_2', function ($row) {
                return $row->address_2 ? $row->address_2 : '';
            });
            $table->editColumn('bank_name', function ($row) {
                return $row->bank_name ? $row->bank_name : '';
            });
            $table->editColumn('bank_address', function ($row) {
                return $row->bank_address ? $row->bank_address : '';
            });
            $table->editColumn('account_no', function ($row) {
                return $row->account_no ? $row->account_no : '';
            });
            $table->editColumn('swift_code', function ($row) {
                return $row->swift_code ? $row->swift_code : '';
            });
            $table->editColumn('iban_number', function ($row) {
                return $row->iban_number ? $row->iban_number : '';
            });
            $table->editColumn('bank_code', function ($row) {
                return $row->bank_code ? $row->bank_code : '';
            });
            $table->editColumn('correspondence_bank_name', function ($row) {
                return $row->correspondence_bank_name ? $row->correspondence_bank_name : '';
            });
            $table->editColumn('correspondence_ac_no', function ($row) {
                return $row->correspondence_ac_no ? $row->correspondence_ac_no : '';
            });
            $table->editColumn('corp_swift_code', function ($row) {
                return $row->corp_swift_code ? $row->corp_swift_code : '';
            });
            $table->editColumn('ifsc_code', function ($row) {
                return $row->ifsc_code ? $row->ifsc_code : '';
            });
            $table->editColumn('pan_number', function ($row) {
                return $row->pan_number ? $row->pan_number : '';
            });
            $table->editColumn('oracle_code', function ($row) {
                return $row->oracle_code ? $row->oracle_code : '';
            });
            $table->editColumn('rate_details', function ($row) {
                return $row->rate_details ? $row->rate_details : '';
            });
            $table->editColumn('state', function ($row) {
                return $row->state ? $row->state : '';
            });
            $table->editColumn('pin_code', function ($row) {
                return $row->pin_code ? $row->pin_code : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.avips.index');
    }

    public function searchByName()
    {
        if (! Gate::allows('avip_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = Avip::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('avip_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'avips.id',
                'avips.name',
                'avips.address_1',
                'avips.address_2',
                'avips.bank_name',
                'avips.bank_address',
                'avips.account_no',
                'avips.swift_code',
                'avips.iban_number',
                'avips.bank_code',
                'avips.correspondence_bank_name',
                'avips.correspondence_ac_no',
                'avips.corp_swift_code',
                'avips.ifsc_code',
                'avips.pan_number',
                'avips.oracle_code',
                'avips.rate_details',
                'avips.state',
                'avips.pin_code',
            ]);

            if (request('avip_name')) {
                //$query->where('patient_name', request('patient_name'));
                $fsname = explode(" ", request('avip_name'))[0];
                $query->whereRaw("(soundex_match('".$fsname."',avips.name, ' ') OR SOUNDEX(name) LIKE CONCAT(
                    TRIM(TRAILING '0' FROM soundex('".$fsname."')),'%'))");
            }


            ini_set('xdebug.var_display_max_depth', '10');
            ini_set('xdebug.var_display_max_children', '256');
            ini_set('xdebug.var_display_max_data', '1024');

            //var_dump($query->toSql());die;

            $query = $query->get();
            //var_dump($query);
            $match_percent = array();

            if (request('avip_name')) {
                $query = $query->filter(function ($avip) use (&$match_percent){
                    similar_text(strtoupper($avip->name),strtoupper(request('avip_name')),$percent);
                    $match_percent[$avip->id] = $percent;
                    return $percent >= 50;
                });
            }

            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('match_score', '&nbsp;');

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('address_1', function ($row) {
                return $row->address_1 ? $row->address_1 : '';
            });
            $table->editColumn('address_2', function ($row) {
                return $row->address_2 ? $row->address_2 : '';
            });
            $table->editColumn('bank_name', function ($row) {
                return $row->bank_name ? $row->bank_name : '';
            });
            $table->editColumn('bank_address', function ($row) {
                return $row->bank_address ? $row->bank_address : '';
            });
            $table->editColumn('account_no', function ($row) {
                return $row->account_no ? $row->account_no : '';
            });
            $table->editColumn('swift_code', function ($row) {
                return $row->swift_code ? $row->swift_code : '';
            });
            $table->editColumn('iban_number', function ($row) {
                return $row->iban_number ? $row->iban_number : '';
            });
            $table->editColumn('bank_code', function ($row) {
                return $row->bank_code ? $row->bank_code : '';
            });
            $table->editColumn('correspondence_bank_name', function ($row) {
                return $row->correspondence_bank_name ? $row->correspondence_bank_name : '';
            });
            $table->editColumn('correspondence_ac_no', function ($row) {
                return $row->correspondence_ac_no ? $row->correspondence_ac_no : '';
            });
            $table->editColumn('corp_swift_code', function ($row) {
                return $row->corp_swift_code ? $row->corp_swift_code : '';
            });
            $table->editColumn('ifsc_code', function ($row) {
                return $row->ifsc_code ? $row->ifsc_code : '';
            });
            $table->editColumn('pan_number', function ($row) {
                return $row->pan_number ? $row->pan_number : '';
            });
            $table->editColumn('oracle_code', function ($row) {
                return $row->oracle_code ? $row->oracle_code : '';
            });
            $table->editColumn('rate_details', function ($row) {
                return $row->rate_details ? $row->rate_details : '';
            });
            $table->editColumn('state', function ($row) {
                return $row->state ? $row->state : '';
            });
            $table->editColumn('pin_code', function ($row) {
                return $row->pin_code ? $row->pin_code : '';
            });

            $table->editColumn('match_score', function ($row) use ($match_percent){
                //var_dump($match_percent);die;
                $percent = 0;
                if (request('avip_name')) {
                    $percent = round($match_percent[$row->id]);
                }
                return $percent;
            });

            $table->rawColumns(['match_score','massDelete']);

            return $table->make(true);
        }

        return view('admin.avips.index');
    }

    /**
     * Show the form for creating new Avip.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('avip_create')) {
            return abort(401);
        }
        return view('admin.avips.create');
    }

    /**
     * Store a newly created Avip in storage.
     *
     * @param  \App\Http\Requests\StoreAvipsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAvipsRequest $request)
    {
        if (! Gate::allows('avip_create')) {
            return abort(401);
        }
        $avip = Avip::create($request->all());

        foreach ($request->input('message_mappings', []) as $data) {
            $avip->message_mappings()->create($data);
        }


        return redirect()->route('admin.avips.index');
    }


    /**
     * Show the form for editing Avip.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('avip_edit')) {
            return abort(401);
        }
        $avip = Avip::findOrFail($id);

        return view('admin.avips.edit', compact('avip'));
    }

    /**
     * Update Avip in storage.
     *
     * @param  \App\Http\Requests\UpdateAvipsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAvipsRequest $request, $id)
    {
        if (! Gate::allows('avip_edit')) {
            return abort(401);
        }
        $avip = Avip::findOrFail($id);
        $avip->update($request->all());

        $messageMappings           = $avip->message_mappings;
        $currentMessageMappingData = [];
        foreach ($request->input('message_mappings', []) as $index => $data) {
            if (is_integer($index)) {
                $avip->message_mappings()->create($data);
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


        return redirect()->route('admin.avips.index');
    }


    /**
     * Display Avip.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('avip_view')) {
            return abort(401);
        }
        $message_mappings = \App\MessageMapping::where('avip_id', $id)->get();

        $avip = Avip::findOrFail($id);

        return view('admin.avips.show', compact('avip', 'message_mappings'));
    }


    /**
     * Remove Avip from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('avip_delete')) {
            return abort(401);
        }
        $avip = Avip::findOrFail($id);
        $avip->delete();

        return redirect()->route('admin.avips.index');
    }

    /**
     * Delete all selected Avip at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('avip_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Avip::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Avip from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('avip_delete')) {
            return abort(401);
        }
        $avip = Avip::onlyTrashed()->findOrFail($id);
        $avip->restore();

        return redirect()->route('admin.avips.index');
    }

    /**
     * Permanently delete Avip from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('avip_delete')) {
            return abort(401);
        }
        $avip = Avip::onlyTrashed()->findOrFail($id);
        $avip->forceDelete();

        return redirect()->route('admin.avips.index');
    }
}
