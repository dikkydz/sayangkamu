<?php

namespace App\Exports;

use App\Data;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Yajra\DataTables\Exports\DataTablesCollectionExport;

class DatasExport extends DataTablesCollectionExport implements WithMapping
{
    public function headings(): array
    {
        return [
            'Registration Number',
            'Author',
            'Address',
            'Model',
            'Type',
            'Production Year',
            'Silinder',
            'Chassis Number',
            'Engine Number',
            'BPKB Number',
            'Service Type',
        ];
    }

    public function map($row): array
    {
        return [
            $row['registration_number'],
            $row['author'],
            $row['address'],
            $row['model'],
            $row['type'],
            $row['production_year'],
            $row['silinder'],
            $row['chassis_number'],
            $row['engine_number'],
            $row['bpkb_number'],
            $row['service_type'],
        ];
    }
}
