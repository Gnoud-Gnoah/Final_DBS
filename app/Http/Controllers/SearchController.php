<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('font-end.search');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $search = $request->input('search');
        $data = DB::table('information')
            ->join('tax_codes', 'information.socmnd', '=', 'tax_codes.socmnd')
            ->select('information.hoten', 'information.ngaysinh', 'information.quequan', 'information.dantoc', 'information.socmnd', 'tax_codes.masothue', 'tax_codes.quanly', 'tax_codes.tinhtrang')
            ->where('information.socmnd', '=',$search)
            ->orWhere('information.hoten', '=',$search)
            ->get();         
        return response()->json([
            'error'=> false,
            'data' => $data
        ]);
    }
}