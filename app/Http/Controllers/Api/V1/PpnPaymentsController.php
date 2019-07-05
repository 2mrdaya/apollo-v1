<?php

namespace App\Http\Controllers\Api\V1;

use App\PpnPayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePpnPaymentsRequest;
use App\Http\Requests\Admin\UpdatePpnPaymentsRequest;
use Yajra\DataTables\DataTables;

class PpnPaymentsController extends Controller
{
    public function index()
    {
        return PpnPayment::all();
    }

    public function show($id)
    {
        return PpnPayment::findOrFail($id);
    }

    public function update(UpdatePpnPaymentsRequest $request, $id)
    {
        $ppn_payment = PpnPayment::findOrFail($id);
        $ppn_payment->update($request->all());
        

        return $ppn_payment;
    }

    public function store(StorePpnPaymentsRequest $request)
    {
        $ppn_payment = PpnPayment::create($request->all());
        

        return $ppn_payment;
    }

    public function destroy($id)
    {
        $ppn_payment = PpnPayment::findOrFail($id);
        $ppn_payment->delete();
        return '';
    }
}
