<?php

namespace App\Http\Controllers\Admin;

use App\SystemSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSystemSettingsRequest;
use App\Http\Requests\Admin\UpdateSystemSettingsRequest;

class SystemSettingsController extends Controller
{
    /**
     * Display a listing of SystemSetting.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('system_setting_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('system_setting_delete')) {
                return abort(401);
            }
            $system_settings = SystemSetting::onlyTrashed()->get();
        } else {
            $system_settings = SystemSetting::all();
        }

        return view('admin.system_settings.index', compact('system_settings'));
    }

    /**
     * Show the form for creating new SystemSetting.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('system_setting_create')) {
            return abort(401);
        }
        return view('admin.system_settings.create');
    }

    /**
     * Store a newly created SystemSetting in storage.
     *
     * @param  \App\Http\Requests\StoreSystemSettingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSystemSettingsRequest $request)
    {
        if (! Gate::allows('system_setting_create')) {
            return abort(401);
        }
        $system_setting = SystemSetting::create($request->all());



        return redirect()->route('admin.system_settings.index');
    }


    /**
     * Show the form for editing SystemSetting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('system_setting_edit')) {
            return abort(401);
        }
        $system_setting = SystemSetting::findOrFail($id);

        return view('admin.system_settings.edit', compact('system_setting'));
    }

    /**
     * Update SystemSetting in storage.
     *
     * @param  \App\Http\Requests\UpdateSystemSettingsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSystemSettingsRequest $request, $id)
    {
        if (! Gate::allows('system_setting_edit')) {
            return abort(401);
        }
        $system_setting = SystemSetting::findOrFail($id);
        $system_setting->update($request->all());



        return redirect()->route('admin.system_settings.index');
    }


    /**
     * Display SystemSetting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('system_setting_view')) {
            return abort(401);
        }
        $system_setting = SystemSetting::findOrFail($id);

        return view('admin.system_settings.show', compact('system_setting'));
    }


    /**
     * Remove SystemSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('system_setting_delete')) {
            return abort(401);
        }
        $system_setting = SystemSetting::findOrFail($id);
        $system_setting->delete();

        return redirect()->route('admin.system_settings.index');
    }

    /**
     * Delete all selected SystemSetting at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('system_setting_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = SystemSetting::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore SystemSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('system_setting_delete')) {
            return abort(401);
        }
        $system_setting = SystemSetting::onlyTrashed()->findOrFail($id);
        $system_setting->restore();

        return redirect()->route('admin.system_settings.index');
    }

    /**
     * Permanently delete SystemSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('system_setting_delete')) {
            return abort(401);
        }
        $system_setting = SystemSetting::onlyTrashed()->findOrFail($id);
        $system_setting->forceDelete();

        return redirect()->route('admin.system_settings.index');
    }
}
