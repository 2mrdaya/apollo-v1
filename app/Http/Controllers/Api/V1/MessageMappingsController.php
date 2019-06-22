<?php

namespace App\Http\Controllers\Api\V1;

use App\MessageMapping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMessageMappingsRequest;
use App\Http\Requests\Admin\UpdateMessageMappingsRequest;
use Yajra\DataTables\DataTables;

class MessageMappingsController extends Controller
{
    public function index()
    {
        return MessageMapping::all();
    }

    public function show($id)
    {
        return MessageMapping::findOrFail($id);
    }

    public function update(UpdateMessageMappingsRequest $request, $id)
    {
        $message_mapping = MessageMapping::findOrFail($id);
        $message_mapping->update($request->all());
        

        return $message_mapping;
    }

    public function store(StoreMessageMappingsRequest $request)
    {
        $message_mapping = MessageMapping::create($request->all());
        

        return $message_mapping;
    }

    public function destroy($id)
    {
        $message_mapping = MessageMapping::findOrFail($id);
        $message_mapping->delete();
        return '';
    }
}
