<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'id'=>1,
            'name' => 'サウナしきじ',
            'prefecture'=>'静岡県',
            'deleted_at' => null,
            'created_at' => '2022-12-30 11:22:33',
            'updated_at' => '2022-12-31 23:58:59',
        ]);

        Plan::create([
            'id'=>2,
            'name' => 'スパジアムジャポン',
            'prefecture'=>'東京都',
            'deleted_at' => null,
            'created_at' => '2022-12-30 11:22:33',
            'updated_at' => '2022-12-31 23:58:59',
        ]);
    }
}
