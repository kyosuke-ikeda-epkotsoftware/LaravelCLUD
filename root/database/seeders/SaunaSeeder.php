<?php

namespace Database\Seeders;

use App\Models\Sauna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sauna::create([
            'id'=>1,
            'name' => '草加健康センター',
            'comment'=>'イベント多い',
            'bath_evaluation'=>'☆☆☆☆',
            'sauna_evaluation'=>'☆☆☆☆☆',
            'outdoor_evaluation'=>'☆☆☆☆☆',
            'evaluation'=>'☆☆☆☆☆',
            'deleted_at' => null,
            'created_at' => '2022-12-30 11:22:33',
            'updated_at' => '2022-12-31 23:58:59',
        ]);

        Sauna::create([
            'id'=>2,
            'name' => 'マルシンスパ',
            'comment'=>'外気浴気持ち良い',
            'bath_evaluation'=>'☆☆☆',
            'sauna_evaluation'=>'☆☆☆☆',
            'outdoor_evaluation'=>'☆☆☆☆☆',
            'evaluation'=>'☆☆☆☆',
            'deleted_at' => null,
            'created_at' => '2022-12-30 11:22:33',
            'updated_at' => '2022-12-31 23:58:59',
        ]);

        Sauna::create([
            'id'=>3,
            'name' => 'かるまる池袋',
            'comment'=>'水風呂がシングル',
            'bath_evaluation'=>'☆☆☆☆☆',
            'sauna_evaluation'=>'☆☆☆☆☆',
            'outdoor_evaluation'=>'☆☆☆',
            'evaluation'=>'☆☆☆☆',
            'deleted_at' => null,
            'created_at' => '2022-12-30 11:22:33',
            'updated_at' => '2022-12-31 23:58:59',
        ]);
    }
}

