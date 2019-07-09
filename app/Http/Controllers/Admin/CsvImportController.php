<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SpreadsheetReader;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ImportCsvHelper;



class CsvImportController extends Controller
{

    public function parse(Request $request) {

        $file = $request->file('csv_file');

        /*$request->validate([
            'csv_file' => 'mimes:csv,txt,xlsx',
        ]);*/

        $ext = $file->getClientOriginalExtension();

        $path = $file->path();

        $hasHeader = $request->input('header', false) ? true : false;

        $fileName = str_random(10).'.'.$ext;

        $file->storeAs('csv_import', $fileName);

        $modelName = $request->input('model', false);

        $fullModelName = "App\\" . $modelName;

        $module = $request->input('module', false);

        $handlerMethod = $modelName.$module.'Parse';

        if(method_exists('App\Helpers\ImportCsvHelper',$handlerMethod)) {
            $fileName = ImportCsvHelper::$handlerMethod($fileName);
        }

        $fileNameWithPath = storage_path('app/csv_import/' . $fileName);

        $reader = new SpreadsheetReader($fileNameWithPath);
        $headers = $reader->current();
        $lines = [];
        $lines[] = $reader->next();
        //$lines[] = $reader->next();

        $model = new $fullModelName();
        $fillables = $model->getFillable();

        $redirect = url()->previous();

        return view('csvImport.parse_import', compact('headers', 'fileName', 'fillables', 'hasHeader', 'modelName', 'lines', 'redirect', 'module'));

    }

    public function process(Request $request) {

        $fileName = $request->input('fileName', false);
        $path = storage_path('app/csv_import/' . $fileName);

        $hasHeader = $request->input('hasHeader', false);

        $fields = $request->input('fields', false);
        $fields = array_flip(array_filter($fields));

        $modelName = $request->input('modelName', false);
        $model = "App\\" . $modelName;

        $reader = new SpreadsheetReader($path);
        $insert = [];

        $module = $request->input('module', false);
        $handlerMethod = $modelName.$module.'Process';

        foreach($reader as $key => $row) {
            if ($hasHeader && $key == 0) {
                continue;
            }

            $tmp = [];
            foreach($fields as $header => $k) {
                $tmp[$header] = ImportCsvHelper::RemoveBS($row[$k]);
            }

            if($module) {
                $tmp['channel'] = $module;
            }

            if(method_exists('App\Helpers\ImportCsvHelper',$handlerMethod)) {
                $tmp = ImportCsvHelper::$handlerMethod($tmp);
            }

            $insert[] = $tmp;

        }

        $for_insert = array_chunk($insert, 100);
        foreach ($for_insert as $insert_item) {
            $model::insert($insert_item);
        }

        $rows = count($insert);
        $table = str_plural($modelName);
        File::delete($path);

        $handlerMethod = $modelName.$module.'PostProcess';
        if(method_exists('App\Helpers\ImportCsvHelper',$handlerMethod)) {
            $deleted_rows = ImportCsvHelper::$handlerMethod();
        }

        $redirect = $request->input('redirect', false);
        return redirect()->to($redirect)->with('message', trans('quickadmin.qa_imported_rows_to_table', ['rows' => $rows, 'table' => $table]));

    }

}
