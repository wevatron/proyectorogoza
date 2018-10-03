<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Item;

class MaatwebsiteDemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importExport()
    {
        return view('importExport');
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadExcel($type)
    {
        $data = Item::get()->toArray();
            
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importExcel(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);

        $path = $request->file('import_file')->getRealPath();
        set_time_limit(0);
        $data = Excel::load($path)->get();
 
        if($data->count()){

            foreach ($data as $key => $value) {
                $arr[] = [
                	'codigo' => '$value[$key]->codigo',
                	'b' => '$value[$key]->descripcion',
                	'c' => '$value[$key]->preciolista',
                	'd' => '$value[$key]->precioiva',
                	'e' => '$key'
                ];
            }
 
            if(!empty($arr)){
                Item::insert($arr);
            }
        }
 
        return back()->with('success', 'Insert Record successfully.');
        
    }
    
}
