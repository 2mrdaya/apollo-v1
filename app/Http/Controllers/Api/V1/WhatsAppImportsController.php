<?php

namespace App\Http\Controllers\Api\V1;

use App\WhatsAppImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreWhatsAppImportsRequest;
use App\Http\Requests\Admin\UpdateWhatsAppImportsRequest;
use Yajra\DataTables\DataTables;

class WhatsAppImportsController extends Controller
{
    public function index()
    {
        return WhatsAppImport::all();
    }

    public function show($id)
    {
        return WhatsAppImport::findOrFail($id);
    }

    public function update(UpdateWhatsAppImportsRequest $request, $id)
    {
        $whats_app_import = WhatsAppImport::findOrFail($id);
        $whats_app_import->update($request->all());
        

        return $whats_app_import;
    }

    public function store(StoreWhatsAppImportsRequest $request)
    {
        $whats_app_import = WhatsAppImport::create($request->all());
        

        return $whats_app_import;
    }

    public function destroy($id)
    {
        $whats_app_import = WhatsAppImport::findOrFail($id);
        $whats_app_import->delete();
        return '';
    }
}
