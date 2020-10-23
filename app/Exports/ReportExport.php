<?php

namespace App\Exports;

use App\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return [
            "Id",
            "Name",
            "Current Situation",
            "Total Sell of Current Month",
            "Update Need",
            "Date"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Report::getReport());
        //return AppReport::all();
    }
}
