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
    public function adminSearch(Request $request)
    {
        $search = $request->input('search');
        $data = DB::table('information')
            ->join('tax_codes', 'information.socmnd', '=', 'tax_codes.socmnd')
            ->select('information.hoten', 'information.ngaysinh', 'information.quequan', 'information.dantoc', 'information.socmnd', 'tax_codes.masothue', 'tax_codes.quanly', 'tax_codes.tinhtrang')
            ->where('information.socmnd', '=',$search)
            ->orWhere('information.hoten', '=',$search)
            ->orWhere('information.dantoc', '=', $search)
            ->get();         
        return response()->json([
            'error'=> false,
            'data' => $data
        ]);
    }
}
