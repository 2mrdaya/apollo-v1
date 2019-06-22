<?php

namespace App\Http\Controllers\Api\V1;

use App\PatientRegistration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePatientRegistrationsRequest;
use App\Http\Requests\Admin\UpdatePatientRegistrationsRequest;
use Yajra\DataTables\DataTables;

class PatientRegistrationsController extends Controller
{
    public function index()
    {
        return PatientRegistration::all();
    }

    public function show($id)
    {
        return PatientRegistration::findOrFail($id);
    }

    public function update(UpdatePatientRegistrationsRequest $request, $id)
    {
        $patient_registration = PatientRegistration::findOrFail($id);
        $patient_registration->update($request->all());
        
        $messageMappings           = $patient_registration->message_mappings;
        $currentMessageMappingData = [];
        foreach ($request->input('message_mappings', []) as $index => $data) {
            if (is_integer($index)) {
                $patient_registration->message_mappings()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentMessageMappingData[$id] = $data;
            }
        }
        foreach ($messageMappings as $item) {
            if (isset($currentMessageMappingData[$item->id])) {
                $item->update($currentMessageMappingData[$item->id]);
            } else {
                $item->delete();
            }
        }

        return $patient_registration;
    }

    public function store(StorePatientRegistrationsRequest $request)
    {
        $patient_registration = PatientRegistration::create($request->all());
        
        foreach ($request->input('message_mappings', []) as $data) {
            $patient_registration->message_mappings()->create($data);
        }

        return $patient_registration;
    }

    public function destroy($id)
    {
        $patient_registration = PatientRegistration::findOrFail($id);
        $patient_registration->delete();
        return '';
    }
}
