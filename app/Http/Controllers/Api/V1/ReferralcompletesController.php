<?php

namespace App\Http\Controllers\Api\V1;

use App\Referralcomplete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReferralcompletesRequest;
use App\Http\Requests\Admin\UpdateReferralcompletesRequest;
use Yajra\DataTables\DataTables;

class ReferralcompletesController extends Controller
{
    public function index()
    {
        return Referralcomplete::all();
    }

    public function show($id)
    {
        return Referralcomplete::findOrFail($id);
    }

    public function update(UpdateReferralcompletesRequest $request, $id)
    {
        $referralcomplete = Referralcomplete::findOrFail($id);
        $referralcomplete->update($request->all());


        return $referralcomplete;
    }

    public function store(StoreReferralcompletesRequest $request)
    {
        $referralcomplete = Referralcomplete::create($request->all());


        return $referralcomplete;
    }

    public function destroy($id)
    {
        $referralcomplete = Referralcomplete::findOrFail($id);
        $referralcomplete->delete();
        return '';
    }
}
