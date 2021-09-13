<?php

namespace Database\Seeders;

use App\Models\RollTable as ModelsRollTable;
use Illuminate\Database\Seeder;

class rolltable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roll=[
            [
                'roll_name' => 'admin',

            ],
            [
                'roll_name' => 'editor',
            ],
            [
                'roll_name' => 'user',
            ],
        ];

        foreach ($roll as $key => $value) {
            ModelsRollTable::create($value);
        }
    }
}
