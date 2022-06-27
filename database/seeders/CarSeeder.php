<?php

namespace Database\Seeders;

use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($i=0; $i<5; $i++){
        //     DB::table('cars')->insert([
        //         'make' => Str::random(10),
        //         'model' => Str::random(10),
        //         'prodeduced_on' => Carbon::parse('01-01-2020'),
        //     ]);
        // }
        Car::factory(20)->count(5)->create();
        
        //
    }
}
