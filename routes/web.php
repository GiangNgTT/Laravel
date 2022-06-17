<?php

// use App\Http\Controllers\CalculationController;
// use App\Http\Controllers\CarController;
use App\Http\Controllers\CarAdminController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
// use App\Http\Controllers\SolveController;

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
    return view('welcome');
});
Route::resource('cars', CarAdminController::class);



// Route::get('viewCar', [CarAdminControllor::class, 'index'])



















// Route::resource('cars', CarController::class);
//Route này tương ứng với 7 route như sau:
//Route::get('cars', [CarController::class, 'index'])->name('cars.index);
//Route::get('cars/create', [CarController::class, 'create'])->name('cars.create);
//Route::post('cars', [CarController::class, 'store'])->name('cars.store);
//Route::get('cars/{car}', [CarController::class, 'show'])->name('cars.show);
//Route::get('cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit);
//Route::put('cars/{car}', [CarController::class, 'update'])->name('cars.update);
//Route::delete('cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy);

// Tinh toan//

// Route::get('calculation', function () {
//     return view('calculation');
// });
// Route::post('calculation', [CalculationController::class, 'index']);

// Route::post('ptb1', function (Request $req) {
//     $a = $req->input('a');
//     $b = $req->input('b');
//     if ($a == 0)
//         if ($b == 0)
//             $kq = "Phuong trinh vo so nghiem";
//         else $kq = "Phuong trinh vo nghiem";
//     else $kq = "Phuong trinh co nghiem x = " .$b/$a;
//     return view('ptb1', compact('a', 'b', 'kq'));
// })->name('ptb1.post');
// Route::post('ptb1', [PTB1Controller::class, 'solve'])->name('ptb1');
?>