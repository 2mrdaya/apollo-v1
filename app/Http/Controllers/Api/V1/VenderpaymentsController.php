<?php

namespace App\Http\Controllers\Api\V1;

use App\Venderpayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVenderpaymentsRequest;
use App\Http\Requests\Admin\UpdateVenderpaymentsRequest;
use Yajra\DataTables\DataTables;

class VenderpaymentsController extends Controller
{
    public function index()
    {
        return Venderpayment::all();
    }

    public function show($id)
    {
        return Venderpayment::findOrFail($id);
    }

    public function update(UpdateVenderpaymentsRequest $request, $id)
    {
        $venderpayment = Venderpayment::findOrFail($id);
        $venderpayment->update($request->all());
        

        return $venderpayment;
    }

    public function store(StoreVenderpaymentsRequest $request)
    {
        $venderpayment = Venderpayment::create($request->all());
        

        return $venderpayment;
    }

    public function destroy($id)
    {
        $venderpayment = Venderpayment::findOrFail($id);
        $venderpayment->delete();
        return '';
    }
}
