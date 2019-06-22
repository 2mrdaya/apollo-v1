<?php

namespace App\Http\Controllers\Api\V1;

use App\Opd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOpdsRequest;
use App\Http\Requests\Admin\UpdateOpdsRequest;
use Yajra\DataTables\DataTables;

class OpdsController extends Controller
{
    public function index()
    {
        return Opd::all();
    }

    public function show($id)
    {
        return Opd::findOrFail($id);
    }

    public function update(UpdateOpdsRequest $request, $id)
    {
        $opd = Opd::findOrFail($id);
        $opd->update($request->all());
        

        return $opd;
    }

    public function store(StoreOpdsRequest $request)
    {
        $opd = Opd::create($request->all());
        

        return $opd;
    }

    public function destroy($id)
    {
        $opd = Opd::findOrFail($id);
        $opd->delete();
        return '';
    }
}
