<?php

namespace Database\Seeders;

use App\Models\Phone1;
use Illuminate\Database\Seeder;

class Phone1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phone1::factory()->count(8)->create();
    }
}
