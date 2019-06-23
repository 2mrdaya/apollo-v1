<?php

namespace App\Http\Controllers\Admin;

use App\Ip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreIpsRequest;
use App\Http\Requests\Admin\UpdateIpsRequest;
use Yajra\DataTables\DataTables;

class IpsController extends Controller
{
    /**
     * Display a listing of Ip.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('ip_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Ip::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('ip_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'ips.id',
                'ips.uhid',
                'ips.bill_date',
                'ips.ip_no',
                'ips.patient_name',
                'ips.country',
                'ips.state',
                'ips.city',
                'ips.bill_no',
                'ips.customer_name',
                'ips.total_service_amount',
                'ips.tax_amount',
                'ips.total_bill_amount',
                'ips.tcs_tax',
                'ips.discount_amount',
                'ips.doctor_name',
                'ips.speciality',
                'ips.surgical_package_name',
                'ips.total_pharmacy_amount',
                'ips.pharmacy_amt',
                'ips.total_consumables',
                'ips.bill_to',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'ip_';
                $routeKey = 'admin.ips';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('uhid', function ($row) {
                return $row->uhid ? $row->uhid : '';
            });
            $table->editColumn('bill_date', function ($row) {
                return $row->bill_date ? $row->bill_date : '';
            });
            $table->editColumn('ip_no', function ($row) {
                return $row->ip_no ? $row->ip_no : '';
            });
            $table->editColumn('patient_name', function ($row) {
                return $row->patient_name ? $row->patient_name : '';
            });
            $table->editColumn('country', function ($row) {
                return $row->country ? $row->country : '';
            });
            $table->editColumn('state', function ($row) {
                return $row->state ? $row->state : '';
            });
            $table->editColumn('city', function ($row) {
                return $row->city ? $row->city : '';
            });
            $table->editColumn('bill_no', function ($row) {
                return $row->bill_no ? $row->bill_no : '';
            });
            $table->editColumn('customer_name', function ($row) {
                return $row->customer_name ? $row->customer_name : '';
            });
            $table->editColumn('total_service_amount', function ($row) {
                return $row->total_service_amount ? $row->total_service_amount : '';
            });
            $table->editColumn('tax_amount', function ($row) {
                return $row->tax_amount ? $row->tax_amount : '';
            });
            $table->editColumn('total_bill_amount', function ($row) {
                return $row->total_bill_amount ? $row->total_bill_amount : '';
            });
            $table->editColumn('tcs_tax', function ($row) {
                return $row->tcs_tax ? $row->tcs_tax : '';
            });
            $table->editColumn('discount_amount', function ($row) {
                return $row->discount_amount ? $row->discount_amount : '';
            });
            $table->editColumn('doctor_name', function ($row) {
                return $row->doctor_name ? $row->doctor_name : '';
            });
            $table->editColumn('speciality', function ($row) {
                return $row->speciality ? $row->speciality : '';
            });
            $table->editColumn('surgical_package_name', function ($row) {
                return $row->surgical_package_name ? $row->surgical_package_name : '';
            });
            $table->editColumn('total_pharmacy_amount', function ($row) {
                return $row->total_pharmacy_amount ? $row->total_pharmacy_amount : '';
            });
            $table->editColumn('pharmacy_amt', function ($row) {
                return $row->pharmacy_amt ? $row->pharmacy_amt : '';
            });
            $table->editColumn('total_consumables', function ($row) {
                return $row->total_consumables ? $row->total_consumables : '';
            });
            $table->editColumn('bill_to', function ($row) {
                return $row->bill_to ? $row->bill_to : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.ips.index');
    }

    /**
     * Show the form for creating new Ip.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('ip_create')) {
            return abort(401);
        }
        return view('admin.ips.create');
    }

    /**
     * Store a newly created Ip in storage.
     *
     * @param  \App\Http\Requests\StoreIpsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIpsRequest $request)
    {
        if (! Gate::allows('ip_create')) {
            return abort(401);
        }
        $ip = Ip::create($request->all());



        return redirect()->route('admin.ips.index');
    }


    /**
     * Show the form for editing Ip.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('ip_edit')) {
            return abort(401);
        }
        $ip = Ip::findOrFail($id);

        return view('admin.ips.edit', compact('ip'));
    }

    /**
     * Update Ip in storage.
     *
     * @param  \App\Http\Requests\UpdateIpsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIpsRequest $request, $id)
    {
        if (! Gate::allows('ip_edit')) {
            return abort(401);
        }
        $ip = Ip::findOrFail($id);
        $ip->update($request->all());



        return redirect()->route('admin.ips.index');
    }


    /**
     * Display Ip.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('ip_view')) {
            return abort(401);
        }
        $ip = Ip::findOrFail($id);

        return view('admin.ips.show', compact('ip'));
    }


    /**
     * Remove Ip from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('ip_delete')) {
            return abort(401);
        }
        $ip = Ip::findOrFail($id);
        $ip->delete();

        return redirect()->route('admin.ips.index');
    }

    /**
     * Delete all selected Ip at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('ip_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Ip::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Ip from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('ip_delete')) {
            return abort(401);
        }
        $ip = Ip::onlyTrashed()->findOrFail($id);
        $ip->restore();

        return redirect()->route('admin.ips.index');
    }

    /**
     * Permanently delete Ip from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('ip_delete')) {
            return abort(401);
        }
        $ip = Ip::onlyTrashed()->findOrFail($id);
        $ip->forceDelete();

        return redirect()->route('admin.ips.index');
    }
}
