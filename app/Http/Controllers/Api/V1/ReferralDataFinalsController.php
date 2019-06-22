<?php

namespace App\Http\Controllers\Api\V1;

use App\ReferralDataFinal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReferralDataFinalsRequest;
use App\Http\Requests\Admin\UpdateReferralDataFinalsRequest;
use Yajra\DataTables\DataTables;

class ReferralDataFinalsController extends Controller
{
    public function index()
    {
        return ReferralDataFinal::all();
    }

    public function show($id)
    {
        return ReferralDataFinal::findOrFail($id);
    }

    public function update(UpdateReferralDataFinalsRequest $request, $id)
    {
        $referral_data_final = ReferralDataFinal::findOrFail($id);
        $referral_data_final->update($request->all());
        

        return $referral_data_final;
    }

    public function store(StoreReferralDataFinalsRequest $request)
    {
        $referral_data_final = ReferralDataFinal::create($request->all());
        

        return $referral_data_final;
    }

    public function destroy($id)
    {
        $referral_data_final = ReferralDataFinal::findOrFail($id);
        $referral_data_final->delete();
        return '';
    }
}
