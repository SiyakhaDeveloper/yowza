<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            ['name' => 'Administrator (can create other users)', 'guard_name' => 'web'],
            ['name' => 'Corporate Customer / Donor / Funder', 'guard_name' => 'web'],
            ['name' => 'Social Enterprises (NPO / NGO / PBO / Schools / etc)', 'guard_name' => 'web'],
            ['name' => 'Volunteers', 'guard_name' => 'web'],
        ];

        foreach($items as $item){
            Role::create($item);
        }
    }
}
