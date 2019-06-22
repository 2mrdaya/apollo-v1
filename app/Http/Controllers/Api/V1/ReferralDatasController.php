<?php

namespace App\Http\Controllers\Api\V1;

use App\ReferralData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReferralDatasRequest;
use App\Http\Requests\Admin\UpdateReferralDatasRequest;
use Yajra\DataTables\DataTables;

class ReferralDatasController extends Controller
{
    public function index()
    {
        return ReferralData::all();
    }

    public function show($id)
    {
        return ReferralData::findOrFail($id);
    }

    public function update(UpdateReferralDatasRequest $request, $id)
    {
        $referral_datum = ReferralData::findOrFail($id);
        $referral_datum->update($request->all());


        return $referral_datum;
    }

    public function store(StoreReferralDatasRequest $request)
    {
        $referral_datum = ReferralData::create($request->all());


        return $referral_datum;
    }

    public function destroy($id)
    {
        $referral_datum = ReferralData::findOrFail($id);
        $referral_datum->delete();
        return '';
    }
}
