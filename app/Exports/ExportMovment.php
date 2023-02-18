<?php

namespace App\Exports;

use App\Models\CarMovment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportMovment implements FromView , ShouldAutoSize
{


    // public $data;

    // public function __construc($data){

    //     $this->data = $data;
    // }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {

        return view("admin.exports.movment", ["Movments"=> session()->get('data')]);
    }

}
