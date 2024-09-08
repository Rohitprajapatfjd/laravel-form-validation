<?php

namespace Database\Seeders;

use App\Models\admin;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsons = File::get('database/json/admin.json');
        $data = collect(json_decode($jsons));
        $data->each(function ($vals) {
            admin::insert([
                "name" => $vals->name,
                "email" => $vals->email,
                "city" => $vals->city,
                "age" => $vals->age,
                "password"=> $vals->password
            ]);
        });
    }
}
