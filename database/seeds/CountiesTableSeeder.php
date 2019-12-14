<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Counties;
class CountiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path= public_path(). "/counties.json";
        $data = json_decode(file_get_contents($path));

        foreach($data as $county){
//            , 'capital'=>$county->capital, 'code'=>$county->code,'sub_counties'=>$county->sub_counties[0]
            foreach ($county->sub_counties as $sub){
                Counties::firstOrCreate(['name'=>$county->name,'code'=>$county->code,'sub_counties'=>$sub]);
            }

        }
        //
    }
}
