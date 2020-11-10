<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eloquent\User;

class HomeController extends Controller
{

   public function search()
   {
       return view('front-end.search');
   }

   public function searchFullText(Request $request) 
  {
      if ($request->search != '') {
          $data = User::where('name', $request->search)->get();
          foreach ($data as $key => $value) {
              echo $value->name;
              echo '<br>'; // mình viết vầy cho nhanh các bạn tùy chỉnh cho đẹp nhé
          }
      }
      // return view('search', $data); thay vì foreach như mình bạn có thể ném cái data vào 1 cái view nào đấy nhìn cho đẹp
  }
}