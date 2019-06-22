<?php

namespace App\Http\Controllers\Api\V1;

use App\Avip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAvipsRequest;
use App\Http\Requests\Admin\UpdateAvipsRequest;
use Yajra\DataTables\DataTables;

class AvipsController extends Controller
{
    public function index()
    {
        return Avip::all();
    }

    public function show($id)
    {
        return Avip::findOrFail($id);
    }

    public function update(UpdateAvipsRequest $request, $id)
    {
        $avip = Avip::findOrFail($id);
        $avip->update($request->all());
        

        return $avip;
    }

    public function store(StoreAvipsRequest $request)
    {
        $avip = Avip::create($request->all());
        

        return $avip;
    }

    public function destroy($id)
    {
        $avip = Avip::findOrFail($id);
        $avip->delete();
        return '';
    }
}
