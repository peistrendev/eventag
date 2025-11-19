<?php

namespace App\Exports;


use App\Models\Visitante;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class VisitanteEventoExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Visitante::where('evento_id','=',request()->get('evento_id'))->select('name','phone','email','location','razon')->get();        
    }

    public function headings(): array{
        return[
            'Nombre',
            'Telefono',
            'Email',
            'Ciudad',
            'Razon Visita',
        ];
    }

    public function styles(Worksheet $sheet){
        return [
            1=>['font' =>['bold'=>true]],
        ];
    }
    
}
