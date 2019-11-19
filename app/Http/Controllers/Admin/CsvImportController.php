<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SpreadsheetReader;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ImportCsvHelper;
use App\Helpers\CommonHelper;



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
        $modelHeaderConfigCode = $modelName.'ImportHeader';

        $replaceHeader = CommonHelper::getConfigValue($modelHeaderConfigCode);

        if($replaceHeader) {
            $replaceHeader = json_decode($replaceHeader, true);
        }

        //var_dump($replaceHeader, $headers, $fillables);die;

        return view('csvImport.parse_import', compact('headers', 'fileName', 'fillables', 'hasHeader', 'modelName', 'lines', 'redirect', 'module', 'replaceHeader'));

    }

    public function validateCsv(Request $request)
    {

        $fileName = $request->input('fileName', false);
        $path = storage_path('app/csv_import/' . $fileName);

        $hasHeader = $request->input('hasHeader', false);

        $fields_org = $request->input('fields', false);
        $fields = array_flip(array_filter($fields_org));

        $modelName = $request->input('modelName', false);
        $model = "App\\" . $modelName;

        $redirect = $request->input('redirect', false);
        $reader = new SpreadsheetReader($path);
        $tableData = [];
        $headerRow=[];
        $errorRowIndexes = [];
        $module = $request->input('module', false);
        $handlerMethod = $modelName.$module.'Validate';

        foreach($reader as $key => $row)
        {
            if ($hasHeader && $key == 0) {
                continue;
            }
            if (isset($row[0]) && trim($row[0])!="") {
                $tmp = [];
                $tmp['status']='Success';

                foreach($fields as $header => $k) {
                    $tmp[$header] = ImportCsvHelper::RemoveBS($row[$k]);
                }

                if(method_exists('App\Helpers\ImportCsvHelper',$handlerMethod)) {
                    $tmp = ImportCsvHelper::$handlerMethod($tmp);
                }

                if ($tmp['status']!='Success') {
                    array_push($errorRowIndexes, $key);
                    $tableData[] = $tmp;
                }
            }
        }
        $headerRow=array_keys($fields);

        $headerRow[]='status';

        return view('csvImport.csv_validate', compact('fields','tableData','headerRow','modelName','module','redirect','fileName','errorRowIndexes','fields_org'));

    }


    public function process(Request $request){

        $fileName = $request->input('fileName', false);
        $path = storage_path('app/csv_import/' . $fileName);
        $hasHeader = $request->input('hasHeader', false);
        //var_dump($request->input('fields', false));
        $fields = explode(",",$request->input('fields', false));
        $fields = array_flip(array_filter($fields));
        //var_dump($fields);die;
        $modelName = $request->input('modelName', false);
        $model = "App\\" . $modelName;

        $reader = new SpreadsheetReader($path);
        $insert = [];

        $excludeRow = explode(",",$request->input('error'));

        $module = $request->input('module', false);
        $handlerMethod = $modelName.$module.'Process';

        foreach($reader as $key => $row)
        {
            if ($key == 0 || in_array($key, $excludeRow)) {
                continue;
            }

            if (isset($row[0]) && trim($row[0])!="") {
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
