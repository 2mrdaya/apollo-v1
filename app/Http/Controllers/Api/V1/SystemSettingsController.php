<?php

namespace App\Http\Controllers\Api\V1;

use App\SystemSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSystemSettingsRequest;
use App\Http\Requests\Admin\UpdateSystemSettingsRequest;

class SystemSettingsController extends Controller
{
    public function index()
    {
        return SystemSetting::all();
    }

    public function show($id)
    {
        return SystemSetting::findOrFail($id);
    }

    public function update(UpdateSystemSettingsRequest $request, $id)
    {
        $system_setting = SystemSetting::findOrFail($id);
        $system_setting->update($request->all());
        

        return $system_setting;
    }

    public function store(StoreSystemSettingsRequest $request)
    {
        $system_setting = SystemSetting::create($request->all());
        

        return $system_setting;
    }

    public function destroy($id)
    {
        $system_setting = SystemSetting::findOrFail($id);
        $system_setting->delete();
        return '';
    }
}
