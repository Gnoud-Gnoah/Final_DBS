<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|max:255',
            'price'      => 'required|number',
            'content'    => 'required',
            'image_path' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('product/create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            // Lưu thông tin vào database, phần này sẽ giới thiệu ở bài về database
            
        }
    }   

    public function create()
    {
        return view('fontend.product.create');
    }

    public function index()
    {
        $products = DB::table('products')->get();
        return view('fontend.product.list')->with($products);
    }
}
