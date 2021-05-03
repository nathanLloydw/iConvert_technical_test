<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaigns')->insert([
            'title' => 'Monster Energy Campaign',
            'banner'=>'',
            'user_id' => 1,
            'enabled'=> 0,
            'start_date'=> Carbon::createFromDate(2021, 5, 21),
            'end_date'=> Carbon::createFromDate(2021, 5, 24),
            'voucher_code'=>'MONSTER',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('campaigns')->insert([
            'title' => 'Coke Cola Campaign',
            'banner'=>'',
            'user_id' => 1,
            'enabled'=> 0,
            'start_date'=> Carbon::createFromDate(2021, 5, 01),
            'end_date'=> Carbon::createFromDate(2021, 5, 23),
            'voucher_code'=>'COKE',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('campaigns')->insert([
            'title' => 'Pepsi Campaign',
            'banner'=>'',
            'user_id' => 2,
            'enabled'=> 0,
            'start_date'=> Carbon::createFromDate(2021, 5, 21),
            'end_date'=> Carbon::createFromDate(2021, 5, 24),
            'voucher_code'=>'Pepsi',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('campaigns')->insert([
            'title' => 'Casino Campaign',
            'banner'=>'',
            'user_id' => 2,
            'enabled'=> 0,
            'start_date'=> Carbon::createFromDate(2021, 5, 01),
            'end_date'=> Carbon::createFromDate(2021, 5, 23),
            'voucher_code'=>'CASINO',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        
    }
}
