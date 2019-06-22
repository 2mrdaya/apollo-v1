<?php

namespace App\Http\Controllers\Api\V1;

use App\SmsImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSmsImportsRequest;
use App\Http\Requests\Admin\UpdateSmsImportsRequest;
use Yajra\DataTables\DataTables;

class SmsImportsController extends Controller
{
    public function index()
    {
        return SmsImport::all();
    }

    public function show($id)
    {
        return SmsImport::findOrFail($id);
    }

    public function update(UpdateSmsImportsRequest $request, $id)
    {
        $sms_import = SmsImport::findOrFail($id);
        $sms_import->update($request->all());
        

        return $sms_import;
    }

    public function store(StoreSmsImportsRequest $request)
    {
        $sms_import = SmsImport::create($request->all());
        

        return $sms_import;
    }

    public function destroy($id)
    {
        $sms_import = SmsImport::findOrFail($id);
        $sms_import->delete();
        return '';
    }
}
