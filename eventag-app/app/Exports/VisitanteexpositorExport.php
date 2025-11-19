<?php

namespace App\Exports;


use App\Models\VisitanteXExpositor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class VisitanteexpositorExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return VisitanteXExpositor::join('expositor','visitantexexpositor.expositor_id','=','expositor.id')
        ->join('visitante','visitantexexpositor.visitante_id','=','visitante.id')
        ->where('visitante.evento_id','=',request()->get('evento_id'))
        ->where('visitantexexpositor.expositor_id','=',request()->get('id'))->select('visitante.name','visitante.phone','visitante.email','visitante.location','visitantexexpositor.clasification','visitantexexpositor.comments')->get();
        
    }

    public function headings(): array{
        return[
            'Nombre',
            'Telefono',
            'Email',
            'Ciudad',
            'Clasificacion',
            'Comentarios',
        ];
    }

    public function styles(Worksheet $sheet){
        return [
            1=>['font' =>['bold'=>true]],
        ];
    }
    
}
