<?php

namespace App\Exports;
use Illuminate\Http\Request;
use App\Invoice;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport implements FromCollection
{
    public function collection()
    {
        return Invoice::all();
    }
    public function export() 
    {
    $export = new InvoicesExport([
        [1, 2, 3],
        [4, 5, 6]
    ]);

    return Excel::download($export, 'invoices.xlsx');
    }
}

