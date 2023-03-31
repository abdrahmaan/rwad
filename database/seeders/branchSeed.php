<?php

namespace Database\Seeders;
use App\Models\Branch;

use Illuminate\Database\Seeder;

class branchSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'BranchName'=> "القاهرة"
        ]);
        Branch::create([
            'BranchName'=> "المنصورة"
        ]);
        Branch::create([
            'BranchName'=> "الغردقة"
        ]);
        
    }
}
