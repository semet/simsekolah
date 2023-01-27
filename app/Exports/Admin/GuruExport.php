<?php

namespace App\Exports\Admin;

use App\Models\Guru;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GuruExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function __construct(
        public string $departemen,
        public string $tingkat
    )
    {
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Guru::where('departemen_id', $this->departemen)
            ->where('tingkat_id', $this->tingkat)
            ->get();

    }

    public function headings(): array
    {
        return [
            'NIP',
            'NUPTK',
            'Nama Lengkap',
            'Email',
            'No. Telepn'
        ];
    }

    public function map($row): array
    {
        return [
            $row->nip,
            $row->nuptk,
            $row->nama,
            $row->email,
            $row->telepon,
        ];
    }

    public function autoInc() {

    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
