<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Leader;

class LeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Leader::create([
            'leadername' => 'ardian hasanal',
            'email'=> 'ardianhasanal@gmail.com',
            'photo' => 'ardian.jpg'
        ]);
    }
}
