<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\CustomerImportExcel;
use Maatwebsite\Excel\Facades\Excel;

class ExcelExportController extends Controller
{
    public function index()
    {
        $calls = DB::table('calls')->get();
        return view('customer.index', compact('calls'));
    }

    public function importExcelData(Request $request)
    {
        $request->validate([
            'import_file' => [
                'required',
                'file'
            ],
        ]);

        Excel::import(new CustomerImportExcel, $request->file('import_file'));

        return redirect()->back()->with('status', 'Imported Successfully');
    }
}
