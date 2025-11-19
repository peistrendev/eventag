<?php

namespace App\Exports;


use App\Models\Expositor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExpositorEventoExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Expositor::where('evento_id','=',request()->get('evento_id'))->select('tipo','name','email','phone')->get();        
    }

    public function headings(): array{
        return[
            'Tipo',
            'Empresa',
            'Email',
            'Phone',
        ];
    }

    public function styles(Worksheet $sheet){
        return [
            1=>['font' =>['bold'=>true]],
        ];
    }
    
}
