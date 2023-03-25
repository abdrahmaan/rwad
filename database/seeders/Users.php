<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "FullName" => "مستر عمرو البعج",
            "Username" => "mr.amr",
            "Password" => "123",
            "Role" => "Admin",
        ]);
        User::create([
            "FullName" => "محمد حنفي إبراهيم",
            "Username" => "mo_hanafy",
            "Password" => "123",
            "Role" => "المدير العام",
        ]);
    }
}
