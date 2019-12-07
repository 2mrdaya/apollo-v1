<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\ReferralDataFinal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReferralDataFinalsRequest;
use App\Http\Requests\Admin\UpdateReferralDataFinalsRequest;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

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
            $query->with("ip");
            $query->with("message");
            $query->with("patient");
            $query->with("avip");
            $template = 'actionsTemplate1';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('referral_data_final_delete')) {
            return abort(401);
        }

                $template = 'restoreTemplate1';
            }

            $filterMonth = request()['columns'][1]['search']['value'];

            $query->select([
                'id as row_id',
                'vendor',
                'month',
                'msg_desc',
                'doi_as_per_whats_app',
                'doi_as_per_sw',
                'area',
                'uhid',
                'bill_no',
                'dr_name_aic',
                'fee_percent',
                'aic_fee',
                'oracle_code',
                'pateint_name_msg',
                'avip_name_msg',
                'remarks',
                'approve',
                'status',
                'ip_id',
                'message_id',
                'patient_id',
                'avip_id',
                'paid_month',
                'bonus',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$row_id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->addColumn('patient_match', '&nbsp;');
            $table->addColumn('avip_match', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'referral_data_final_';
                $routeKey = 'admin.referral_data_finals';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('month', function ($row) {
                return $row->month ? $row->month : '';
            });
            $table->editColumn('paid_month', function ($row) {
                return $row->paid_month ? $row->paid_month : '';
            });
            $table->editColumn('vendor', function ($row) {
                return $row->vendor ? $row->vendor : '';
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
            $table->editColumn('bill_no', function ($row) {
                return $row->bill_no ? $row->bill_no : '';
            });
            $table->editColumn('dr_name_aic', function ($row) {
                return $row->dr_name_aic ? $row->dr_name_aic : '';
            });
            $table->editColumn('fee_percent', function ($row) {
                return $row->fee_percent ? $row->fee_percent : '';
            });
            $table->editColumn('aic_fee', function ($row) {
                return $row->aic_fee ? $row->aic_fee : '';
            });
            $table->editColumn('bonus', function ($row) {
                return $row->bonus ? $row->bonus : '';
            });
            $table->editColumn('oracle_code', function ($row) {
                return $row->oracle_code ? $row->oracle_code : '';
            });
            $table->editColumn('pateint_name_msg', function ($row) {
                return $row->pateint_name_msg ? $row->pateint_name_msg : '';
            });
            $table->editColumn('avip_name_msg', function ($row) {
                return $row->avip_name_msg ? $row->avip_name_msg : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });
            $table->editColumn('approve', function ($row) {
                return \Form::checkbox("approve", 0, $row->approve == 1);
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });

            $table->rawColumns(['actions','massDelete','approve']);

            //var_dump("Hi");die;

            $table->editColumn('patient_match', function ($row) {
                if ($row->patient && $row->patient->patient_name) {
                    similar_text(strtoupper($row->patient->patient_name),strtoupper($row->pateint_name_msg),$percent);
                    return round($percent,0);
                }
                return 0;
            });

            $table->editColumn('avip_match', function ($row) {
                if ($row->avip && $row->avip->name) {
                    similar_text(strtoupper($row->avip->name),strtoupper($row->avip_name_msg),$percent);
                    return round($percent,0);
                }
                return 0;
            });

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

        $ips = \App\Ip::get()->pluck('bill_no', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $messages = \App\MessageMapping::get()->pluck('source', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $patients = \App\PatientRegistration::get()->pluck('uhid', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $avips = \App\Avip::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $enum_vendor = ReferralDataFinal::$enum_vendor;
        $enum_status = ReferralDataFinal::$enum_status;

        return view('admin.referral_data_finals.create', compact('enum_vendor', 'enum_status', 'ips', 'messages', 'patients', 'avips'));
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

        //$ips = \App\Ip::get()->pluck('ip_no', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        //$messages = \App\MessageMapping::get()->pluck('source', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        //$patients = \App\PatientRegistration::get()->pluck('uhid', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        //$avips = \App\Avip::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $enum_vendor = ReferralDataFinal::$enum_vendor;
        $enum_status = ReferralDataFinal::$enum_status;

        $referral_data_final = ReferralDataFinal::findOrFail($id);

        return view('admin.referral_data_finals.edit', compact('referral_data_final', 'enum_vendor', 'enum_status'));//, 'ips', 'messages', 'patients', 'avips'));
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
        $this->processOne($referral_data_final->id);


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

    /**
     * Process ReferralDataFinal Single.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function processOne($id)
    {
        $query = DB::select(DB::raw("SELECT
            referral_data_finals.id as referral_id, referral_data_finals.doi_as_per_whats_app, referral_data_finals.doi_as_per_sw,
            referral_data_finals.dr_name_aic, referral_data_finals.uhid,
            referral_data_finals.doi_as_per_whats_app, referral_data_finals.doi_as_per_sw,
            ip.id as ip_id, ip.bill_no,
            patient.id as patient_id, patient.uhid, patient.registration_date, patient.patient_name,
            message.id as message_id, message.message, message.channel, message.intimation_date_time,
            message.patient_name as patient_name_msg, message.referrer_name as referrer_name_msg,
            avip.id as avip_id, avip.name as name_avip
            FROM referral_data_finals
            left join ips as ip on ip.bill_no = referral_data_finals.bill_no
            left join patient_registrations as patient on patient.uhid = referral_data_finals.uhid
            left join message_mappings as message on message.message = referral_data_finals.msg_desc
            left join avips as avip on avip.oracle_code = referral_data_finals.oracle_code and CHAR_LENGTH(avip.oracle_code)>=2
            where referral_data_finals.id=".$id
        ));

        foreach ($query as $row) {
            $this->process($row);
        }
        echo "Done Successfully!";
        return redirect()->route('admin.referral_data_finals.index');
    }

    /**
     * Process ReferralDataFinal Month.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function processMonth($month)
    {
        $query = DB::select(DB::raw("SELECT
            referral_data_finals.id as referral_id, referral_data_finals.doi_as_per_whats_app, referral_data_finals.doi_as_per_sw,
            referral_data_finals.dr_name_aic, referral_data_finals.uhid,
            referral_data_finals.doi_as_per_whats_app, referral_data_finals.doi_as_per_sw,
            ip.id as ip_id, ip.bill_no,
            patient.id as patient_id, patient.uhid, patient.registration_date, patient.patient_name,
            message.id as message_id, message.message, message.channel, message.intimation_date_time,
            message.patient_name as patient_name_msg, message.referrer_name as referrer_name_msg,
            avip.id as avip_id, avip.name as name_avip
            FROM referral_data_finals
            left join ips as ip on ip.bill_no = referral_data_finals.bill_no
            left join patient_registrations as patient on patient.uhid = referral_data_finals.uhid
            left join message_mappings as message on message.message = referral_data_finals.msg_desc
            left join avips as avip on avip.oracle_code = referral_data_finals.oracle_code and CHAR_LENGTH(avip.oracle_code)>=2
            where referral_data_finals.month='".$month."'"
        ));

        foreach ($query as $row) {
            $this->process($row);
        }
        echo "Done Successfully!";
        return redirect()->route('admin.referral_data_finals.index');
    }

    /**
     * Process ReferralDataFinal Month.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function process($row)
    {

        $errors = [];
        //var_dump($row);//die;
        $patient_id = isset($row->patient_id) ? $row->patient_id : 0;
        $avip_id = isset($row->avip_id) ? $row->avip_id : 0;
        $message_id = isset($row->message_id) ? $row->message_id : 0;
        $ip_id = isset($row->ip_id) ? $row->ip_id : 0;

        //update referral_data_finals table
        if ($patient_id) {
            $query = DB::select(DB::raw("UPDATE referral_data_finals set
                patient_id = ".$patient_id."
                where id=".$row->referral_id
            ));
        }
        if ($avip_id) {
            $query = DB::select(DB::raw("UPDATE referral_data_finals set
                avip_id = ".$avip_id."
                where id=".$row->referral_id
            ));
        }
        if ($message_id) {
            $query = DB::select(DB::raw("UPDATE referral_data_finals set
                message_id = ".$message_id."
                where id=".$row->referral_id
            ));
        }
        if ($ip_id) {
            $query = DB::select(DB::raw("UPDATE referral_data_finals set
                ip_id = ".$ip_id."
                where id=".$row->referral_id
            ));
        }

        //find message by uhid
        $query = DB::select(DB::raw("SELECT
            message.id, message.message, message.channel, message.intimation_date_time,
            message.patient_name as patient_name_msg, message.referrer_name as referrer_name_msg,
            LEVENSHTEIN('".$row->patient_name."', message.patient_name) as distance
            FROM message_mappings as message
            join patient_registrations as patient on patient.id = message.uhid_id
            where patient.uhid='".$row->uhid."' order by intimation_date_time ASC limit 1"
        ));

        foreach ($query as $row_msg) {
            //check message in mapping table
            if($row->message && trim($row->message) != trim($row_msg->message)){
                array_push($errors, 'MsgInMappingNotMaching');
            }
            else {
                $row->message_id = $row_msg->id;
                $row->message = $row_msg->message;
                $row->registration_date = $row_msg->intimation_date_time;
                $row->patient_name_msg = $row_msg->patient_name_msg;
                $row->referrer_name_msg = $row_msg->referrer_name_msg;
            }
            break;
        }

        $search_in_whatsapp = false;
        if ($row->message == null || ($row->doi_as_per_whats_app && $row->doi_as_per_sw && $row->doi_as_per_sw >= $row->registration_date && stripos($row->message, 'Mail') == false)) {
            $search_in_whatsapp = true;
        }

        //match name if message not matched
        if ($search_in_whatsapp && $row->patient_name != '' && $row->patient_name != null) {
            $query = DB::select(DB::raw("SELECT
                message.id, message.message, message.channel, message.intimation_date_time,
                message.patient_name as patient_name_msg, message.referrer_name as referrer_name_msg,
                LEVENSHTEIN('".$row->patient_name."', message.patient_name) as distance
                FROM message_mappings as message
                where channel = 'WhatsApp' and date(message.intimation_date_time) = date('".$row->doi_as_per_whats_app."')
                order by distance ASC limit 1"
            ));

            foreach ($query as $row_msg) {
                $row->message_id = $row_msg->id;
                $row->message = $row_msg->message;
                $row->registration_date = $row_msg->intimation_date_time;
                $row->patient_name_msg = $row_msg->patient_name_msg;
                $row->referrer_name_msg = $row_msg->referrer_name_msg;
                break;
            }
        }

        //check patient available
        if($row->registration_date == null) {
            array_push($errors, 'PatientNotAvailable');
        }

        //check registration date is priop than message intimation
        if($row->registration_date && $row->registration_date <= $row->intimation_date_time) {
            array_push($errors, 'LateIntimation');
        }

        //check bill no ip/opd file
        if($row->bill_no == null) {
            array_push($errors, 'NotInIp');
        }

        //check match percentage
        similar_text(strtoupper($row->patient_name),strtoupper($row->patient_name_msg),$percent);
        if($row->patient_name && $row->patient_name_msg && $percent < 70) {
            array_push($errors, 'MatchPercent<70');
        }

        //check avip table
        if($row->name_avip == null && trim($row->name_avip)=='') {
            array_push($errors, 'AvipNotAvailable');
        }

        $row->message = str_replace("'","''",$row->message);
        $row->patient_name_msg = str_replace("'","''",$row->patient_name_msg);
        $row->referrer_name_msg = str_replace("'","''",$row->referrer_name_msg);
        //update referral_data_finals table
        $query = DB::select(DB::raw("UPDATE referral_data_finals set
            msg_desc = '".$row->message."' ,
            pateint_name_msg = '".$row->patient_name_msg."' ,
            avip_name_msg = '".$row->referrer_name_msg."'
            where id=".$row->referral_id
        ));

         //check duplicate uhids
         if($row->uhid != null && trim($row->uhid) != '') {
            $query = DB::select(DB::raw("SELECT
                uhid
                FROM referral_data_finals
                where uhid='".$row->uhid."'"
            ));

            if(count($query)>1) {
                array_push($errors, 'MultipleBills');
            }
         }

        //check duplicate uhids
        if($row->message != null && trim($row->message) != '') {
            $query = DB::select(DB::raw("SELECT
                uhid
                FROM referral_data_finals
                left join message_mappings as message on trim(message.message) = trim(referral_data_finals.msg_desc)
                where trim(msg_desc)='".trim($row->message)."'"
            ));

            if(count($query)>1) {
                array_push($errors, 'MultipleMessage');
            }
        }

        //check message table
        if($row->message == null && trim($row->message)=='') {
            array_push($errors, 'MessageNotFound');
        }

        $status = 'Ok';
        if(count($errors)>0) {
            $status = 'Other';
        }

        //update referral_data_finals table
        $query = DB::select(DB::raw("UPDATE referral_data_finals set
            status = '".$status."' ,
            remarks = '".implode(",",$errors)."'
            where id=".$row->referral_id
        ));
    }

}


