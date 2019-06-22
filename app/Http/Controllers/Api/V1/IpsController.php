<?php

namespace App\Http\Controllers\Api\V1;

use App\Ip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreIpsRequest;
use App\Http\Requests\Admin\UpdateIpsRequest;
use Yajra\DataTables\DataTables;

class IpsController extends Controller
{
    public function index()
    {
        return Ip::all();
    }

    public function show($id)
    {
        return Ip::findOrFail($id);
    }

    public function update(UpdateIpsRequest $request, $id)
    {
        $ip = Ip::findOrFail($id);
        $ip->update($request->all());
        

        return $ip;
    }

    public function store(StoreIpsRequest $request)
    {
        $ip = Ip::create($request->all());
        

        return $ip;
    }

    public function destroy($id)
    {
        $ip = Ip::findOrFail($id);
        $ip->delete();
        return '';
    }
}
