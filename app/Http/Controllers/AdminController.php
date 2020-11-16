<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('font-end.admin');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexInput(){
        return view('font-end.input');
    }

    public function add(Request $request){
        $data = DB::table('information')
            ->join('tax_codes', 'information.socmnd', '=', 'tax_codes.socmnd')
            ->select('information.socmnd', 'tax_codes.masothue')
            ->get();
        
        while(1){
            $num = rand(2222222222,9999999999);
            foreach($data as $da){
                if($num == $da->masothue){
                    break;
                }
            }
            break;
        }

        DB::table('information')->insert(
            ['hoten' => $request->input('hoten'), 'ngaysinh' => $request->input('ngaysinh'), 
            'quequan' => $request->input('quequan'), 'socmnd' => $request->input('socmnd'),]
        );
        DB::table('tax_codes')->insert(
            [ 'quanly' => $request->input('quanly'), 
            'ngayhd' => $request->input('ngayhd'),
            'socmnd' => $request->input('socmnd'),
            'masothue' => $num]
        );
        return view('font-end.admin');
    }

    public function indexRepair(){
        return view('font-end.repair');
    }

    public function repair(Request $request){
        DB::table('information')
        ->where('socmnd', $request->input('socmnd'))
        ->update(['hoten' => $request->input('hoten'), 'ngaysinh' => $request->input('ngaysinh'), 
            'quequan' => $request->input('quequan')]);

        return view('font-end.admin');
    }

    public function remove(Request $request){
        DB::table('information')
        ->where('socmnd', $request->input('socmnd'))
        ->delete();

        DB::table('tax_codes')
        ->where('socmnd', $request->input('socmnd'))
        ->delete();

        return view('font-end.admin');
    }

    public function takeDataUnique()
    {
        $data = DB::table('information')
            ->join('tax_codes', 'information.socmnd', '=', 'tax_codes.socmnd')
            ->select('information.socmnd', 'tax_codes.masothue')
            ->get();         
        return response()->json([
            'error'=> false,
            'data' => $data
        ]);
    }

    public function adminSearch(Request $request)
    {
        $search = $request->input('search');
        $data = DB::table('information')
            ->join('tax_codes', 'information.socmnd', '=', 'tax_codes.socmnd')
            ->select('information.hoten', 'information.ngaysinh', 'information.quequan', 'information.socmnd', 'tax_codes.masothue', 'tax_codes.quanly', 'tax_codes.tinhtrang')
            ->where('information.socmnd', '=',$search)
            ->orWhere('information.hoten', '=',$search)
            ->get();         
        return response()->json([
            'error'=> false,
            'data' => $data
        ]);
    }
}
