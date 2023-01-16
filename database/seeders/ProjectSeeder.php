<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'projectname' => 'Employee Monitoring',
            'client'=> 'Pt. Bina Sarana Sukses',
            'progress'=> '100',
            'leader_id' => '1',
            'startdate' => '21-9-2',
            'enddate' => '12-9-3'
        ]);
        Project::create([
            'projectname' => 'SI Pendaftaran Atlet Daerah',
            'client'=> 'Dispora Jawa Timur',
            'progress'=> '40',
            'leader_id' => '1',
            'startdate' => '21-9-2',
            'enddate' => '12-9-3'
        ]);
        Project::create([
            'projectname' => 'Learning Management System',
            'client'=> 'Ruang Guru',
            'progress'=> '80',
            'leader_id' => '1',
            'startdate' => '21-9-2',
            'enddate' => '12-9-3'
        ]);
        Project::create([
            'projectname' => 'Pembuatan SI Keuangan',
            'client'=> 'Bakeuda Prov. Kalsel',
            'progress'=> '30',
            'leader_id' => '1',
            'startdate' => '21-9-2',
            'enddate' => '12-9-3'
        ]);
    }
}
