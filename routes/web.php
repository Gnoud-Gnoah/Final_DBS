<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('font-end.main');
});

Route::get('input', function(){
    return view('font-end.input');
});

Route::get('search', [SearchController::class, 'index'])->name('search');
Route::get('autocomplete', [SearchController::class, 'autocomplete'])->name('autocomplete');



Route::get('/customers', function(){
    $faker = Faker\Factory::create();
    $limit = 1;
    $customers = [];
    for ($i = 0; $i < $limit; $i++) {
        $customers[$i] = [
            'hoten' => $faker->name,
            'ngaysinh' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'gioitinh' => $faker->randomElement(['male' ,'female']),
            'nhommau' =>  $faker->randomElement(['O' ,'A', 'B', 'AB']),
            'honnhan' => $faker->randomElement(['married', 'not married','divorce']),
            'noikhaisinh' => $faker->address,
            'quequan' => $faker->address,
            'dantoc' => $faker->randomElement(['BANA','BO Y','BRAU','BRU-VAN KIEU','CHAM','CHO RO','CHU-RU','CHUT',
            'CO','CO HO','CO LAO','CO TU',
            'CONG','DAO','E-ĐE','GIA RAI',
            'GIAY','GIE-TRIENG','HA NHI','HOA',
            'HRE','KHANG','KHMER','KHƠ MU',
            'LA CHI','LA HA','LA HU','LAO',
            'LO LO','LA','MA','MANG',
            'MNONG','MONG','MUONG','NGAI',
            'NUNG','O ĐU','PA THEN','PHU LA',
            'PU PEO','RA GLAI','RO MAM','SAN CHAY',
            'SAN DIU','SI LA','TA OI', 'TAY',
            'THAI','THO','KINH','XINH MUN',
            'XO ĐANG','XTIENG']),
            'socmnd' => $faker->numberBetween(123456789,987654321),
            'noithuongchu' => $faker->address,
            'noihientai' => $faker->address,
        ];
    }
    return response()->json($customers);
});
