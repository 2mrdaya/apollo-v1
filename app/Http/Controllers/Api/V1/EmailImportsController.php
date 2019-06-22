<?php

namespace App\Http\Controllers\Api\V1;

use App\EmailImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEmailImportsRequest;
use App\Http\Requests\Admin\UpdateEmailImportsRequest;
use Yajra\DataTables\DataTables;

class EmailImportsController extends Controller
{
    public function index()
    {
        return EmailImport::all();
    }

    public function show($id)
    {
        return EmailImport::findOrFail($id);
    }

    public function update(UpdateEmailImportsRequest $request, $id)
    {
        $email_import = EmailImport::findOrFail($id);
        $email_import->update($request->all());
        

        return $email_import;
    }

    public function store(StoreEmailImportsRequest $request)
    {
        $email_import = EmailImport::create($request->all());
        

        return $email_import;
    }

    public function destroy($id)
    {
        $email_import = EmailImport::findOrFail($id);
        $email_import->delete();
        return '';
    }
}
